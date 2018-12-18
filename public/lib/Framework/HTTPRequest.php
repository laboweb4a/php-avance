<?php
namespace Framework;

class HTTPRequest
{
    public function cookieData($key):bool
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public function cookieExists($key):bool
    {
        return isset($_COOKIE[$key]);
    }

    public function getData($key): ? string
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function getExists($key):bool
    {
        return isset($_GET[$key]);
    }

    public function method():string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function postData($key): ? string
    {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function postExists($key):bool
    {
        return isset($_POST[$key]);
    }

    public function requestURI():string
    {
        return $_SERVER['REQUEST_URI'];
    }
}
