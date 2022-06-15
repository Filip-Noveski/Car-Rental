<?php
	session_start();

	$email = $_POST["email"] ?? "";
	$subject = $_POST["subject"] ?? "";
	$body = $_POST["body"] ?? "";

	if ($email == "" || $subject == "" || $body == "")
	{
		header("Location: ../../Contact.php?error=Please+fill+in+all+fields");
		return;
	}
	
	if (strlen($body) > 256)
	{
		header("Location: ../../Contact.php?error=The+message+is+too+long+(length:+" . strlen($body) . ").+Please+provide+a+message+with+at+most+256+characters.");
		return;
	}

	require_once("../../functions/server.php");
	
	$query = "SELECT UniqueId FROM Customers WHERE Email = :email";
	$params = array(":email" => $email);
	$rows = runQuery($query, $params);

	if (count($rows) < 1)
	{
		header("Location: ../../Contact.php?error=You+are+not+registered+as+a+customer.");
		return;
	}
	$uid = $rows[0]["UniqueId"];

	$query = "INSERT INTO Messages (Sender, Subject, Content, Viewed) VALUES (:uid, :subj, :body, :viewed)";
	$params = array(":uid" => $uid, ":subj" => $subject, ":body" => $body, ":viewed" => false);
	$rows = runQuery($query, $params);
	
	header("Location: ../../Contact.php?success=Message+successfully+submitted.+You+will+receive+a+response+on+this+account+soon.");
?>