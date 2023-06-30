<?php

namespace View;

class View{

    private $path;

    public function __construct(string $path){
        $this->path = $path; 
    }

    public function renderHtml(string $nameFile, array $vars = []){
        extract($vars);
        include $this->path . '/' . $nameFile;
    }
}