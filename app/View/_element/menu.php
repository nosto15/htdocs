<?php
	foreach(Model_Menu::go() as $bah => $curr)
	{
		echo("<li><a href=\"$curr[link]\">$curr[title]</a></li>");
	}
?>