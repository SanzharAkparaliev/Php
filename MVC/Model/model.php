<?php
    class Model{
        public $conn;

        public function getConn(){
            return $this->conn;
        }

        public function connectDB(){
            $conf = new Config();

            $this->conn = new mysqli($conf->getHost(), $conf->getUserName(), $conf->getUserPass());
            
            if($this->conn->connect_error){
                return "Connection failed";
            }
            return "Connected succesfully";
        }
    }
?>