<?php
	session_start();
	if (!isset($_SESSION["useremail"]))
	{
		header("Location: Login.php?error=This+page+is+only+available+to+admins");
		return;
	}

	if (!$_SESSION["admin"])
	{
		header("Location: Login.php?error=This+page+is+only+available+to+admins");
		return;
	}
?>