<?php

class Router {
	
	private $route;
	
	public function __construct(){
		$this->route = $_SERVER['REQUEST_URI'];
	}
	
	public function getId(){
	
	$result = ltrim($this->route, '/');
		$string = explode('/', $result);
		return $id = $string['1'];
	
	}
	
	
	public function createRoutes(){
	
	$id = $this->getId();
	$routes = [
      
     "/home/page" => "home.php",
     "/home/view/posts" => "index.view.php",
     "/create/new/post" => "create.php",
     "/edit/old/post"=> "edit.php",
     "/show/existing/post" => "show.php",
      "/update/new/post/$id" => 'update.php',
      "/show/existing/post/$id" => 'show.php',
      "/edit/old/post/$id" => 'edit.php',
      "/delete/old/post/$id" => 'delete.php',
      "/404/error" => '404.php'
      	];
	
      if(array_key_exists($this->route, $routes)){
		include '../' . $routes[$this->route];
      exit;
	}else{
		include '../404.php';
	}	
	
	}
}
