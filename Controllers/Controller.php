<?php
namespace Controllers;
use View\View;
abstract class Controller{

    public $route;
    protected $view;
    public function __construct($route){
        $this->route = $route;
        $this->view = new View(__DIR__ . '/../resource/view');
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name){
        $path =   'Models\\' . ucfirst($name);
        if(class_exists($path)){
            return new $path;
        }
    }
}