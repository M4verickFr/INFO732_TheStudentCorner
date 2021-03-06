<?php

spl_autoload_register(function($name) {

	$dir = "model";
	if (strpos($name,"Controller") !== FALSE)
		$dir = "controller";

	$path = $dir."/".$name.".php";

	if(file_exists($path)){
		include_once $path;
	}else{
		(new SiteController())->render("index");
	}
});

function get_role(){
	if(isset($_SESSION["user"])){
		return $_SESSION["user"]["idrole"];
	}
	return -1;
}

function go_back(){
	if (isset($_SERVER['HTTP_REFERER'])) 
		return header('Location: ' . $_SERVER['HTTP_REFERER']);

	return header('Location: .');
}