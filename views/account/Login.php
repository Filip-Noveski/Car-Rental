<div class="split-segment" style="border-right: 2px solid">
	<h2 class="heading"><?= $pageName ?></h2>
	<form method="post" action="operations/login.php">
		<p class="form-input-field">
			<label class="form-input-label" for="email">Email:</label><br />
			<input class="form-input" type="text" name="email" id="email" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="password">Password:</label><br />
			<input class="form-input" type="password" name="password" id="password" />
		</p>
		<?php
			if ($error != "")
				echo "<p class=\"error\">$error</p>";
			if ($success != "")
				echo "<p class=\"success\">$success</p>";
		?>
		<input type="submit" id="login" style="display: none" />
		<a class="btn" href="#" onclick="document.getElementById('login').click(); return false;">Log in</a>
	</form>
</div>

<div class="split-segment">
	<p>Don't have an account?</p>
	<a class="btn" href="Register.php">Register</a>
</div>