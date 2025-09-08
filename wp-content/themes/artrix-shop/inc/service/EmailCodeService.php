<?php
class EmailCodeService
{
    const USER_REGISTER = 'user_register';
    const USER_RESET = 'user_reset';
    const USER_LOGIN_LIMIE = 'user_login_limit';


    private function getCache()
    {
        return new service\Cache();
    }

    public function getTypes()
    {
        return array(
            EmailCodeService::USER_REGISTER,
            EmailCodeService::USER_RESET,
            EmailCodeService::USER_LOGIN_LIMIE
        );
    }

    private function getKey(string $type, string $email): string
    {
        return "email_code:{$type}:{$email}";
    }

    private function getTypeName(string $type): string
    {
        $arr = [
            'user_register' => 'User registration',
            'user_forget' => 'Reset password',
        ];

        return $arr[$type] ?? '';
    }

    public function check(string $type, string $email, string $code, bool $del = false): bool
    {
        $key = $this->getKey($type, $email);
        $sms_code = $this->getCode($key);
        $time = $this->getCache()->get($key . '_time');

        if (!$sms_code || !$time) {
            return false;
        }

        if (time() - $time > (60 * 15)) {
            $this->delCode($key);
            return false;
        }

        $res = $sms_code == $code;

        if ($del) {
            $this->delCode($key);
        }

        return $res;
    }

    public function sendLimit(string $type, string $email)
    {
        $key = $this->getKey($type, $email);

        $time = $this->getCache()->get($key . '_time');

        return !($time && (time() - $time < 60));
    }

    public function send(string $type, string $email)
    {
        $key = $this->getKey($type, $email);

        if (!$sms_code = $this->getCode($key)) {
            $sms_code = (string)mt_rand(100000, 999999);
        }
        $this->setCode($key, $sms_code);

        $type_name = $this->getTypeName($type);
        ob_start();
        include get_template_directory() . '/inc/service/template-code.php';

        $html_content = ob_get_clean();

        return wp_mail($email, 'Verification code', $html_content, array('Content-Type: text/html; charset=UTF-8'));
    }

    public function getCode(string $key)
    {
        return $this->getCache()->get($key);
    }

    public function setCode(string $key, string $code)
    {
        // 存储时间
        $this->getCache()->set($key . '_time', time());
        return $this->getCache()->set($key, $code);
    }

    public function delCode(string $key)
    {
        $this->getCache()->remove($key . '_time');
        return $this->getCache()->remove($key);
    }
}
