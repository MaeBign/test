<?php
session_start();

require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');

$post=$_POST;

if (isset($post["name"])&&isset($post["password"])&&!(trim($post["name"])==="")&&!(trim($post["password"])==="")){
	if ($post["name"]===$admin["name"]&&$post["password"]===$admin["password"]){
		$_SESSION['is_logged']=true;
		redirectTo("index.php");
	}
	else{
		$_SESSION["login_error"]="Incorrect name/password.";
		redirectTo("login.php");
	}
}
else{
	$_SESSION["login_error"]="Please enter informations correctly.";
	redirectTo("login.php");
}
?>