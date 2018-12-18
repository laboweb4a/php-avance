<?php

namespace Framework;

abstract class Application
{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    public function __construct()
    {
        $this->httpRequest = new HTTPRequest();
        $this->httpResponse = new HTTPResponse();
        $this->name = '';
    }

    abstract public function run();

    public function httpRequest(): HTTPRequest
    {
        return $this->httpRequest;
    }

    public function httpResponse(): HTTPResponse
    {
        return $this->httpResponse();
    }

    public function name(): string
    {
        return $this->name;
    }
}