<?php 

session_start(); 
require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');

if (empty($_GET["id"])||trim($_GET["id"])===""){
	redirectTo("index.php");
}

$file=getArticle($_GET["id"],$files);
if (in_array($file["extension"], $allowed_img)){
	unlink(__DIR__.'/upload/'.$file["id"].'.'.$file["extension"]);
}
else{
	unlink(__DIR__.'/upload/videos/'.$file["id"].'.'.$file["extension"]);
}

$query="DELETE FROM uploads WHERE `uploads`.`id` = :id";
$statement=$mysql->prepare($query);
$statement->execute(["id"=>$_GET['id']]);

redirectTo("upload.php");

 ?>