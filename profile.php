<?php include("template/header.php"); ?>


<?php
	session_start();
	if (!isset($_SESSION['epost'])) {
		header('Location:login.php');
	}	
?>

<?php echo "Welcome ".$_SESSION['epost']. "!"; ?>
	
	<br>
	<a class="loggedout" href ="logut.php">Log out</a>

<?php include("template/footer.php"); ?>


