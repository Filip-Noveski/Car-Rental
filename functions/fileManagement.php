<?php
	function uploadFile($file, $name, $folder)
	{
		$dir = "../../images/images/$folder/";
		$filePath = $dir . $name . '.' . pathinfo(basename($file["name"]), PATHINFO_EXTENSION);
		move_uploaded_file($file["tmp_name"], $filePath);
	}

	function deleteFile($name, $folder)
	{
		$dir = "../../images/images/$folder/";
		$oldFile = glob("$dir/$name.*")[0];

		unlink($oldFile);
	}

	function createDirectory($name, $folder)
	{
		$dir = "../../images/images/$folder/";
		mkdir("$dir/$name");
	}
?>