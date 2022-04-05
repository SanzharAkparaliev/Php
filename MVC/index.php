<?php
require_once("./Controller/Controller.php");
require_once("./View/View.php");
require_once("./Model/Entity/User.php");
require_once("./Model/model.php");
require_once("./Model/config.php");

class MyAPP{
	public $controller;
	public $view;
	public $model;
	
	public function __construct(){
		$this->controller = new Controller();
		$this->view = new View();
		$this->model = new Model();
	}
}

$myAPP = new MyAPP();
$myAPP->controller->selectPage($myAPP->view,$myAPP->model);
?>