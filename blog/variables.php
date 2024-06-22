<?php 

$mysql=new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","");

$query="SELECT * FROM articles ORDER BY date DESC";
$statement=$mysql->prepare($query);
$statement->execute();
$articles=$statement->fetchAll();

$query="SELECT * FROM uploads ORDER BY date DESC";
$statement=$mysql->prepare($query);
$statement->execute();
$files=$statement->fetchAll();

$admin=["name"=>"MOI","password"=>"123"];

$allowed_img=['jpg','gif','png','jpeg'];
$allowed_video=['mp4','webm'];
?>