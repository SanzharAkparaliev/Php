<?php
require_once("./Controller/Controller.php");
require_once("./View/View.php");
require_once("./Model/Entity/User.php");

class MyAPP{
	public $controller;
	public $view;
	
	public function __construct(){
		$this->controller = new Controller();
		$this->view = new View();
	}
}

$myAPP = new MyAPP();
$myAPP->controller->selectPage($myAPP->view);
?>