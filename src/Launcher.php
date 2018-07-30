<?php

namespace Oquiz;

use \AltoRouter;

class Launcher {

    public $router;

    private $config;

    public function __construct() {

        $this->config = parse_ini_file(__DIR__.'/config.conf');

        $this->router = new AltoRouter();

        $this->router->setBasePath($this->config['BASEPATH']);

        $this->mapping();
    }

    private function mapping() {

        $this->router->map('GET', '/', 'MainController#home', 'main_home');
        $this->router->map('GET|POST', '/quiz/[i:id]', 'QuizController#quiz', 'main_quiz');
        $this->router->map('GET|POST', '/signup', 'UserController#signup', 'main_signup');
        $this->router->map('GET', '/signin', 'UserController#signin', 'main_signin');
        $this->router->map('POST', '/signin', 'UserController#signinpost', 'main_signinpost');
        $this->router->map('GET', '/compte','UserController#compte', 'main_compte');
        $this->router->map('GET', '/logout', 'UserController#logout', 'main_logout');
    }

    public function run () {

        $match = $this->router->match();

        if ($match !== false) {

            $tmp = explode('#', $match['target']);

            list($controllerName, $methodName) = $tmp;

            $fqcnControllerName = '\Oquiz\Controllers\\'.$controllerName;

            $controller = new $fqcnControllerName($this);

            $controller->$methodName($match['params']);
        }

        else {

            header("HTTP/1.0 404 Not Found");

            echo 'Erreur 404 : c\'est pas un peu fini de rajouter n\'importe quoi dans l\'URL ?';
            exit;
        }

    }
    public function getConfig($key) {

        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }
        return false;
    }

    public function getRouter() {
        return $this->router;
    }
}
