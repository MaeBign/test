<?php 
session_start(); 
require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');//<?php echo '<a href="file_bigger_view.php?id='.$file["id"].'"><img src="upload/video.png" alt="Img non disponible" class="img" /></a>';
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

			<div id='imgList'>
				<?php foreach ($files as $file): ?>
					<?php if(in_array($file["extension"], $allowed_img)): ?>
						<?php echo '<a href="file_bigger_view.php?id='.$file["id"].'"><img src="upload/'.$file["id"].'.'.$file["extension"].'" alt="Img non disponible" class="img" /></a>'; ?>
					<?php else: ?>
						<?php echo '<a href="file_bigger_view.php?id='.$file["id"].'">'; ?>
						<video width="100px" height="100px">
							<?php echo '<source src="upload/videos/'.$file["id"].'.'.$file["extension"].'" type="video/'.$file["extension"].'">'; ?>
						</video>
						<?php echo '</a>'; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

		</div>

		<?php require_once(__DIR__."/footer.php"); ?>
	</body>
</html>