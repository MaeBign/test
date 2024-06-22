<?php
session_start();
require_once(__DIR__.'/variables.php');
require_once(__DIR__.'/functions.php');

if (isset($_FILES['toUpload'])&&$_FILES["toUpload"]["error"]===0){
	$info=pathinfo($_FILES['toUpload']["name"]);
	if (in_array($info["extension"], $allowed_img)||in_array($info["extension"], $allowed_video)){
		$query="INSERT INTO `uploads` (`id`, `name`, `date`, `extension`) VALUES (NULL, :name, :TheDate, :extension)";
		$statement=$mysql->prepare($query);
		$statement->execute([
			"name"=>basename($_FILES['toUpload']['name']),
			"TheDate"=>time(),
			"extension"=>$info["extension"]
		]);

		$query="SELECT id FROM uploads ORDER BY date DESC";
		$statement=$mysql->prepare($query);
		$statement->execute();
		$file_id=$statement->fetchAll();
		$id=$file_id[0][0];
		if (in_array($info["extension"], $allowed_img))
		{
			move_uploaded_file($_FILES['toUpload']["tmp_name"], __DIR__.'/upload/'.$id.'.'.$info["extension"]);
		}
		else{
			move_uploaded_file($_FILES['toUpload']["tmp_name"], __DIR__.'/upload/videos/'.$id.'.'.$info["extension"]);
		}
		$_SESSION['upload_error']=false;
		redirectTo("upload.php");
	}
	else{
		$_SESSION['upload_error']=true;
		redirectTo("upload.php");
	}
}
else{
	redirectTo("upload.php");
}

?>