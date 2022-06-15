<script tyle="text/javascript" src="<?= $root ?>/js/toggleTheme.js"></script>

<?php
	if (isset($_SESSION["useremail"]))
	{
		require("views/partial/_NavRightUser.php");
	}
	else
	{
		require("views/partial/_NavRightGuest.php");
	}
?>
<li class="navbar-item" style="float: right">
	<div class="theme-container">
		<div class="theme-info-container">
			<p class="theme-info-text">Toggle Theme</p>
		</div>
		<div class="theme-back" onclick="toggleTheme()">
			<div class="theme-toggle" id="theme-toggle"></div>
		</div>
	</div>
</li>