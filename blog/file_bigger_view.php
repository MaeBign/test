<?php 
session_start(); 
require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');//

if (!isset($_GET["id"])||trim($_GET["id"])===""){
	redirectTo("view_all.php");
}

$file=getArticle($_GET["id"],$files);
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="blog_style.css" rel="stylesheet">
		<title>Page d'acceuille</title>
	</head>

	<body>
		<div id="main">
			<?php require_once(__DIR__."/header.php"); ?>

			<?php if (in_array($file["extension"],$allowed_img)): ?>
				<?php echo '<img src="upload/'.$_GET["id"].'.'.$file["extension"].'" class="img_bigger">'; ?>
			<?php else: ?>
				<video width="100%" controls>
					<?php echo '<source src="upload/videos/'.$_GET["id"].'.'.$file["extension"].'" type="video/'.$file["extension"].'" >'; ?>
				</video>
			<?php endif; ?>
		</div>

		<?php require_once(__DIR__."/footer.php"); ?>
	</body>
</html>