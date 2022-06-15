<?php
	session_start();

	require "../auth_admin.php";
	require_once("../../functions/fileManagement.php");
	
	$type = $_POST["type"] ?? "";

	if ($type == "")
	{
		header("Location: ../../ManageMemberships.php?error=Server+error.");
		return;
	}
	
	if (!empty($_FILES["logo"])) {
		deleteFile($type, "memberships");
		uploadFile($_FILES["logo"], $type, "memberships");
	}
	else {
		header("Location: ../../ManageMemberships.php?error=Image+not+provided.");
		return;
	}
	
	header("Location: ../../ManageMemberships.php?success=Membership+information+successfully+updated");
?>