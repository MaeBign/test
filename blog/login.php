<?php session_start(); ?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="blog_style.css" rel="stylesheet">
		<title>Login</title>
	</head>

	<body>
		<div id="main">
			<?php require_once(__DIR__.'/header.php'); ?>
	
			<?php 
			if (isset($_SESSION["login_error"])){
				echo $_SESSION["login_error"];
			}
			?>
			<form method="post" action="submit_login.php">
				<div>
					<label for="name">Identifiant: </label>
					<input type="text" name="name">
				</div>
	
				<div>
					<label for="password">Password: </label>
					<input type="Password" name="password">
				</div>
				<button type="submit">Connexion</button>
			</form>
		</div>

		<?php require_once(__DIR__.'/footer.php'); ?>
	</body>
</html>