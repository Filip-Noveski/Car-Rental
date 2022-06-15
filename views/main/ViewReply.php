<h2 class="heading"><?= $pageName ?></h2>

<?php
	echo '<p class="message-info"><span class="message-info-head">Subject</span><span class="message-info-text">' . htmlentities($message["Subject"]) . '</span></p>';
	echo '<p class="message-body-preview"><span class="message-info-head">Body preview</span><span class="message-info-text">' . nl2br(htmlentities($message["Content"])) . '</span></p>';
?>

<hr />

<h2 class="heading">Reply</h2>
	<form method="post" action="operations/SQL_Add/send_message.php">
		<input type="hidden" name="email" value="<?= $_SESSION["useremail"] ?>" />
		<p class="form-input-field">
			<label class="form-input-label" for="subject">Subject:</label><br />
			<input class="form-input" type="text" name="subject" id="subject" value="RE: <?= htmlentities($message["Subject"]) ?>" />
		</p>
		<p class="form-input-field">
			<label class="form-input-label" for="body">Message [max: 256 characters]:</label><br />
			<textarea class="form-input form-textarea" name="body" id="body"></textarea>
		</p>
		<?php
			if ($error != "")
				echo "<p class=\"error\">$error</p>";
			if ($success != "")
				echo "<p class=\"success\">$success</p>";
		?>
		<input type="submit" id="submit" style="display: none" />
		<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Send reply</a>
	</form>