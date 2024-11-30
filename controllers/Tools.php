<?php
class Tools {

    public function __construct() {}

    public function Redirect($location) {
        echo "<script> window.location.href='" . $location . "'; </script>";
    }

    public function setCookie($key, $value, $expire = 3600)
    {
        setcookie($key, $value, time() + $expire, '/');
    }

    public function getCookie($key) {
        return $_COOKIE[$key] ?? null;
    }
}

?>
