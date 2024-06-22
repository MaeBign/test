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
		<title>Add</title>
	</head>

	<body>
		<?php require_once(__DIR__.'/scrollable_file_viewer.php'); ?>

		<div id="main">
			<?php require_once(__DIR__.'/header.php'); ?>
	
			<?php if (isset($_SESSION['add_error'])&&$_SESSION['add_error']): ?>
				<p>mauvaises entrées sur title ou text.</p>
			<?php endif; ?>
			
			<ul>
				Commands: 
				<li>add /*e*/ for a line break</li>
				<li>add /*a: id of file */</li>
			</ul>
			<form method="post" action="submit_add.php">
				<div>
					<label for="title">Title: </label>
					<input type="text" name="title">
				</div>
	
				<div>
					<label for="text">Text: </label>
					<textarea name="text"></textarea>
				</div>
				<button type="submit">Add</button>
			</form>
		</div>

		<?php require_once(__DIR__.'/footer.php'); ?>
	</body>
</html>