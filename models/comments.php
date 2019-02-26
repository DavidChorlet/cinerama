<?php

class comments {
    
    public $id = 0;
    public $text = '';
    public $dateHour = '0000-00-00 00:00:00';
    public $id_cine_posts = 0;
    public $id_cine_users = 0;
    private $db;
    
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=cinerama;dbname=cinedavid;charset=utf8', 'chorlet', 'dddd');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    
    
}





