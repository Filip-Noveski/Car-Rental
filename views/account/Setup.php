<div class="split-segment" style="border-right: 2px solid">
	<h2 class="heading"><?= $pageName ?></h2>
	<form method="post" action="operations/setup_account.php">
		<p class="form-input-field">
			<label class="form-input-label" for="email">Email:</label><br />
			<input class="form-input" type="text" name="email" id="email" value="<?= htmlentities($email) ?>" readonly />
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
		<input type="submit" id="login" style="display: none" />
		<a class="btn" href="#" onclick="document.getElementById('login').click(); return false;">Submit Password</a>
	</form>
</div>

<div class="split-segment">
	<p>
		This account has been created by an administrator.
		It is currently disabled.
		Set the password you wish to use for this account.
	</p>
</div>