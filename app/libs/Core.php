<?php

class Core
{

    private $className = "HomeController";
    private $methodName = "index";
    private $params = [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        $url = isset($_GET["url"]) ? explode('/', rtrim($_GET["url"], '/')) : [];

        if (isset($url[0])) {
            $this->className = ucfirst($url[0]."Controller");
            unset($url[0]);
        }

        if (isset($url[1])) {
            $this->methodName = $url[1];
            unset($url[1]);
        }
        $this->params = empty($url) ? [] : array_values($url);

        if (file_exists('./app/controllers/'.$this->className . ".php")) {
            require_once('./app/controllers/'.$this->className . ".php");
            $this->className = new $this->className();
            call_user_func([$this->className, $this->methodName], $this->params);
        } else {
            die("File Not Found");
        }
    }
}
