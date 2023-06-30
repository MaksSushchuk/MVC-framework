<?php

namespace Controllers;
use Controllers\Controller;
use Services\Db;
class IndexController extends Controller{

    function __construct($route){
        parent::__construct($route);
    }

    public function index(){
        
        return $this->view->renderHtml('index.php');
    }
}