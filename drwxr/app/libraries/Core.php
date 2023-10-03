<?php
/* 
    Created on : 14 mars 2023, 11:28:15
    Author     : GUERIN ANDRIAMANANTENA
    Framework to SINFO 1.0 Alpha version
    Developped by : GUERIN ANDRIAMANANTENA
    e-Mail      : ghyslainguerin@gmail.com
    copyright (c) FEV 2023
    Database Configuration Class (MySqlidb)
    WordKey     : MVC, DEFINE ROOT_PATH
    WhatApps : +261(0)346266633
*/

class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {

        $url = $this->getUrl();
        if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}
