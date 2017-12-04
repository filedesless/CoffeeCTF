<?php
	echo "<pre class='w3-left-align' style='overflow-x: scroll;'>";
	system('nmap -F ' . $_POST['target']);
	echo "</pre>";
?>
