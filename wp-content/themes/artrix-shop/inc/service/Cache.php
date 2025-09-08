<?php

namespace service;

class Cache
{
    public function get($key)
    {
        return $_SESSION[$key] ?? '';
    }

    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
        return $this;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
}
