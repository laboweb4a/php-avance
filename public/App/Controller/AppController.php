<?php

namespace Controller;


use Framework\Controller;
use Framework\HTTPRequest;
use http\Env\Request;

class AppController extends Controller
{
    public function executeIndex(HTTPRequest $request)
    {
        require 'App/view/'.$this->view.'.html';
    }
}