<?php
	class Model{
		private $conn;
		
		public function getConn(){
			return $this->conn;
		}
		
		public function connectDB(){
			
			$conf = new Config();
			
			$this->conn = new mysqli(
							$conf->getHost(), 
							$conf->getUserName(), 
							$conf->getUserPass(),
							$conf->getDbName()
						);

			// Check connection
			if ($this->conn->connect_error) {
			  return "Connection failed";
			}
			return "Connected successfully";
		}
		
		public function getAllUsers(){
			$stmt = $this->conn -> stmt_init();

			if ($stmt -> prepare("SELECT * FROM `user`")) {

			  // Execute query
			  $stmt -> execute();

			  // Bind result variables
			  $stmt -> bind_result($id, $name, $email, $gender, $city, $password);

				$users = array();
			  // Fetch value
				while ($stmt->fetch()) {
					$users[] = new User($id, $name, $email, $gender, $city, $password);
				}

			  // Close statement
			  $stmt -> close();
			  
			  return $users;
			}
		}
		
		public function insertNewUser($user){
			$stmt = $this->conn -> stmt_init();

			if ($stmt -> prepare("INSERT INTO 
										`user` (
													`id`, 
													`username`, 
													`useremail`, 
													`usergender`, 
													`usercity`, 
													`userpassword`
												) 
									VALUES (
										NULL, 
										?, 
										?, 
										?, 
										?, 
										?
									);"
								)
				) {

				$userName = $user->getUserName();
				$email = $user->getUserEmail();
				$gender = $user->getUserGender();
				$city = $user->getUserCity();
				$pass = $user->getUserPassword();
				
				$stmt->bind_param('sssss', 
										$userName, 
										$email, 
										$gender,
										$city,
										$pass
									);
				// Execute query
				$stmt -> execute();

				if($stmt->error){
					$message = "Something gone wrong!";
				}
				else{
					$message = $stmt->insert_id;
				}
				// Close statement
				$stmt -> close();
				  
				return $message;
			}
			else{
				$message = "Ooopps! Something gone wrong!";
				return $message;
			}
		}
		
		public function deleteUser($userId){
			$stmt = $this->conn -> stmt_init();

			if ($stmt -> prepare("DELETE FROM `user` WHERE `user`.`id` = ?")) {
		
				$stmt->bind_param('d', $userId);
				
				// Execute query
				$stmt -> execute();

				if($stmt->error){
					$message = "Ooopps! Something gone wrong!";
				}
				else{
					$message = $stmt->affected_rows;
				}
				// Close statement
				$stmt -> close();
				  
				return $message;
			}
			else{
				$message = "Ooopps! Something gone wrong!";
				return $message;
			}
		}
	

		
		
		
	}
?>