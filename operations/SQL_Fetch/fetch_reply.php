<?php
	require_once("functions/server.php");

	$messageId = $_GET["messageId"];
	$query = "SELECT * FROM Replies WHERE Id = :id";
	$params = array(":id" => $messageId);
	$message = runQuery($query, $params)[0];
	
	$query = "UPDATE Replies SET Viewed = 1 WHERE Id = :id";
	$params = array(":id" => $messageId);
	runQuery($query, $params);
?>