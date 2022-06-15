<?php
	session_start();

	require "../auth_admin.php";
	require_once("../../functions/fileManagement.php");

	$name = $_POST["name"] ?? "";
	
	if (!empty($_FILES["logo"])) {
		deleteFile($name, "car_groups");
		uploadFile($_FILES["logo"], $name, "car_groups");
	}

	header("Location: ../../ManageCarGroups.php?success=Group+successfully+updated");
?>