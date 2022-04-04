<?php
	class View{
		public function index(){
			$title = "This is Home page";
			$content = "<p>Welcome to HOME page</p>";
			
			include "./View/Regna/mainblock.php";
			printMB($title, $content);
		}
		
		public function userForm(){
			$title = "User Form Page";
			$content ="

							<form action='index.php?page=formData' method='post'>
								Name: <input type='text' name='name'><br>
								E-mail: <input type='email' name='email'><br>
								
								  <label for='gender'>Gender:</label>
								  <select id='gender' name='gender'>
									<option value='male'>Male</option>
									<option value='female'>Femle</option>
								  </select>
								  <br>
								  
								  City<br>
								  <input type='radio' id='Bishkek' name='city' value='Bishkek' checked>
								  <label for='Bishkek'>Bishkek</label><br>
								  <input type='radio' name='city' value='Osh'>
								  <label for='Osh'>Osh</label><br>
								  <input type='radio' id='Karakol' name='city' value='Karakol'>
								  <label for='Karakol'>Karakol</label><br><br>

								Password: <input type='password' name='password'><br>
								<input type='submit'>
							</form>
						";

			include "./View/Regna/mainblock.php";
			printMB($title, $content);
		}

		public function handleUserFormData($user){			
			$title = "User Form Data";
			$contentMainBlock ="
							<table>
								<tr><td>User name</td><td>".$user->getUserName()."</td></tr>
								<tr><td>User email</td><td>".$user->getUserEmail()."</td></tr>
								<tr><td>User gender</td><td>".$user->getUserGender()."</td></tr>
								<tr><td>User city</td><td>".$user->getUserCity()."</td></tr>
								<tr><td>User password</td><td>".$user->getUserPassword()."</td></tr>
							</table>
						";
			include "./View/Regna/mainblock.php";
			printMB($title, $contentMainBlock);
		}


		public function showSession($message){			
			$title = "Show data from Session";
			
			include "./View/Regna/mainblock.php";
			printMB($title, $message);
		}
		

		public function importHead(){
			include "./View/Regna/inner-page-head.html";
		}
		
		public function importFoot(){
			include "./View/Regna/inner-page-foot.html";
		}
	}
?>