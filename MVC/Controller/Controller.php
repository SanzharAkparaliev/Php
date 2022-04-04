<?php
	class Controller{
		
		// GET vs POST
		public function selectPage($view){
			
			if(isset($_GET['page'])){
				switch($_GET['page']){
					case "userForm":
						$view->importHead();
						$view->userForm();
						$view->importFoot();
						break;
					case "formData": 
						$view->importHead();
							$user = new User(
									$_POST["name"],
									$_POST["email"],
									$_POST["gender"],
									$_POST["city"],
									$_POST["password"]
								);
							session_start();
							$_SESSION["userNameSession"] = $user->getUserName();
							$view->handleUserFormData($user);
							$view->importFoot();
						break;
					case "showSession":
						$view->importHead();
						session_start();
						if(!isset($_SESSION["userNameSession"])){
							$message = "<h3>Session named 'userNameSession' is not set!</h3>";
						}else{
							$message = "<h3>Session 'userNameSession' is set! <br> Value is : ".$_SESSION["userNameSession"]."</h3>"
							."<p><a href='index.php?page=deleteSession'>Click here to delete Session data</a></p>";
						}

						$view->showSession($message);
						$view->importFoot();
					break;

					case "deleteSession":
						session_destroy();
						$message = "<h3>Session data deleted!!!</h3>";
						$view->importHead();
						$view->showSession($message);
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