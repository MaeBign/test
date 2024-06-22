<?php 
session_start(); 
require_once(__DIR__.'/variables.php');
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

			<h1>Dernier Article: </h1>
			<article>
				<h2 class="title"><?php echo '<a href="show_article.php?article='.$articles[0]["id"].'">'.$articles[0]["title"].'</a>'; ?></h1>
				<h4 class="date"><?php echo 'posted the: '.date("Y-m-d",$articles[0]["date"]).' at '.date("h:i a",$articles[0]["date"]); ?></h3>
			</article>
	
			<h1>Description: </h1>
			<p>lorem ipsum</p>
		</div>

		<?php require_once(__DIR__."/footer.php"); ?>
	</body>
</html>