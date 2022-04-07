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
							<h1>User added successfully!</h1>
							<table>
							    <tr><td>User name</td><td>".$user->getId()."</td></tr>
								<tr><td>User name</td><td>".$user->getUserName()."</td></tr>
								<tr><td>User email</td><td>".$user->getUserEmail()."</td></tr>
								<tr><td>User gender</td><td>".$user->getUserGender()."</td></tr>
								<tr><td>User city</td><td>".$user->getUserCity()."</td></tr>
								<tr><td>User password</td><td>".$user->getUserPassword()."</td></tr>
							</table>
							<p><a href='index.php?page=showallusers'>Show all users</a><p>
							<p>&nbsp</p>
						";
			include "./View/Regna/mainblock.php";
			printMB($title, $contentMainBlock);
		}

		public function connectDB($message){
			$title = "Connection result";

			include "./View/Regna/mainblock.php";
			printMB($title,$message);
		}

		public function showMessage($message){
			$title = "Message";

			include "./View/Regna/mainblock.php";
			printMB($title,$message);
		}

		public function showAllUsers($users){
			$title = "Show All Users";

			if(count($users) == 0){
				$contentMainBlock = "<p>No users found</p>";
			}else{
			$tableHead = "<table border=1>
			                                <tr>
			                                    <th>UserName</th>
												<th>Email</th>
												<th>Gender</th>
												<th>City</th>
												<th>Password</th>
												<th>Delete</th>
												<th>Update</th>
											</tr>";
			$tableBody = "";
			foreach($users as $user){
				$tableBody = $tableBody."
				<tr>
					<td>".$user->getUserName()."</td>
					<td>".$user->getUserEmail()."</td>
					<td>".$user->getUserGender()."</td>
					<td>".$user->getUserCity()."</td>
					<td>".$user->getUserPassword()."</td>
					<td> 
						<form action='index.php?page=deleteUser' method='post'>
							<input type='hidden' name='userId' value='".$user->getId()."'>
							<input type='submit' value='Delete'>
						</form>
					</td>
					<td> 
						<form action='index.php?page=updateUserForm' method='post'>
							<input type='hidden' name='userId' value='".$user->getId()."'>
							<input type='submit' value='Update'>
						</form>
					</td>
				</tr>
				";
			}
			$tableFoot = "</table>";

			$contentMainBlock = $tableHead.$tableBody.$tableFoot;
		}
			include "./View/Regna/mainblock.php";
			printMB($title, $contentMainBlock);
		}

		public function updateUserInfo($user){
			$title = "User Form Page";
			
			if($user->getUserGender() == "male") $genderMale = "selected"; else $genderMale = "";
			if($user->getUserGender() == "female") $genderFemale = "selected"; else $genderFemale = "";
			
			if($user->getUserCity() == "Bishkek") $bishkekCity = "checked"; else $bishkekCity = "";
			if($user->getUserCity() == "Osh") $oshCity = "checked"; else $oshCity = "";
			if($user->getUserCity() == "Karakol") $karakolCity = "checked"; else $karakolCity = "";
			
			$content ="
							<form action='index.php?page=updateUser' method='post'>
								Name: <input type='text' name='name' value='".$user->getUserName()."'><br>
								E-mail: <input type='email' name='email' value='".$user->getUserEmail()."'><br>
								
								  <label for='gender'>Gender:</label>
								  <select id='gender' name='gender'>
									<option value='male' ".$genderMale." >Male</option>
									<option value='female' ".$genderFemale." >Femle</option>
								  </select>
								  <br>
								  
								  City<br>
								  <input type='radio' id='Bishkek' name='city' value='Bishkek' ".$bishkekCity.">
								  <label for='Bishkek'>Bishkek</label><br>
								  <input type='radio' name='city' value='Osh' ".$oshCity.">
								  <label for='Osh'>Osh</label><br>
								  <input type='radio' id='Karakol' name='city' value='Karakol' ".$karakolCity.">
								  <label for='Karakol'>Karakol</label><br><br>
								
								  <input type='hidden' name='userId' value='".$user->getId()."'>

								Password: <input type='password' name='password' value='".$user->getUserPassword()."'><br>
								<input type='submit'>
							</form>
						";

			include "./View/Regna/mainblock.php";
			printMB($title, $content);
		}


		
		public function importHead(){
			include "./View/Regna/inner-page-head.html";
		}
		
		public function importFoot(){
			include "./View/Regna/inner-page-foot.html";
		}
	}
?>