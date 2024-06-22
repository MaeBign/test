<?php 
session_start(); 
require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');

if (empty($_GET["article"])||trim($_GET["article"])===""||getArticle($_GET["article"], $articles)===NULL){
	redirectTo("index.php");
}
else{
	$article=getArticle($_GET["article"], $articles);
}

$text=$article["text"];
if (!strpos($text, "/*e*/")===false){
	$text=str_replace("/*e*/", "<br>", $text);
}

$pos=[0];
$end=[0];
while (strpos($text,"/*a:",$end[count($end)-1])!==false){
	$pos[]=strpos($text,"/*a:",$end[count($end)-1]);
	$end[]=strpos($text,"*/",$pos[count($pos)-1]);
	$ids[]=substr($text, $pos[count($pos)-1]+5, $end[count($end)-1]-$pos[count($pos)-1]-6);
}

$pos=array_splice($pos, 0, 1);
$end=array_splice($end, 0, 1);
if (isset($ids)){
	for ($i=0; $i<count($pos);$i++){
		$file=getArticle($ids[$i], $files);
		if (in_array($file["extension"], $allowed_img)){
			$replace='<img src="upload/'.$ids[$i].'.'.$file["extension"].'" class="img_bigger" alt="Img non disponible">';
			$text=str_replace('/*a: '.$ids[$i].' */', $replace, $text);
		}
		else{
			$replace='<video width="100%" controls><source src="upload/videos/'.$file["id"].'.'.$file["extension"].'" type="video/'.$file["extension"].'"></video>';
			$text=str_replace('/*a: '.$ids[$i].' */', $replace, $text);
		}
	}
}
	
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="blog_style.css" rel="stylesheet">
		<title><?php echo $article["title"] ?></title>
	</head>

	<body>
		<div id="main">
			<?php require_once(__DIR__."/header.php"); ?>
	
			<h1><?php echo $article["title"] ?></h1>
			<h3><?php echo 'posted the: '.date("Y-m-d",$article["date"]).' at '.date("h:i a",$article["date"]); ?></h3>
			<div><?php echo $text ?></div>
		</div>

		<?php require_once(__DIR__."/footer.php"); ?>
	</body>
</html>