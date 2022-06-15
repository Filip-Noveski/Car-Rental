<?php
	session_start();

	require "../auth_admin.php";

	$id = $_POST["id"] ?? "";

	if ($id == "")
	{
		header("Location: ../../ManageBranches.php?error=Server+error.+Please+try+again.");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE Branch SET Valid = 0 WHERE Id = :id";
	$params = array(":id" => $id);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageBranches.php?success=Branch+successfully+deleted");
?>