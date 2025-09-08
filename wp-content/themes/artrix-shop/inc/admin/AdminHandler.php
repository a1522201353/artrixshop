<?php

namespace ArtrixAdmin;

class AdminHandler
{
    public static function init()
    {
        // require get_template_directory() . '/inc/admin/AuthGroup.php';
        self::hook();
    }

    public static function hook()
    {
        add_action('admin_menu', array(__CLASS__, 'menu'));

        add_action('admin_init', array(__CLASS__, 'downloadExportFile'));
    }

    public static function menu()
    {
        $capability = 'manage_options';
        $menu_slug = 'artrix-extensions';
        add_menu_page(
            'ARTRIX Extensions',
            'ARTRIX Extensions',
            $capability,
            $menu_slug,
            array(
                __CLASS__,
                'pageOverview',
            ),
            'dashicons-clipboard',
            '99.9528'
        );

        add_submenu_page(
            $menu_slug,
            'Customer login log',
            'Customer',
            $capability,
            'artrix-extensions-customer',
            array(
                __CLASS__,
                'pageCustomer',
            )
        );

        add_submenu_page(
            $menu_slug,
            'Page views log',
            'Page views',
            $capability,
            'artrix-extensions-page-views-log',
            array(
                __CLASS__,
                'pageViewLog',
            )
        );

        // $auth_group_page = add_submenu_page(
        //     $menu_slug,
        //     '用户组管理',
        //     '用户组管理',
        //     $capability,
        //     'suma-extensions-auth-group',
        //     array(
        //         new AuthGroup,
        //         'action',
        //     )
        // );
    }

    public static function pageOverview()
    {
        echo '<h1 class="page-title"> ARTRIX Extensions </h1>';
    }

    public static function pageCustomer()
    {
        global $wpdb;

        $per_page = 20;
        $current_page = isset($_GET['paged']) ? (int)$_GET['paged'] : 1;

        $table_name = $wpdb->prefix . 'login_records';

        $where_clause = ''; // 初始化筛选条件
        $start_date = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
        $end_date = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';

        if (!empty($start_date) && !empty($end_date)) {
            $where_clause .= $wpdb->prepare(" AND login_time BETWEEN %s AND %s", $start_date . ' 00:00:00', $end_date . ' 23:59:59');
        } elseif (!empty($start_date)) {
            $where_clause .= $wpdb->prepare(" AND login_time >= %s", $start_date . ' 00:00:00');
        } elseif (!empty($end_date)) {
            $where_clause .= $wpdb->prepare(" AND login_time <= %s", $end_date . ' 23:59:59');
        }

        $total_records = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE 1=1 $where_clause");
        $total_pages = ceil($total_records / $per_page);

        $results = $wpdb->get_results("
            SELECT lr.*, u.display_name, u.user_email
            FROM $table_name AS lr
            LEFT JOIN {$wpdb->users} AS u ON lr.user_id = u.ID
            WHERE 1=1 $where_clause
            ORDER BY login_time DESC
            LIMIT " . ($current_page - 1) * $per_page . ", $per_page
        ", ARRAY_A);

        require get_template_directory() . '/inc/admin/template/customer.php';
    }

    public static function pageViewLog()
    {
        global $wpdb;

        $per_page = 20;

        $current_page = isset($_GET['paged']) ? (int)$_GET['paged'] : 1;
        $table_name = $wpdb->prefix . 'page_views';
        $where_clause = ''; // 初始化筛选条件

        $start_date = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
        $end_date = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';

        if (!empty($start_date) && !empty($end_date)) {
            $where_clause .= $wpdb->prepare(" AND login_time BETWEEN %s AND %s", $start_date . ' 00:00:00', $end_date . ' 23:59:59');
        } elseif (!empty($start_date)) {
            $where_clause .= $wpdb->prepare(" AND login_time >= %s", $start_date . ' 00:00:00');
        } elseif (!empty($end_date)) {
            $where_clause .= $wpdb->prepare(" AND login_time <= %s", $end_date . ' 23:59:59');
        }

        $total_records = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE 1=1 $where_clause");
        $total_pages = ceil($total_records / $per_page);

        $results = $wpdb->get_results("
            SELECT lr.*, u.display_name, u.user_email
            FROM $table_name AS lr
            LEFT JOIN {$wpdb->users} AS u ON lr.user_id = u.ID
            WHERE 1=1 $where_clause
            ORDER BY id DESC
            LIMIT " . ($current_page - 1) * $per_page . ", $per_page
        ", ARRAY_A);

        require get_template_directory() . '/inc/admin/template/page-views-log.php';
    }

    public static function downloadExportFile()
    {
        global $wpdb;
        if (isset($_GET['action']) && 'download_view_log_csv' === wp_unslash($_GET['action'])) {
            $table_name = $wpdb->prefix . 'page_views';

            $where_clause = ''; // 初始化筛选条件
            $start_date = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
            $end_date = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';
            if (!empty($start_date) && !empty($end_date)) {
                $where_clause .= $wpdb->prepare(" AND login_time BETWEEN %s AND %s", $start_date . ' 00:00:00', $end_date . ' 23:59:59');
            } elseif (!empty($start_date)) {
                $where_clause .= $wpdb->prepare(" AND login_time >= %s", $start_date . ' 00:00:00');
            } elseif (!empty($end_date)) {
                $where_clause .= $wpdb->prepare(" AND login_time <= %s", $end_date . ' 23:59:59');
            }

            // 查询数据
            $results = $wpdb->get_results("
                SELECT lr.*, u.display_name, u.user_email
                FROM $table_name AS lr
                LEFT JOIN {$wpdb->users} AS u ON lr.user_id = u.ID
                WHERE 1=1 $where_clause
                ORDER BY id DESC
            ", ARRAY_A);


            $header_arr = array("ID", "用户ID", "用户", "页面标题", "页面链接", "浏览时间", "浏览时长(秒)");
            $data = array();
            foreach ($results as $record) {
                array_push($data, array(
                    $record['id'],
                    $record['user_id'],
                    $record['user_email'],
                    $record['page_title'],
                    $record['page_url'],
                    $record['visit_time'],
                    $record['duration'],
                ));
            }

            $filename = date("Y-m-d") . "_page_view_log.csv";
            csv_export($data, $header_arr, $filename);
        }
    }
}
