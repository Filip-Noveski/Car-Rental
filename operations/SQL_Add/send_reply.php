<?php
	session_start();

	$uid = $_POST["uid"] ?? "";
	$messageId = $_POST["message-id"] ?? "";
	$subject = $_POST["subject"] ?? "";
	$body = $_POST["body"] ?? "";

	if ($uid == "" || $subject == "" || $body == "")
	{
		header("Location: ../../ViewMessage.php?messageId=$messageId&error=Please+fill+in+all+fields");
		return;
	}
	
	if (strlen($body) > 256)
	{
		header("Location: ../../ViewMessage.php?messageId=$messageId&error=The+message+is+too+long+(length:+" . strlen($body) . ").+Please+provide+a+message+with+at+most+256+characters.");
		return;
	}

	require_once("../../functions/server.php");

	$query = "UPDATE Messages SET Viewed = 1 WHERE Id = :id";
	$params = array(":id" => $messageId);
	runQuery($query, $params);

	$query = "INSERT INTO Replies (Recepient, Subject, Content, Viewed) VALUES (:uid, :subj, :body, :viewed)";
	$params = array(":uid" => $uid, ":subj" => $subject, ":body" => $body, ":viewed" => false);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ViewMessage.php?messageId=$messageId&success=Reply+successfully+submitted.");
?>