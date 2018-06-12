<?php include ("config/connection.php");  ?>
<?php include ("template/header.php");  ?>

<?php

//Räknar antal rader i siteUsers
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM siteUsers"); 	
	while ($row = mysqli_fetch_array($result)) {
	 $userName3 = $row['count'];
		echo "We have " .$userName3. " registered users.<br>";	
		
} 

//Hämtar userName and password1 från formuläret
	 $name = $_POST['name'];
     $epost = $_POST['epost'];
     $password1 = md5($_POST['password1']); 
     $password2 = md5($_POST['password2']); 

//Läser register form i skärmen	 
if (isset($_POST['register'])) {
		
		if (empty($_POST['name'])) {
			header("Location: register.php?msg=Fylla i namn!<br>");
			exit();
		}
		
		if (empty($_POST['epost'])) {
			header("Location: register.php?msg=Fylla i epost!");
			exit();
		}
		
		if ((empty($_POST['password1'])) && (empty($_POST['password2']))) {
			header("Location: register.php?msg=Fylla i losenord!<br>");
			exit();
		}
		
		if ($password1 != $password2) {
			header("Location: register.php?msg=Losenord är inte lika!<br>");
			exit();
		}
		
		
		//Kollar SQL för att se ifall det finns redan
		$dbSql = ("SELECT * FROM siteUsers WHERE  epost='".$epost."'");
		$dbResult = mysqli_query($conn, $dbSql);
		$dbNumRows = mysqli_num_rows($dbResult);
		
			if ($dbNumRows > 0) {
				echo 'Ditt konto finns redan!';
			} else {
				 $insertSql = ("INSERT INTO siteUsers (name, epost, password, rePassword) VALUES ('".$name."','".$epost."','".$password1."','".$password2."')");
				 $insertData = mysqli_query($conn, $insertSql);
				 
					 header ("Location: login.php?msg=Your account has been created!");
					 exit();		 
			}		
}

	
		


?>

<div class="reg_wrapper">
  <div class="reg_content">
    <form class="reg_form" method="post" action="register.php">
	  <h2 class="reg_header">Register</h2>
		<p class="namn">Namn: </p>
		<input type="text" name="name" class="reg_name" autofocus>
	    <p class="epost_reg">E-post: </p>
		<input type="text" name="epost" class="reg_epost_inpt" placeholder="Din e-postadress">
		<p class="password_reg">L&ouml;senord: </p>
		<input type="password" name="password1" class="reg_pass1">
		<p class="rePass">Repetera L&ouml;senord: </p>
		<input type="password" name="password2" class="reg_pass2">
		
		<div class="reg_actions">
	     <button type="action" class="action_bttn_reg">Avbryt</button>
         <button type="submit" class="action_primary_bttn_reg" name="register">OK</button>
       </div>
	</form>
  </div>
</div>



<?php include ("template/footer.php");  ?>