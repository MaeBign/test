<?php 
session_start(); 
require_once(__DIR__.'/variables.php')
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="blog_style.css" rel="stylesheet">
		<title>Admin-panel</title>
	</head>

	<body>
		<div id="main">
			<?php require_once(__DIR__."/header.php"); ?>
			<p id="add"><a href="add.php">Add</a></p>
			<p id="add"><a href="upload.php">Upload</a></p>
	
			<?php foreach ($articles as $article): ?>
				<article>
					<h2><?php echo $article["title"] ?></h2>
					<h3><?php echo 'posted the: '.date("Y-m-d",$article["date"]).' at '.date("h:i a",$article["date"]); ?></h3>
					<p><?php echo '<a href="modify.php?article='.$article["id"].'">modify</a>' ?></p>
					<p><?php echo '<a href="delete.php?article='.$article["id"].'">delete</a>' ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<?php require_once(__DIR__."/footer.php"); ?>
	</body>
</html>