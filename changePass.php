<?php include ("config/connection.php");  ?>
<?php include ("template/header.php");  ?>

<?php
//Hämta newpass och newrepeatpass från formuläret
$newpassword = md5($_POST['newpassword']);
$newrepeatpassword = md5($_POST['newrepeatpassword']);
$eposthidden = $_POST['eposthidden'];


//Läser Change Password form i skärmen
if (isset($_POST['submit'])) {
	
	//Verifiera om password1 lika med password2 och i fyllt är tomt
	if(($_POST['newpassword']!=$_POST['newrepeatpassword']) || (empty($_POST['newpassword']))) {
		echo "Fylla i nytt lösenord!";
	} else {
		
		//Kontrollera antal raden från databas
		$sql = ("SELECT * FROM siteUsers WHERE epost='$eposthidden'");
		$result = $conn->query($sql); 
		$count = mysqli_num_rows($result);
		
		if ($result > 0); {
			
			//Updatera databasen med nytt lösenord
			$sql_update = ("UPDATE siteUsers SET password='$newpassword', rePassword='$newrepeatpassword' WHERE epost='$eposthidden'");
			$result_update = mysqli_query($conn, $sql_update) or die(mysqli_error($conn));
			
				if ($result_update > 0) {	
				
					header ("Location: login.php");
					
				} else {
					$error = mysqli_error($conn);
					echo "$error";
				}
		}
	}
}


?>


<div class="changePass_wrapper">
  <div class="changePass_content">
    <form class="changePass_form" method="post" action="changePass.php">
	  <h2 class="changePass_header">Change Password</h2>
		
		<p class="password_changePass">Ny L&ouml;senord: </p>
		<input type="password" name="newpassword" class="changePass_pass1">
		
		<p class="change_rePass">Repetera L&ouml;senord: </p>
		<input type="password" name="newrepeatpassword" class="changePass_pass2">
		
		<input type="hidden" name="eposthidden" value="<?php echo $_GET['epost'] ?>" >
		
		<div class="changePass_actions">
	     <button type="action" class="action_bttn_changePass">Avbryt</button>
         <button type="submit" class="action_primary_bttn_changePass" name="submit">OK</button>
       </div>
	</form>
  </div>
</div>


<?php include ("template/footer.php");  ?>