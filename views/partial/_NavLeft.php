<li class="navbar-item" style="margin: 6px;"><img class="nav-img" onclick="location.href = 'Index.php';" src="<?= $root ?>/images/icons/logo_colour.svg" id="nav-img" /></li>
<li class="navbar-item"><a class="nav-link" href="Index.php">Home</a></li>
<?php
	if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)
	{
		require "Views/Partial/_NavLeftAdmin.php";
	}
	else if (isset($_SESSION["salesperson"]) && $_SESSION["salesperson"] == 1)
	{
		require "Views/Partial/_NavLeftSales.php";
	}
	else if (isset($_SESSION["maintenance"]) && $_SESSION["maintenance"] == 1)
	{
		require "Views/Partial/_NavLeftMaintenance.php";
	}
	else
	{
		require "Views/Partial/_NavLeftCustomer.php";
	}
?>