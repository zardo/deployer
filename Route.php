<?php

namespace DeliveryMuch\Deployer;

class Route
{
    private $routes = array();

    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new Route();
        }
        return $inst;
    }

    private function __construct()
    {
    }

    public static function get($uri, $callback)
    {
        $route = self::getInstance();
        $route->processRoute('get', $uri, $callback);
    }

    public static function post($uri, $callback)
    {
        $route = self::getInstance();
        $route->processRoute('post', $uri, $callback);
    }

    private function processRoute($method, $uri, $callback)
    {
        if (strtolower(str_replace('/', '', $_SERVER['REQUEST_URI'])) == strtolower(str_replace('/', '', $uri)) && strtolower(str_replace('/', '', $_SERVER['REQUEST_METHOD'])) == strtolower(str_replace('/', '', $method))) {
            call_user_func($callback);
        }
    }
}
