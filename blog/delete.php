<?php 
session_start(); 
require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');

if (empty($_GET["article"])||trim($_GET["article"])===""){
	redirectTo("index.php");
}

$query="DELETE FROM articles WHERE `articles`.`id` = :id";

$statement=$mysql->prepare($query);
$statement->execute(["id"=>$_GET['article']]);

redirectTo("admin_panel.php");
?>