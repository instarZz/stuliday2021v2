<?php

namespace App\src;

use FrontController;

class Router
{
    private $frontController;

    public function __construct()
    {
        $this->frontController = new FrontController();
    }

    public function run()
    {
        try {
            if (isset($_GET['path'])) {
                $url = explode('/', filter_var($_GET['path'], FILTER_SANATIZE_URL));
                $ctrlFunction = $url[0];
                if (method_exists($this->frontController, $ctrlFunction)) {
                    $params = null;
                    if (isset($url[1])) {
                        $params = $url[1];
                    }
                    $this->frontController->{$ctrlFunction}($params);
                } else {
                    echo 'La page à laquelle vous souhaitez accéder n\'existe pas';
                    $this->frontController->home();
                }
            } else {
                $this->frontController->home();
            }
        } catch (Exception $e) {
            echo 'Erreur : '.$e->getMessage;
        }
    }
}
