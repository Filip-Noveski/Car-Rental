<h2 class="heading"><?= $pageName ?></h2>

<?php
	require_once("functions/pages.php");
	$page = $_GET["page"] ?? 1;
	$itemsPerPage = 10;
	printPages("ContactMessages.php", ceil(count($replies) / $itemsPerPage), $page);
	$divLandscape = '<div class="card card-landscape" ';
	$divClose = '</div>';
	for ($i = ($page - 1) * $itemsPerPage; $i <= min(($page) * $itemsPerPage - 1, count($replies) - 1); $i++)
	{
		$message = $replies[$i];
		$jsParams = "{'id': '" . $message["Id"] . "'}";
		$colour = $message["Viewed"] == 1 ? "#20FF20" : "#FF2020";
		echo $divLandscape . 'onclick="location.href = \'ViewReply.php?messageId=' . $message["Id"] . '\'" style="border-color: ' . $colour . '">';

		echo '<p class="message-info"><span class="message-info-head">Subject</span><span class="message-info-text">' . htmlentities($message["Subject"]) . '</span></p>';
		echo '<p class="message-body-preview"><span class="message-info-head">Body preview</span><span class="message-info-text">' . nl2br(htmlentities($message["Content"])) . '</span></p>';

		echo $divClose;
	}
	printPages("ContactMessages.php", ceil(count($replies) / $itemsPerPage), $page);
?>