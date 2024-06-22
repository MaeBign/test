<?php 
session_start();

require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="blog_style.css" rel="stylesheet">
		<title>Liste</title>
	</head>

	<body>
		<div id="main">
			<?php require_once(__DIR__.'/header.php'); ?>
	
			<?php foreach ($articles as $article): ?>
				<article>
					<h1 class="title"><?php echo '<a href="show_article.php?article='.$article["id"].'">'.$article["title"].'</a>'; ?></h1>
					<h3 class="date"><?php echo 'posted the: '.date("Y-m-d",$article["date"]).' at '.date("h:i a",$article["date"]); ?></h3>
				</article>
			<?php endforeach; ?>
		</div>

		<?php require_once(__DIR__.'/footer.php'); ?>
	</body>
</html>