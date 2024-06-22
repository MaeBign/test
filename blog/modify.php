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
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="blog_style.css" rel="stylesheet">
		<title>Add</title>
	</head>

	<body>
		<?php require_once(__DIR__.'/scrollable_file_viewer.php'); ?>

		<div id="main">
			<?php require_once(__DIR__.'/header.php'); ?>
	
			<?php if (isset($_SESSION['modify_error'])&&$_SESSION['modify_error']): ?>
				<p>mauvaises entrées sur title ou text.</p>
			<?php endif; ?>

			<ul>
				Commands: 
				<li>add /*e*/ for a line break</li>
				<li>add /*a: id of file */</li>
			</ul>
			<form method="post" action="submit_modify.php">
				<div>
					<label for="title">Title: </label>
					<?php echo '<input type="text" name="title" value="'.$article["title"].'">' ?>
				</div>
	
				<div>
					<label for="text">Text: </label>
					<textarea name="text"><?php echo $article["text"] ?></textarea>
				</div>
				<?php echo '<input type="text" name="id" value="'.$article["id"].'" hidden>' ?>
				<button type="submit">Modify</button>
			</form>
		</div>

		<?php require_once(__DIR__.'/footer.php'); ?>
	</body>
</html>