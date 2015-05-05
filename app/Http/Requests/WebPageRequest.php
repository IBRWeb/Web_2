<?php namespace App\Http\Requests;


class WebPageRequest {

	protected $controller;
	protected $action;
	protected $controllerName;

	public function __construct($controller, $action) {
		$this -> resolveController($controller);
		$this -> action     = $action;
		$this -> controllerPath = $this -> controller . '@' . $this -> action;
	}

	public function resolveController($controller) {
		$this -> controller =  ucfirst($controller).'Controller';
	}

	public function getController() {
		return $this -> controller;
	}

	public function getAction() {
		return $this -> action;
	}

	public function getControllerPath() {
		return $this -> controllerPath;
	}

	public function callController(){
		return new "App\Http\Controllers\$this -> controller;
	}
}