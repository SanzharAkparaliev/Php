<?php
	class Controller{
		
		// GET vs POST
		public function selectPage($view, $model){
			
			if(isset($_GET['page'])){
				switch($_GET['page']){
					case "userForm": 
							$view->importHead();
							$view->userForm();
							$view->importFoot();
						break;
					case "formData": 							
							$user = new User(
									null,
									$_POST["name"],
									$_POST["email"],
									$_POST["gender"],
									$_POST["city"],
									$_POST["password"]
								);
								
							//setcookie("userNameCookie", $user->getUserName(), time() + (86400), "/");
							
							$connectResult = $model->connectDB();
							$view->importHead();
							if($connectResult == "Connection failed"){
								$view->connectDB($connectResult.": ".$model->getConn()->connect_error);
							}
							else{
								$resultMessage = $model->insertNewUser($user);
								
								if($resultMessage == "Ooopps! Something gone wrong!"){
									$view->showMessage($resultMessage);
								}
								else{
									$user->setId($resultMessage);
									$view->handleUserFormData($user);
								}
							}
							$model->getConn()->close();
							$view->importFoot();
							
						break;
					case "showCookie":
							$view->importHead();
							
							if(!isset($_COOKIE["userNameCookie"])) {
								$message = "<h1>Cookie named 'userNameCookie' is not set!</h1>";
								
							} else {
								
								$message = "<h1>Cookie 'userNameCookie' is set!<br>Value is: "
									.$_COOKIE["userNameCookie"]."</h1>"
									."<p><a href='index.php?page=deleteCookie'>Click here to delete Cookie data</a></p>";
							}
							$view->showCookie($message);
							
							$view->importFoot();
							 
							
						break;
					case "deleteCookie":
							setcookie("userNameCookie", "", time() - (3600), "/");
							$message = "<h2>Cookie data deleted!!!</h2>";
							$view->importHead();
							$view->showCookie($message);
							$view->importFoot();
						break;
					case "connect": 
							$connectResult = $model->connectDB();
							$view->importHead();
							if($connectResult == "Connection failed"){
								$view->connectDB($connectResult.": ".$model->getConn()->connect_error);
							}
							else{
								$view->connectDB($connectResult);
							}
							$view->importFoot();
							$model->getConn()->close();
						break;
					case "showallusers":
							$view->importHead();
							$connectResult = $model->connectDB();
							if($connectResult == "Connection failed"){
								$view->connectDB($connectResult.": ".$model->getConn()->connect_error);
							}
							else{
								$users = $model->getAllUsers();
								$view->showAllUsers($users);
							}
							$view->importFoot();
							$model->getConn()->close();
						break;
					case "deleteUser":
							$view->importHead();
							$connectResult = $model->connectDB();
							if($connectResult == "Connection failed"){
								$view->connectDB($connectResult.": ".$model->getConn()->connect_error);
							}
							else{
								if(isset($_POST["userId"])){
									$resultMessage = $model->deleteUser($_POST["userId"]);
									
									if($resultMessage == "Ooopps! Something gone wrong!"){
										$view->showMessage($resultMessage);
									}
									else{
										$message = "<h1>User deleted successfully!</h1>
													<p>".$resultMessage." rows affected</p>";
										$view->showMessage($message);
									}
								}
								else{
									$view->showMessage("User id is undefined");
								}
							}
							$view->importFoot();
							$model->getConn()->close();
						break;
					case "updateUserForm":
							$view->importHead();
							$connectResult = $model->connectDB();
							if($connectResult == "Connection failed"){
								$view->connectDB($connectResult.": ".$model->getConn()->connect_error);
							}
							else{
								if(isset($_POST["userId"])){
									$resultMessage = $model->getUserById($_POST["userId"]);
									
									if($resultMessage == "Ooopps! Something gone wrong!"){
										$view->showMessage($resultMessage);
									}
									else{
										// $resultMessage = $user (instance of User entity)
										$view->updateUserInfo($resultMessage);
									}
								}
								else{
									$view->showMessage("User id is undefined");
								}
							}
							$view->importFoot();
							$model->getConn()->close();
						break;

					case "updateUser":
							$view->importHead();
							
							if(isset($_POST["userId"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["gender"]) && isset($_POST["city"]) && isset($_POST["password"])){
								$user = new User(
										$_POST["userId"],
										$_POST["name"],
										$_POST["email"],
										$_POST["gender"],
										$_POST["city"],
										$_POST["password"]
									);
									
								$connectResult = $model->connectDB();
								if($connectResult == "Connection failed"){
									$view->connectDB($connectResult.": ".$model->getConn()->connect_error);
								}
								else{
									$resultMessage = $model->updateUserInfo($user);
									if($resultMessage == "Ooopps! Something gone wrong!"){
										$view->showMessage("Update finished unsaccessfully");
									}
									else{
										$message = "<h1>User updated successfully!</h1>
													<p>".$resultMessage." rows affected</p>";
										$view->showMessage($message);
									}									
								}
								$model->getConn()->close();
							}
							else{
								$view->showMessage("User data is undefined");
							}
														
							$view->importFoot();
						break;
					default : 
						$view->importHead();
						$view->index();
						$view->importFoot();
						break;
				}
			}else {
				$view->importHead();
				$view->index();
				$view->importFoot();
			}
		}
	}
?>