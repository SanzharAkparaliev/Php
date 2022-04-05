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
						}
						$model->getConn()->close();
						$view->showAllUsers($users);
						break;


					default : $view->index();
				}

			}
			
			else $view->index();
			
			$view->importFoot();
		}
	}
?>