<?php
	class User{
		private $id;
		private $userName;
		private $userEmail;
		private $userGender;
		private $userCity;
		private $userPassword;
		
		public function __construct($id, $userName, $userEmail, $userGender, $userCity,	$userPassword){
			if($id) $this->id = $id;
			$this->userName = $userName;
			$this->userEmail = $userEmail;
			$this->userGender = $userGender;
			$this->userCity = $userCity;
			$this->userPassword = $userPassword;
		}

		
		public function getUserName(){
			return $this->userName;
		}

		public function getId(){
			return $this->id;
		}

		
		public function getUserEmail(){
			return $this->userEmail;
		}
		
		public function getUserGender(){
			return $this->userGender;
		}
		
		public function getUserCity(){
			return $this->userCity;
		}
		
		public function getUserPassword(){
			return $this->userPassword;
		}
		
		public function setUserName(String $userName){
			$this->userName = $userName;
		}

		public function setId(int $id){
			$this->id = $id; 
		}
		
		public function setUserEmail(String $userEmail){
			$this->userEmail = $userEmail;
		}
		
		public function setUserGender(String $userGender){
			$this->userGender = $userGender;
		}
		
		public function setUserCity(String $userCity){
			$this->userCity = $userCity;
		}
		
		public function setUserPassword(String $userPassword){
			$this->userPassword = $userPassword;
		}
	}
?>