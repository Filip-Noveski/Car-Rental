<?php
	require_once("functions/server.php");

	$messageId = $_GET["messageId"];
	$query = "SELECT * FROM Messages WHERE Id = :id";
	$params = array(":id" => $messageId);
	$message = runQuery($query, $params)[0];

	$query = "SELECT * FROM Customers c, Accounts a WHERE UniqueId = :uid AND c.Email = a.Email";
	$params = array(":uid" => $message["Sender"]);
	$customer = runQuery($query, $params)[0];
?>