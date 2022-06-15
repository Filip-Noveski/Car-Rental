<?php
	if ($_SESSION["admin"] == 1)
	{
		$membershipImg = "images/icons/account_admin.svg";
		$membershipColour = "#029825";
	}
	else if ($_SESSION["salesperson"] == 1)
	{
		$membershipImg = "images/icons/account_sales.svg";
		$membershipColour = "#029825";
	}
	else if ($_SESSION["maintenance"] == 1)
	{
		$membershipImg = "images/icons/account_maintenance.svg";
		$membershipColour = "#029825";
	}
	else if ($_SESSION["customer"] == 1)
	{
		if ($_SESSION["membertype"] == "None")
		{
			$membershipImg = "icons/account_default_white.svg";
			$membershipColour = "transparent";
		}
		else
		{
			$img = glob("images/images/memberships/" . $_SESSION["membertype"] . ".*")[0];
			$membershipImg = "$img";
			switch ($_SESSION["membertype"])
			{
				case "Pro":
					$membershipColour = "#FF2020";
					break;

				case "Premium":
					$membershipColour = "#7d5a44";
					break;

				case "Premium+":
					$membershipColour = "#888888";
					break;

				case "Ultimate":
					$membershipColour = "#ad710c";
					break;
			};
		}
	}
?>

<script tyle="text/javascript" src="<?= $root ?>/js/toggleTheme.js"></script>

<li class="navbar-item hover-text" style="float: right">
	<a class="nav-link" href="#" onclick="return false;">
		Welcome <?= $_SESSION["username"] ?>
	</a>
	<ul class="hover-contents options-list">
		<?php
			if ($_SESSION["customer"] == 1)
			{
				echo '<li class="options-item" onclick="location.href = \'ViewReplies.php\'">';
				echo '<img class="options-img" src="images/icons/messages.svg" />';
				echo '<span class="options-text">Messages</span>';
				echo '</li>';
			}
		?>
		<?php
			if ($_SESSION["customer"] == 1)
			{
				echo '<li class="options-item" onclick="location.href = \'Reservations.php\'">';
				echo '<img class="options-img" src="images/icons/reservations.svg" />';
				echo '<span class="options-text">Vehicle Reservations</span>';
				echo '</li>';
			}
		?>
		<li class="options-item" onclick="location.href = 'operations/logout.php'">
			<img class="options-img" src="images/icons/logout.svg" />
			<span class="options-text">Log out</span>
		</li>
	</ul>
</li>
<li class="navbar-item" style="float: right; margin: 12px 6px;">
	<img class="member-icon" src="<?= $membershipImg ?>" />
</li>

<script type="text/javascript">
	document.getElementById("nav").style.borderColor = '<?= $membershipColour ?>';
</script>