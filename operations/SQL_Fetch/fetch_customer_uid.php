<?php
	require_once("functions/server.php");
	
	$query = "SELECT UniqueId FROM Customers WHERE Email = :email";
	$params = array(":email" => $_SESSION["useremail"]);
	$uid = runQuery($query, $params)[0]["UniqueId"];
?>