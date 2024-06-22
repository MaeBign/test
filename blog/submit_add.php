<?php
session_start();

require_once(__DIR__.'/functions.php');

$post=$_POST;

if (isset($post['title'])&&isset($post["text"])&&!(trim($post["title"])==="")&&!(trim($post["text"])==="")){
	require_once(__DIR__.'/variables.php');
	$query="INSERT INTO `articles` (`id`, `title`, `text`, `date`) VALUES (NULL, :title, :texte, :TheDate)";

	$statement=$mysql->prepare($query);
	$statement->execute([
		"title"=>htmlspecialchars($post["title"]),
		"texte"=>htmlspecialchars($post["text"]),
		"TheDate"=>time()
	]);

	$_SESSION["add_error"]=false;
	redirectTo('admin_panel.php');
}
else{
	$_SESSION["add_error"]=true;
	redirectTo('add.php');
}
?>