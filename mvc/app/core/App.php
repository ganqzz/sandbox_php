<?php


class App
{
    protected $controller;
    protected $method;
    protected $params;

    public function __construct()
    {
        $this->parseUrl();

        if (!file_exists('../app/controllers/' . $this->controller . '.php')) {
            $this->controller = 'Home';
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        if (!method_exists($this->controller, $this->method)) {
            $this->method = 'index';
        }

        if (empty($this->params)) {
            //call_user_func(array($this->controller, $this->method);
            $this->controller->{$this->method}(); // Variable variable
        } else {
            call_user_func_array(array($this->controller, $this->method), $this->params); // 配列展開して1要素=1引数にする。
        }

    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            //var_dump($url);
            $this->controller = isset($url[0]) ? ucfirst(strtolower($url[0])) : 'Home';
            $this->method = isset($url[1]) ? strtolower($url[1]) : 'index';
            $this->params = is_array($url) ? array_slice($url, 2) : [];
            //var_dump($this->params);
        }
    }

}
