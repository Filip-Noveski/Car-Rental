<div class="split-segment" style="border-right: 2px solid">
	<h2 class="heading">Leave a message</h2>
	<form method="post" action="operations/SQL_Add/send_message.php">
		<?php
			$loggedIn = isset($_SESSION["useremail"]);
			if (!$loggedIn)
			{
				echo '<p class="error">You need to be <a href="Login.php">logged in</a> to send a message.</p>';
			}
			else
			{
				echo '<input class="form-input" type="hidden" name="email" id="email" value="' . htmlentities($_SESSION["useremail"]) . '" />';
			}
		?>
		<p class="form-input-field">
			<label class="form-input-label" for="subject">Subject:</label><br />
			<input class="form-input" type="text" name="subject" id="subject" <?= (!$loggedIn ? 'disabled' : '') ?> />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="body">Message [max: 256 characters]:</label><br />
			<textarea class="form-input form-textarea" name="body" id="body" <?= (!$loggedIn ? 'disabled' : '') ?>></textarea>
		</p>
		<?php
			if ($error != "")
				echo "<p class=\"error\">$error</p>";
			if ($success != "")
				echo "<p class=\"success\">$success</p>";
		?>
		<input type="submit" id="submit" style="display: none" <?= (!$loggedIn ? 'disabled' : '') ?> />
		<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Send message</a>
	</form>
</div>

<div class="split-segment">
	<h2 class="heading"><?= $pageName ?></h2>
	<p>Tel: +389 12 345 678</p>
	<p>Email: info@carrental.com</p>
</div>
