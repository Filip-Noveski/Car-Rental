<div class="split-segment" style="border-right: 2px solid">
	<h2 class="heading"><?= $pageName ?></h2>
	<form method="post" action="operations/register.php">
		<p class="form-input-field">
			<label class="form-input-label" for="first">First Name:</label><br />
			<input class="form-input" type="text" name="first" id="first" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="last">Last Name:</label><br />
			<input class="form-input" type="text" name="last" id="last" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="uid">Unique Id:</label><br />
			<input class="form-input" type="text" name="uid" id="uid" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="phone">Phone Number:</label><br />
			<input class="form-input" type="tel" name="phone" id="phone" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="email">Email:</label><br />
			<input class="form-input" type="text" name="email" id="email" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="password">Password:</label><br />
			<input class="form-input" type="password" name="password" id="password" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="conf-password">Confirm Password:</label><br />
			<input class="form-input" type="password" name="conf-password" id="conf-password" />
		</p>
		<?php
			if ($error != "")
				echo "<p class=\"error\">$error</p>";
			if ($success != "")
				echo "<p class=\"success\">$success</p>";
		?>
		<input type="submit" id="register" style="display: none" />
		<a class="btn" href="#" onclick="document.getElementById('register').click(); return false;">Register</a>
	</form>
</div>

<div class="split-segment">
	<p>
		By registering to this site, you agree to our
		<a href="Terms.php">Terms & Conditions</a> and
		<a href="Privacy.php">Privacy Policy</a>.
	</p>
</div>