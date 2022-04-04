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
							setcookie('userNameCookie',$user -> getUserName(),time() + (86400),"/");
							$view->handleUserFormData($user);
							$view->importFoot();
						break;
					case "showCookie":
						$view->importHead();

						if(!isset($_COOKIE["userNameCookie"])){
							$message = "<h3>Cookie named 'userNameCookie' is not set!</h3>";
						}else{
							$message = "<h3>Cookie 'userNameCookie' is set! <br> Value is : ".$_COOKIE["userNameCookie"]."</h3>"
							."<p><a href='index.php?page=deleteCookie'>Click here to delete Cookie data</a></p>";
						}

						$view->showCookie($message);
						$view->importFoot();
					break;

					case "deleteCookie":
						setcookie("userNameCookie","",time() -(3600),"/");
						$message = "<h3>Cookie data deleted!!!</h3>";
						$view->importHead();
						$view->showCookie($message);
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