<?php
namespace Models;
use Services\Db;
class Model {
    public $db;
    function __construct(){
        $this->db = new Db;
    }
}
