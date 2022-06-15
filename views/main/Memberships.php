<script type="text/javascript" src="js/membershipPrompts.js"></script>

<div class="card-flex-container">
	<?php
		$email = $_SESSION["useremail"] ?? "---unset---";
		$activeMemb = $_SESSION["membertype"] ?? "";
		for ($i = 0; $i <= count($memberships) - 1; $i++)
		{
			if ($i % 4 == 0)
			{
				echo '<div class="card-flex">';
			}

			$name = $memberships[$i]["Type"];
			$price = $memberships[$i]["Price"];
			$disc = $memberships[$i]["Discount"];
			$duration = $memberships[$i]["Duration"];
			$imgpath = glob("images/images/memberships/$name.*")[0];

			echo '<div class="card card-portrait" onclick="promptPurchase(\'' . $name . '\', \'' . $disc . '\', \'' . $duration . '\', \'' . $price . '\', \'' . $activeMemb . '\', \'' . $email . '\')">';
			echo '<div class="card-portrait-img" style="background-image: url(\'' . $imgpath . '\')"></div>';
			echo '<h3 class="card-heading heading" style="text-align: center; margin: 3px 6px">' . $name . '</h3>';
			echo '<p class="card-info"><span class="card-info-head">Price</span><span class="card-info-text">&euro; ' . $price . '</span></p>';
			echo '<p class="card-info"><span class="card-info-head">Duration</span><span class="card-info-text">' . $duration . ' months</span></p>';
			echo '<p class="card-info"><span class="card-info-head">Discount</span><span class="card-info-text">' . (100 * $disc) . ' %</span></p>';
			echo '</div>';

			if ($i % 4 == 3)
			{
				echo '</div>';
			}
		}
	?>
</div>

<?php
	if ($error != "")
		echo "<p class=\"error\">$error</p>";
	if ($success != "")
		echo "<p class=\"success\">$success</p>";
?>

<div class="popup-background" id="prompt-purchase">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/purchase_membership.php" enctype="multipart/form-data">
			<input type="hidden" id="type" name="type" />
			<input type="hidden" id="email" name="email" />
			<h3 class="heading">Purchase membership</h3>
			<p id="purchase-info"></p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Purchase</a>
			<a class="btn" href="#" onclick="document.getElementById('prompt-purchase').style.display = 'none'; return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-login">
	<div class="popup-box">
		<h3 class="heading">Please log in</h3>
		<p>You need to be loggd in to purchase memberships.</p>
		<a class="btn" href="Login.php" onclick="">Log in</a>
		<a class="btn" href="#" onclick="document.getElementById('prompt-login').style.display = 'none'; return false;">Cancel</a>
	</div>
</div>

<div class="popup-background" id="prompt-member">
	<div class="popup-box">
		<h3 class="heading">You are a member</h3>
		<p>You have already purchased a membership. You may purchase another once your current one expires</p>
		<a class="btn" href="#" onclick="document.getElementById('prompt-member').style.display = 'none'; return false;">Ok</a>
	</div>
</div>