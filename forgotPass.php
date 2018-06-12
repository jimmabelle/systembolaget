<?php include ("config/connection.php");  ?>
<?php include ("template/header.php");  ?>

<?php

//Hämtar epost från formuläret
$epost = $_POST['epost'];

$sql = "SELECT * FROM siteUsers WHERE epost='$epost'";
$result = mysqli_query($conn, $sql); //Kopplar mot databas
		

//Denna kod körs om formuläret har lämnats in
if (isset($_POST['submit'])) {
	
	if (empty($_POST['epost'])) {
		echo "Enter epost!";
	}else {
		
		$count = mysqli_num_rows($result);	//Hämtar antalet träffar från databasen
			echo $count;
				
		if ($count > 0) {
			
			$resultFetch = mysqli_fetch_assoc($result);			
			$id = md5($resultFetch['id']);			
			$password = $resultFetch['password'];	
			$epost = $resultFetch['epost'];
			$host = $_SERVER['HTTP_HOST'];			
			$message = "Hello, this is the answer of your request ".$host."\n
			Here are your login details.\n
			Password: ".$password."\n
			E-post: ".$epost."\n
			______________________________________________________________________
			***** CHANGE PASSWORD LINK *****\n
			Click this link to change your password!\n\n
			http://".$host."/bolaget/changePass.php?epost=".$epost."&id=".$id."\n\n
			DO NOT REPLY TO THIS MESSAGE. IT IS AN AUTOMATICALLY GENERATED RESPONSE FROM OUR SERVER!";
			
			mail($epost, "Change Password", $message);
			
				echo "<br>Mailet skickades!";			
		} else {			 
			    echo "Det lyckades inte att skicka!";
		} 
					 		
	}
}

?>

<div class="forgotPass_wrapper">
	<div class="forgotPass_content">
	<form class="forgotPass_form" method="post" action="forgotPass.php">
	  <h2 class="forgotPass_header">Glömt Lösenord</h2><br />
	    
		<p class="epost_forgotPass">E-post: </p>
		<input type="text" name="epost" class="forgot_epost_inpt" placeholder="Din e-postadress">
		
		<div class="forgotPass_actions">
	     <button type="action" class="action_bttn_forgotPass">Avbryt</button>
         <button type="submit" class="action_primary_bttn_forgotPass" name="submit">OK</button>
        </div>
	</form>
    </div>
</div>

<?php include ("template/footer.php");  ?>