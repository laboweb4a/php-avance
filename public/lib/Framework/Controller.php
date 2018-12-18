<?php

namespace Framework;


use Exception;

class Controller
{
    protected $action;
    protected $view;
    protected $app;

    public function __construct(Application $app, $action, $view)
    {
        $this->app = $app;
        $this->action = $action;
        $this->view = $view;
    }

    /**
     * @throws Exception
     */
    public function execute()
    {
        $method = 'execute' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            return $this->$method($this->app->getHttpRequest());
        } else {
            throw new Exception('L\'action n\'existe pas');
        }
    }

    public function app(): Application
    {
        return $this->app;
    }
}