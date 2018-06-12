<?php
	session_start();
	
	if (session_destroy()) {
		echo "<meta http-equiv='refresh' content='1;URL=login.php' />";		
	}
	
?>
<p>Du är utloggad!</p>