<div id='show_files'>
	<div id='imgList' class="add-modify">
		<?php foreach ($files as $file): ?>
			<?php if(in_array($file["extension"], $allowed_img)): ?>
				<?php echo '<img src="upload/'.$file["id"].'.'.$file["extension"].'" alt="Img non disponible" class="img" />'; ?>
				<?php echo '<p>'.$file["id"].'</p>'; ?>
			<?php else: ?>
				<video width="100px" height="100px" class="video">
					<?php echo '<source src="upload/videos/'.$file["id"].'.'.$file["extension"].'" type="video/'.$file["extension"].'">'; ?>
				</video>
				<?php echo '<p>'.$file["id"].'</p>'; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>