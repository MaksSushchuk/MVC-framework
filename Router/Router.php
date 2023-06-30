<?php

namespace Router;
class Router
{
    protected $routers = [];
    protected $params = [];
    public function __construct(){
         $arr = require __DIR__ . '/../routes.php';
         foreach($arr as $key =>$val){
             $this->add($key,$val);
         }

    }

     public function add($route,$params){
        $route = '~^' . $route . '$~';
        $this->routers[$route] = $params;
        
     }

     public function match(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach($this->routers as $route => $params){
            if(preg_match($route,$url,$matches))
            {
                $this->params = $params;
                return true; 
            }
            
            
        }
        return false;
     }

     public function run(){
       if($this->match()){
        $path = 'Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
        if (class_exists($path)){
            $action = $this->params['action'];
            if(method_exists($path,$action)){
            
                $controller = new $path($this->params);
                $controller->$action();
            }
        }
        else{
            echo 'Клас не знайдено';
        }
        $this->params['controller'];
       }
     }

}


