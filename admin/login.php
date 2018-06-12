<?php include ("config/connection.php"); ?>
<?php include ("header.php"); ?>

<?php

	// username and password sent from form
	$epost = $_POST['epost'];
	$password = md5($_POST['password']);
	
	
	// To protect MySQL injection (more detail about MySQL injection)
	//$epost = stripslashes($epost);
	//$password = stripslashes($password);
	//$epost = mysql_real_escape_string($conn, $epost);
	//$password = mysql_real_escape_string($conn, $password);
	
if (isset($_POST['submit'])){
		
		if (empty($epost) || empty($password))	{			
			echo "Fyll i alla fält";		
		} else {
			
		//Kollar SQL för att se ifall det finns redan	
		$dbSql = "SELECT * FROM admin WHERE epost='".$epost."' AND password='".$password."'";
		$dbResult = mysqli_query($conn, $dbSql);				
		$dbNumRows = mysqli_num_rows($dbResult);	
		
			if ($dbNumRows > 0) {
				
				$_SESSION['epost'] = $epost;
				$login = date("y-m-d H:M:S");
								
					$UpdateQuery = ("UPDATE admin SET login = '".$login."' WHERE epost = '".$epost."'");
					$UpdateResultQuery = mysqli_query($conn, $UpdateQuery);
						
					header("Location: productdata.php");
					exit();
			} else {
					echo "<a href='forgotPass.php'><br>Fel lösenord!</a>";
			}          
		}		
}

?>

<div class="login_wrapper">
  <div class="login_content">
  <form class="login_form" method="post" action="login.php">
    <h2 class="login_header">Logga in</h2><br />
       <p class="epost">E-post: </p>
       <input type="text" class="login_epost" name="epost" placeholder="Din e-postadress" autofocus><br />	
       <p class="password">Lösenord: </p>
       <input type="password" class="login_password" name="password"><br /><br />
   
	   <div class="options">
	     <a class="forgotPass_link" href="forgotPass.php">Glömt Lösenord</a>
	     <a class="reg_link" href="register.php">Skapa Konto</a>
	   </div>
	
	   <div class="actions">
	     <button type="action" class="action_button">Avbryt</button>
         <button type="submit" class="action_primary_button" name="submit">OK</button>
       </div>
  </form>
  </div>
</div>


<?php include ("footer.php"); ?>