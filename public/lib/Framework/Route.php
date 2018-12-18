<?php

namespace Framework;

class Route
{
    protected $action;
    protected $controller;
    protected $url;
    protected $vars = [];

    /**
     * Route constructor.
     * @param $action
     * @param $url
     * @param $controller
     * @param array $vars
     */
    public function __construct($action, $url, $controller, array $vars)
    {
        $this->action = $action;
        $this->url = $url;
        $this->controller = $controller;
        $this->vars = $vars;
    }

    public function hasVars(): bool
    {
        return !empty($this->varsNames);
    }

    public function match($url): ?array
    {
        if (preg_match('`^' . $this->url . '$`', $url, $matches)) {
            return $matches;
        } else {
            return null;
        }
    }

    public function setAction($action)
    {
        if (is_string($action)) {
            $this->action = $action;
        }
    }

    public function setUrl($url)
    {
        if (is_string($url)) {
            $this->url = $url;
        }
    }

    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    public function action()
    {
        return $this->action;
    }

    public function vars()
    {
        return $this->vars;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function controller(): string
    {
        return $this->controller;
    }

}