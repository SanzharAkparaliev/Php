<?php
    class Model{
        private $conn;

        public function getConn(){
            return $this->conn;
        }

        public function connectDB(){
            $conf = new Config();

            $this->conn = new mysqli($conf->getHost(), $conf->getUserName(), $conf->getUserPass(), $conf->getDbName());
            
            if($this->conn->connect_error){
                return "Connection failed";
            }
            return "Connected succesfully";
        }

        public function getAllUsers(){
			$stmt = $this->conn -> stmt_init();

			if ($stmt -> prepare("SELECT * FROM `user`")) {

			  $stmt -> execute();

			  $stmt -> bind_result($id, $name, $email, $gender, $city, $password);

				$users = array();
				while ($stmt->fetch()) {
					$users[] = new User($name, $email, $gender, $city, $password);
				}

			  $stmt -> close();
			  
			  return $users;
			}
		}

       
    }
?>