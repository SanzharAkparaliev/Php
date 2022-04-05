<?php
	class Controller{
		
		// GET vs POST
		public function selectPage($view,$model){
			$view->importHead();
			
			if(isset($_GET['page'])){
				switch($_GET['page']){
					case "userForm": $view->userForm();
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
							$connectResult = $model->connectDB();
							
							if($connectResult == "Connection failed"){
								$view->connectDB($connectResult. ": ".$model->getConn()->connect_error);
							}else{
								$resultMessage = $model->insertNewUser($user);

								if($resultMessage == "Something gone wrong"){
									$view -> showMessage($resultMessage);
								}else{
									$user->setId($resultMessage);
									$view->handleUserFormData($user);
								}
							}
							$model->getConn()->close();
						break;
					
			     	
					case "connect":
						$connectResult = $model->connectDB();
						
						if($connectResult == "Connection failed"){
							$view->connectDB($connectResult. ": ".$model->getConn()->connect_error);
						}else{
							$view->connectDB($connectResult);
						}
						$model->getConn()->close();
					break;	



					case "showallusers":
						$connectResult = $model->connectDB();
						if($connectResult == "Connection failed"){
							$view->connectDB($connectResult. ": ".$model->getConn()->connect_error);
						}else{
							$users = $model -> getAllUsers();
							$view->showAllUsers($users);
						}
						$model->getConn()->close();
						
					break;

					case "deleteUser":
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
							$model->getConn()->close();
						break;

					default : $view->index();
				}

			}
			
			else $view->index();
			
			$view->importFoot();
		}
	}
?>