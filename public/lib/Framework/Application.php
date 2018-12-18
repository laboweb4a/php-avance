<?php

namespace Framework;


use Symfony\Component\Yaml\Yaml;

class Application
{

    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    /**
     * @return HTTPRequest
     */
    public function getHttpRequest(): HTTPRequest
    {
        return $this->httpRequest;
    }

    /**
     * @param HTTPRequest $httpRequest
     */
    public function setHttpRequest(HTTPRequest $httpRequest): void
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * @return HTTPResponse
     */
    public function getHttpResponse(): HTTPResponse
    {
        return $this->httpResponse;
    }

    /**
     * @param HTTPResponse $httpResponse
     */
    public function setHttpResponse(HTTPResponse $httpResponse): void
    {
        $this->httpResponse = $httpResponse;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function __construct($name = '')
    {
        $this->httpRequest = new HTTPRequest();
        $this->httpResponse = new HTTPResponse();
        $this->name = $name;
    }
    public function run()
    {
        $controller = $this->getController();
        $controller->execute();
    }

    public function getController()
    {
        $router = new Router();

        $yaml_parse = Yaml::parseFile('config/routes.yml');

        $routes = $yaml_parse['routes'];
        // On parcourt les routes du fichier XML.
        foreach ($routes as $route) {
            $route = $route['route'];
            $vars = [];

            if (isset($route['vars']) && !empty($route['vars'])) {
                $vars = $route['vars'];
            }

            // On ajoute la route au routeur.
            $router->addRoute(new Route($route['action'], $route['url'], $route['controller'], $vars));
        }
        try {
            // On récupère la route correspondante à l'URL.
            $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
            // On instancie le contrôleur.
            $controllerClass = 'Controller\\'.$matchedRoute->controller();
            return new $controllerClass($this, $matchedRoute->action(), $matchedRoute->action());
        } catch (\RuntimeException $e) {
            if ($e->getCode() == Router::NO_ROUTE) {
                // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
                $this->httpResponse->redirect404();
            }
        }
    }
}