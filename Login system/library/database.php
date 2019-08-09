<?php
    
    class database{
        private $host_db = "localhost";
        private $user_db = "root";
        private $pass_db = "";
        private $name_db = "login project";
        public $pdo;
        
        public function __construct(){
            if(!isset($this->pdo)){
                try{
                    $link =new PDO("mysql:host=".$this->host_db.";dbname=".$this->name_db, $this->user_db, $this->pass_db );
                    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $link->exec("SET CHARACTER set utf8");
                    $this->pdo = $link;
                }catch(PDOException $e){
                    die("connection failed". $e->getMessage());
                }
            }
        }
    }



?>