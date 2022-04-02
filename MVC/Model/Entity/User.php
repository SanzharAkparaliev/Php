<?php
	class User{
		private $userName;
		private $userEmail;
		private $userGender;
		private $userCity;
		private $userPassword;
		
		public function __construct($userName, $userEmail, $userGender, $userCity,				$userPassword){
			$this->userName = $userName;
			$this->userEmail = $userEmail;
			$this->userGender = $userGender;
			$this->userCity = $userCity;
			$this->userPassword = $userPassword;
		}
		
		public function getUserName(){
			return $this->userName;
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