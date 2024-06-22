<?php
session_start();

require_once(__DIR__.'/functions.php');

$post=$_POST;

if (isset($post['title'])&&isset($post["text"])&&!(trim($post["title"])==="")&&!(trim($post["text"])==="")){
	require_once(__DIR__.'/variables.php');
	$query="UPDATE `articles` SET `title` = :title, `text` = :texte WHERE `articles`.`id` = :id";

	$statement=$mysql->prepare($query);
	$statement->execute([
		"title"=>htmlspecialchars($post["title"]),
		"texte"=>htmlspecialchars($post["text"]),
		"id"=>$post["id"]
	]);

	$_SESSION["modify_error"]=false;
	redirectTo('admin_panel.php');
}
else{
	$_SESSION["modify_error"]=true;
	redirectTo('modify.php?article='.$article["id"]);
}
?>