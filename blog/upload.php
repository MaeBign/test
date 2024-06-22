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
		<title>Upload</title>
	</head>

	<body>
		<div id="main">
			<?php require_once(__DIR__."/header.php"); ?>

			<?php if (isset($_SESSION['upload_error'])&&$_SESSION['upload_error']): ?>
				<p>Erreur d'envoie.</p>
			<?php endif; ?>

			<form method='post' action="submit_upload.php" enctype="multipart/form-data">
				<input type="file" name="toUpload">
				<button type="submit">Upload</button>
			</form>

			<div id='imgList'>
				<?php foreach ($files as $file): ?>
					<article>
						<?php if(in_array($file["extension"], $allowed_img)): ?>
							<?php echo '<a href="file_bigger_view.php?id='.$file["id"].'"><img src="upload/'.$file["id"].'.'.$file["extension"].'" alt="Img non disponible" class="img" /></a>'; ?>
							<p class="date"><?php echo date("Y-m-d",$file["date"]); ?></p>
							<p class="date"><?php echo date("h:i a",$file["date"]); ?></p>
							<?php echo '<a href="file_delete.php?id='.$file["id"].'">Delete</a>'; ?>
						<?php else: ?>
							<?php echo '<a href="file_bigger_view.php?id='.$file["id"].'">'; ?>
							<video width="100px" height="100px">
								<?php echo '<source src="upload/videos/'.$file["id"].'.'.$file["extension"].'" type="video/'.$file["extension"].'"></a>'; ?>
							</video>
							<?php echo '</a>'; ?>
							<p class="date"><?php echo date("Y-m-d",$file["date"]); ?></p>
							<p class="date"><?php echo date("h:i a",$file["date"]); ?></p>
							<?php echo '<a href="file_delete.php?id='.$file["id"].'">Delete</a>'; ?>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>

		</div>

		<?php require_once(__DIR__."/footer.php"); ?>
	</body>
</html>