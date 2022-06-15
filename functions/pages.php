<?php
	function printPages($url, $pagesCount, $activePage)
	{
		if ($activePage - 1 >= 1)
			echo '<a class="btn page-btn" href="' . $url . '?page=' . ($activePage - 1) . '" style="padding-top: 2px; padding-bottom: 10px;">&lang;</a>';
		else
			echo '<a class="btn page-btn" href="#" style="padding-top: 2px; padding-bottom: 10px;">&lang;</a>';

		if ($activePage - 3 > 1)
		{
			echo '<a class="btn page-btn" href="' . $url . '?page=' . (1) . '">1</a> ... ';
		}
		else if ($activePage - 3 == 1)
		{
			echo '<a class="btn page-btn" href="' . $url . '?page=' . (1) . '">1</a>';
		}

		for ($i = max($activePage - 2, 1); $i <= min($activePage + 2, $pagesCount); $i++)
		{
			echo '<a class="btn page-btn" href="' . $url . '?page=' . ($i) . '">' . $i . '</a>';
		}

		if ($activePage + 3 < $pagesCount)
		{
			echo ' ... <a class="btn page-btn" href="' . $url . '?page=' . ($pagesCount) . '">' . $pagesCount . '</a>';
		}
		else if ($activePage + 3 == $pagesCount)
		{
			echo '<a class="btn page-btn" href="' . $url . '?page=' . ($pagesCount) . '">' . $pagesCount . '</a>';
		}

		if ($activePage + 1 <= $pagesCount)
			echo '<a class="btn page-btn" href="' . $url . '?page=' . ($activePage + 1) . '" style="padding-top: 2px; padding-bottom: 10px;">&rang;</a>';
		else
			echo '<a class="btn page-btn" href="#" style="padding-top: 2px; padding-bottom: 10px;">&rang;</a>';
	}
?>