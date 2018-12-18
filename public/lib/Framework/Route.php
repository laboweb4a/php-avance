<?php

namespace Framework;

class Route
{
    protected $action;
    protected $url;
    protected $name;
    protected $varsNames = [];
    protected $vars = [];

    /**
     * Route constructor.
     * @param $action
     * @param $url
     * @param $name
     * @param $varsName
     * @param array $vars
     */
    public function __construct($action, $url, $name, array $varsName, array $vars)
    {
        $this->action = $action;
        $this->url = $url;
        $this->name = $name;
        $this->varsNames = $varsName;
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

    public function setModule($module)
    {
        if (is_string($module)) {
            $this->module = $module;
        }
    }

    public function setUrl($url)
    {
        if (is_string($url)) {
            $this->url = $url;
        }
    }

    public function setVarsNames(array $varsNames)
    {
        $this->varsNames = $varsNames;
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

    public function varsNames()
    {
        return $this->varsNames;
    }

    public function name()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


}