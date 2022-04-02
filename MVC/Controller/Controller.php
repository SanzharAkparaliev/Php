<?php
	class Controller{
		
		// GET vs POST
		public function selectPage($view){
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
							$view->handleUserFormData($user);
						break;
					default : $view->index();
				}
			}else $view->index();
			
			$view->importFoot();
		}
	}
?>