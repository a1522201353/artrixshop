<?php
class UserHandler
{
    protected static $namespace = 'artrix-user';

    public static function init()
    {

        add_role(
            'customer',
            'Customer',
            array(
                'read' => true,
            )
        );
        add_filter('display_post_states', function ($states, $post) {
            if ('page' == get_post_type($post->ID)) {
                switch (get_page_template_slug($post->ID)) {
                    case 'templates/sign-up.php':
                        $states[] = __('Sign up');
                        break;
                    case 'templates/change-pwd.php':
                        $states[] = __('Reset password');
                        break;
                    case 'templates/user-login.php':
                        $states[] = __('Login');
                        break;
                }
            }
            return $states;
        }, 10, 2);

        add_action('rest_api_init', array(__CLASS__, 'restApiInit'));

        add_action('after_setup_theme', array(__CLASS__, 'createTables'));

        add_action('wp', array(__CLASS__, 'recordPageView'));
    }

    public static function createTables()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'login_records';
        $charset_collate = $wpdb->get_charset_collate();

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $sql = "CREATE TABLE $table_name (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                user_id INT UNSIGNED NOT NULL,
                login_time DATETIME NOT NULL,
                ip_address VARCHAR(50) NOT NULL,
                region VARCHAR(100),
                PRIMARY KEY (id)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        $table_name = $wpdb->prefix . 'page_views';


        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $sql = "CREATE TABLE $table_name (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                login_record_id INT UNSIGNED NOT NULL,
                user_id INT UNSIGNED NOT NULL,
                page_id INT UNSIGNED NOT NULL,
                page_title VARCHAR(255) NOT NULL,
                page_url VARCHAR(255),
                visit_time DATETIME NOT NULL,
                duration INT UNSIGNED NOT NULL,
                PRIMARY KEY (id)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    public static function restApiInit()
    {

        $namespace = self::$namespace . '/v1';
        register_rest_route($namespace, '/send-code', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array(__CLASS__, 'processSendCode'),
        ));
        register_rest_route($namespace, '/user-register', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array(__CLASS__, 'processRegistration'),
        ));
        register_rest_route($namespace, '/user-login', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array(__CLASS__, 'processLogin'),
        ));
        register_rest_route($namespace, '/reset-password', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array(__CLASS__, 'processResetPassword'),
        ));

        // 统计
        register_rest_route($namespace, '/page-count', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array(__CLASS__, 'timingPageView'),
        ));
    }

    public static function processSendCode()
    {

        // // 验证 nonce
        // if (!wp_verify_nonce($_POST['artrix-register-nonce'], 'artrix-register')) {
        //     return self::returnMsg(403, 'Security verification failed');
        // }

        $email = sanitize_email($_POST['email']);
        if (!is_email($email)) {
            return self::returnMsg(400, 'Email format error');
        }

        $type = $_POST['type'];
        $emailCodeService = new EmailCodeService();
        $codeTypes = $emailCodeService->getTypes();
        if (!in_array($type, $codeTypes)) {
            return self::returnMsg(400, 'Wrong type sent');
        }
        if (!$emailCodeService->sendLimit($type, $email)) {
            return self::returnMsg(400, 'Can only be sent once per minute');
        }
        $res = $emailCodeService->send($type, $email);

        return self::returnMsg(200, 'Verification code sent successfully! Please check your email');
    }

    public static function processRegistration()
    {
        // if (!wp_verify_nonce($_POST['artrix-register-nonce'], 'artrix-register')) {
        //     return self::returnMsg(403, 'Security verification failed');
        // }

        $requireVerify = [
            'first_name' => '`first_name` is required',
            'last_name'  => '`last_name` is required',
            'email'  => '`email` is required',
            'code'  => '`code` is required',
            'pwd'  => '`password` is required',
            'check_pwd'  => '`password(repeat)` is required',
            'agree'  => '`Agreement` is required'
        ];

        foreach ($requireVerify as $key => $msg) {
            if (!isset($_POST[$key]) || empty($_POST[$key])) {
                return self::returnMsg(403, $msg);
            }
        }

        $email = sanitize_email($_POST['email']);

        $emailCodeService = new EmailCodeService();
        if (!$emailCodeService->check(EmailCodeService::USER_REGISTER, $email, $_POST['code'], true)) {
            return self::returnMsg(403, 'Email verification code provided incorrectly');
        }

        // 校验密码
        if ($_POST['pwd'] !== $_POST['check_pwd']) {
            return self::returnMsg(403, 'The two password inputs are inconsistent');
        }

        if (email_exists($email)) {
            return self::returnMsg(400, 'Email already exists');
        }

        $new_customer_data = [
            'user_login' => $email,
            'user_pass'  => $_POST['pwd'],
            'user_email' => $email,
            'role'       => 'customer',
            'first_name' => $_POST['first_name'],
            'last_name'  => $_POST['last_name']
        ];

        $customer_id = wp_insert_user($new_customer_data);

        if (is_wp_error($customer_id)) {
            return self::returnMsg(500, $customer_id);
        }

        return self::returnMsg(200, 'Success');
    }

    public static function processLogin()
    {


        $creds = array(
            'user_login'    => trim(wp_unslash($_POST['username'])),
            'user_password' => $_POST['password'],
        );

        $user = wp_signon($creds, false);
        if (is_wp_error($user)) {
            // $user->get_error_message()
            return self::returnMsg(500, 'The email or password you entered is wrong');
        }

        self::recordUserLogin($user);

        $redirect_from = home_url();
        if (isset($_POST['redirect_from']) && !empty($_POST['redirect_from'])) {
            $redirect_from = urldecode($_POST['redirect_from']);
        }

        return self::returnMsg(200, 'login successful', ['url' => $redirect_from]);
    }

    public static function recordUserLogin($user)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'login_records';
        $user_id = $user->ID;
        $login_time = current_time('mysql');
        $ip = real_ip();

        $ip2region = new Ip2Region();
        $info = $ip2region->btreeSearch($ip);
        $params['ip_region'] = $info['region'];

        $wpdb->insert($table_name, array(
            'user_id' => $user_id,
            'login_time' => $login_time,
            'ip_address' => $ip,
            'region' => $info['region'] ?? ''
        ));

        $_SESSION['login_record_id'] = $wpdb->insert_id;
    }

    public static function processResetPassword()
    {
        $requireVerify = [
            'email'  => '`email` is required',
            'code'  => '`code` is required',
            'pwd'  => '`password` is required',
            'check_pwd'  => '`password(repeat)` is required',
        ];

        foreach ($requireVerify as $key => $msg) {
            if (!isset($_POST[$key]) || empty($_POST[$key])) {
                return self::returnMsg(403, $msg);
            }
        }
        $email = sanitize_email($_POST['email']);

        $emailCodeService = new EmailCodeService();
        if (!$emailCodeService->check(EmailCodeService::USER_RESET, $email, $_POST['code'], true)) {
            return self::returnMsg(403, 'Email verification code provided incorrectly');
        }

        // 校验密码
        if ($_POST['pwd'] !== $_POST['check_pwd']) {
            return self::returnMsg(403, 'The two password inputs are inconsistent');
        }

        $user = get_user_by('email', $email);
        if (!$user) {
            return self::returnMsg(404, 'Email does not exist');
        }

        // 重置密码
        $result = wp_set_password($_POST['pwd'], $user->ID);
        if (is_wp_error($result)) {
            return self::returnMsg(500, (string)$result);
        }

        return self::returnMsg(200, 'Success', ['url' => '/user-login']);
    }

    public static function recordPageView()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'page_views';

        $page_id = get_queried_object_id();

        $user_id = get_current_user_id();

        $page_url = home_url($_SERVER['REQUEST_URI']);

        $login_record_id = intval($_SESSION['login_record_id']);

        if ($user_id > 0 && $page_id > 0 && current_user_can('customer')) {
            $existing_record = $wpdb->get_row($wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_id = %d AND page_url = %s AND login_record_id = %d",
                $user_id,
                $page_url,
                $login_record_id
            ));

            if ($existing_record) {
                // 更新已存在的记录的停留时长
                $visit_time = $existing_record->visit_time;
                $duration = time() - strtotime($visit_time);

                $wpdb->update(
                    $table_name,
                    array('duration' => $duration),
                    array('id' => $existing_record->id)
                );
            } else {
                // 插入新的浏览记录
                $visit_time = current_time('mysql');
                $duration = 0;

                $wpdb->insert($table_name, array(
                    'user_id' => $user_id,
                    'page_id' => $page_id,
                    'page_title' => get_the_title($page_id),
                    'page_url' => $page_url,
                    'login_record_id' => $login_record_id,
                    'visit_time' => $visit_time,
                    'duration' => $duration
                ));
            }
        }
    }

    protected static function returnMsg(int $code, string $msg, $data = [])
    {
        if ($code == 200) {
            return wp_send_json(['code' => $code, 'message' => $msg, 'data' => $data]);
        }
        return new WP_Error($code, $msg, $data);
    }
}
