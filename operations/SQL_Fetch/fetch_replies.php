<?php
	require_once("functions/server.php");

	$query = "SELECT UniqueId FROM Customers WHERE Email = :email";
	$params = array(":email" => $_SESSION["useremail"]);
	$rows = runQuery($query, $params);
	if (count($rows) < 1)
	{
		header("Location: Login.php?error=This+page+is+reserved+for+registered+customers");
		return;
	}
	$uid = $rows[0]["UniqueId"];

	$query = "SELECT * FROM Replies WHERE Recepient = :uid ORDER BY Viewed ASC, Id DESC";
	$params = array(":uid" => $uid);
	$replies = runQuery($query, $params);
?>