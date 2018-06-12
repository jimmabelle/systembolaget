<?php include ("config/connection.php"); ?>

<?php 
session_start(); 
if(!(isset($_SESSION['epost'])) && ($_SESSION['epost']!="")) {
	header ("Location: login.php?msg=You have to log in!");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<head>
		<meta charset="UTF-8">
		<title>Valkommen till Systembolaget.se</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>
	</head>

<body>

<?php
$outsubmit = $_POST['logout']; 
	if (isset($_POST['logout'])) {	
		session_destroy(); 
			header ("Location: index.php?msg=You are now logged out!");
}
?>

<nav>
	<ul class="edit_ul">
		<li class="link_addadryck"><a href="addadryck.php" class="fa fa-file-text">	Lägg till dryck</a></li>
		<li class="link_data"><a href="productdata.php" class="fa fa-table"> Tabell drycker</a></li>
		<li class="edit_inpt_outsubmit">
			<form action="../index.php" method="POST" name="logout">
			<input class="outsubmit" type="submit" name="outsubmit" value="Logga ut" >
			</form>
		</li>	
	</ul>
</nav>


<?php
$id = $_POST["id"];
$artikelid = $_POST['Artikelid'];
$varnummer = $_POST['Varnummer'];
$namn = $_POST['Namn'];
$namn2 = $_POST['Namn2'];
$prisinklmoms = $_POST['Prisinklmoms'];
$pant = $_POST['Pant'];
$volymiml = $_POST['Volymiml'];
$prisperliter = $_POST['PrisPerLiter'];
$saljstart = $_POST['Saljstart'];
$slutlev = $_POST['Slutlev'];
$varugrupp = $_POST['Varugrupp'];
$forpackning = $_POST['Forpackning'];
$forslutning = $_POST['Forslutning'];
$ursprung = $_POST['Ursprung'];
$ursprunglandnamn = $_POST['Ursprunglandnamn'];
$producent = $_POST['Producent'];
$leverantor = $_POST['Leverantor'];
$argang = $_POST['Argang'];
$provadargang = $_POST['Provadargang'];
$alkoholhalt = $_POST['Alkoholhalt'];
$sortiment = $_POST['Sortiment'];
$ekologisk = $_POST['Ekologisk'];
$koscher = $_POST['Koscher'];
$ravarorbeskrivning = $_POST['RavarorBeskrivning'];

	if (isset($_POST['update'])) {
		
		$sqlUpdate = "UPDATE sortiment1 SET Artikelid='".$artikelid."', Varnummer='".$varnummer."', Namn='".$namn."', Namn2='".$namn2."', Prisinklmoms='".$prisinklmoms."', Pant='".$pant."',  Volymiml='".$volymiml."', PrisPerLiter='".$prisperliter."', Saljstart='".$saljstart."', Slutlev='".$varugrupp."', Varugrupp='".$varugrupp."', Forpackning='".$forpackning."', Forslutning='".$forslutning."', Ursprung='".$ursprung."', Ursprunglandnamn='".$ursprunglandnamn."', Producent='".$producent."', Leverantor='".$leverantor."', Argang='".$argang."', Provadargang='".$provadargang."',  Alkoholhalt='".$alkoholhalt."',  Sortiment='".$sortiment."', Ekologisk='".$ekologisk."', Koscher='".$koscher."', RavarorBeskrivning='".$ravarorBeskrivning."' WHERE id='".$id."'  ";
		
		$sqlResult = mysqli_query($conn, $sqlUpdate);
				
			if($sqlResult === TRUE) {
				echo "Uppdaterad!";
				echo "<meta http-equiv='refresh' content='3; url=http://u1024421.fsdata.se/bolaget/admin/productdata.php'>";
			}else {
				echo "Fel!";
			}
	}



	
$id = $_GET['id'];
$sql = "SELECT * From sortiment1 WHERE id='".$id."' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

	if ($count > 0) {
			echo "<div id='edit_wrapper'>";
			echo "<div id='edit_content'>";
			echo "<form action='edit.php' method='post'>";
			echo "<input type='hidden' name='id' value='".$id."'>";
			echo "<table id='edit_tb'>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				
				echo "<tr><td class='edit_artikel'>Artikel Id</td><td class='edit_row'><input name='Artikelid' value='".$row['Artikelid']."'></td></tr>";
				echo "<tr><td class='edit_varnummer'>Varnummer</td><td class='edit_row'><input name='Varnummer' value='".$row['Varnummer']."'></td></tr>";
				echo "<tr><td class='edit_namn'>Namn</td><td class='edit_row'><input name='Namn' value='".$row['Namn']."'></td></tr>";
				echo "<tr><td class='edit_namn2'>Namn2</td><td class='edit_row'><input name='Namn2' value='".$row['Namn2']."'></td></tr>";
				echo "<tr><td class='edit_prisinklmoms'>Prisinklmoms</td><td class='edit_row'><input name='Prisinklmoms' value='".$row['Prisinklmoms']."'></td></tr>";
				echo "<tr><td class='edit_pant'>Pant</td><td class='edit_row'><input name='Pant' value='".$row['Pant']."'></td></tr>";
				echo "<tr><td class='edit_volymiml'>Volymiml</td><td class='edit_row'><input name='Volymiml' value='".$row['Volymiml']."'></td></tr>";
				echo "<tr><td class='edit_prisperliter'>PrisPerLiter</td><td class='edit_row'><input name='PrisPerLiter' value='".$row['PrisPerLiter']."'></td></tr>";
				echo "<tr><td class='edit_saljstart'>Saljstart</td><td class='edit_row'><input name='Saljstart' value='".$row['Saljstart']."'></td></tr>";
				echo "<tr><td class='edit_slutlev'>Slutlev</td><td class='edit_row'><input name='Slutlev' value='".$row['Slutlev']."'></td></tr>";
				echo "<tr><td class='edit_varugrupp'>Varugrupp</td><td class='edit_row'><input name='Varugrupp' value='".$row['Varugrupp']."'></td></tr>";
				echo "<tr><td class='edit_forpackning'>Forpackning</td><td class='edit_row'><input name='Forpackning' value='".$row['Forpackning']."'></td></tr>";
				echo "<tr><td class='edit_forslutning'>Forslutning</td><td class='edit_row'><input name='Forslutning' value='".$row['Forslutning']."'></td></tr>";
				echo "<tr><td class='edit_ursprung'>Ursprung</td><td class='edit_row'><input name='Ursprung' value='".$row['Ursprung']."'></td></tr>";
				echo "<tr><td class='edit_ursprunglandnamn'>Ursprunglandnamn</td><td class='edit_row'><input name='Ursprunglandnamn' value='".$row['Ursprunglandnamn']."'></td></tr>";
				echo "<tr><td class='edit_producent'>Producent</td><td class='edit_row'><input name='Producent' value='".$row['Producent']."'></td></tr>";
				echo "<tr><td class='edit_leverantor'>Leverantor</td><td class='edit_row'><input name='Leverantor' value='".$row['Leverantor']."'></td></tr>";
				echo "<tr><td class='edit_argang'>Argang</td><td class='edit_row'><input name='Argang' value='".$row['Argang']."'></td></tr>";
				echo "<tr><td class='edit_provadargang'>Provadargang</td><td class='edit_row'><input name='Provadargang' value='".$row['Provadargang']."'></td></tr>";
				echo "<tr><td class='edit_alkoholhalt'>Alkoholhalt</td><td class='edit_row'><input name='Alkoholhalt' value='".$row['Alkoholhalt']."'></td></tr>";
				echo "<tr><td class='edit_sortiment'>Sortiment</td><td class='edit_row'><input name='Sortiment' value='".$row['Sortiment']."'></td></tr>";
				echo "<tr><td class='edit_ekologisk'>Ekologisk</td><td class='edit_row'><input name='Ekologisk' value='".$row['Ekologisk']."'></td></tr>";
				echo "<tr><td class='edit_koscher'>Koscher</td><td class='edit_row'><input name='Koscher' value='".$row['Koscher']."'></td></tr>";
				echo "<tr><td class='edit_ravarorbeskrivning'>RavarorBeskrivning</td><td class='edit_row'><input name='RavarorBeskrivning' value='".$row['RavarorBeskrivning']."'></td></tr>";
							
			}
			echo "</table>";
			echo "<input class='edit_inpt_submit' type='submit' value='Update' name='update'>";
			echo "</form>";
			echo "</div>";
			echo "</div>";
	}
	
?>


</body>
</html>