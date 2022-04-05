<?php
class Config{
    private $host = "localhost";
    private $userName = "root";
    private $userPass = "";
    private $DbName = "bil382";

    public function getHost(){
        return $this->host;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function getUserPass(){
        return $this->userPass;
    }

    public function getDbName(){
        return $this->DbName;
    }
}
?>