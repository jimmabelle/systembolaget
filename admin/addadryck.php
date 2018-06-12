<?php include ('config/connection.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Välkommen till Systembolaget.se</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	
<body>
<nav>
	<ul class="edit_ul">
		<li class="link_addadryck"><a href="addadryck.php" class="fa fa-file-text"> L&auml;gg till dryck</a></li>
		<li class="link_data"><a href="productdata.php" class="fa fa-table"> Tabell drycker</a></li>
		<li class="edit_inpt_outsubmit">
			<form action="../index.php" method="POST" name="logout">
			<input class="outsubmit" type="submit" name="submit" value="Logga ut">
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

	if ($artikelid!='' && $varnummer!='' && $namn!='' && $namn2!='' && $prisinklmoms!='' && $pant!='' && $volymiml!='' && $prisperliter!='' && $saljstart!='' && $slutlev!='' && $varugrupp!='' && $forpackning!='' && $forslutning!='' && $ursprung!='' && $ursprunglandnamn!='' && $producent!='' && $leverantor!='' && $argang!='' && $provadargang!='' && $alkoholhalt!='' && $sortiment!='' && $ekologisk!='' && $koscher!='' && $ravarorbeskrivning!='' ) {
		
		$sqlInsert = ("INSERT INTO sortiment1 values('', '".$artikelid."', '".$varnummer."', '".$namn."', '".$namn2."', '".$prisinklmoms."', '".$pant."', '".$volymiml."', '".$prisperliter."', '".$saljstart."', '".$slutlev."', '".$varugrupp."', '".$forpackning."', '".$forslutning."', '".$ursprung."', '".$ursprunglandnamn."', '".$producent."', '".$leverantor."', '".$argang."', '".$provadargang."', '".$alkoholhalt."', '".$sortiment."', '".$ekologisk."', '".$koscher."', '".$ravarorbeskrivning." ') ");
		
	$sqlResult = mysqli_query($conn, $sqlInsert);
		
			if ($sqlResult === TRUE) {
					echo "Finns nu i databasen"; 					
				} else {
					echo "Fel ".$sqlInsert." <br> ".$conn->error ;													
			}
		
	} else {
		echo "<br><br>";
		echo "Fylla i alla F&auml;lt";
		echo "<br><br>";
	}

mysqli_close($conn);
?>

<div id='edit_wrapper'>
 <div<div id='edit_content'>
  <form action="addadryck.php" method='post' >
	<table id='edit_tb'>

		<tr><td class='edit_artikel'>Artikelid</td><td class='edit_row'><input type="text" name="Artikelid" value=""></td></tr>
		<tr><td class='edit_varnummer'>Varnummer</td><td class='edit_row'><input type="text" name="Varnummer" value=""></td></tr>
		<tr><td class='edit_namn'>Namn</td><td class='edit_row'><input type="text" name="Namn" value=""></td></tr>
		<tr><td class='edit_namn2'>Namn2</td><td class='edit_row'><input type="text" name="Namn2" value=""></td></tr>
		<tr><td class='edit_prisinklmoms'>Prisinklmoms</td><td class='edit_row'><input type="text" name="Prisinklmoms" value=""></td></tr>
		<tr><td class='edit_pant'>Pant</td><td class='edit_row'><input type="text" name="Pant" value=""></td></tr>
		<tr><td class='edit_volymiml'>Volymiml</td><td class='edit_row'><input type="text" name="Volymiml" value=""></td></tr>
		<tr><td class='edit_prisperliter'>PrisPerLiter</td><td class='edit_row'><input type="text" name="PrisPerLiter" value=""></td></tr>
		<tr><td class='edit_saljstart'>Saljstart</td><td class='edit_row'><input type="text" name="Saljstart" value=""></td></tr>
		<tr><td class='edit_slutlev'>Slutlev</td><td class='edit_row'><input type="text" name="Slutlev" value=""></td></tr>
		<tr><td class='edit_varugrupp'>Varugrupp</td><td class='edit_row'><input type="text" name="Varugrupp" value=""></td></tr>
		<tr><td class='edit_forpackning'>Forpackning</td><td class='edit_row'><input type="text" name="Forpackning" value=""></td></tr>
		<tr><td class='edit_forslutning'>Forslutning</td><td class='edit_row'><input type="text" name="Forslutning" value=""></td></tr>
		<tr><td class='edit_ursprung'>Ursprung</td><td class='edit_row'><input type="text" name="Ursprung" value=""></td></tr>
		<tr><td class='edit_ursprunglandnamn'>Ursprunglandnamn</td><td class='edit_row'><input type="text" name="Ursprunglandnamn" value=""></td></tr>
		<tr><td class='edit_producent'>Producent</td><td class='edit_row'><input type="text" name="Producent" value=""></td></tr>
		<tr><td class='edit_leverantor'>Leverantor</td><td class='edit_row'><input type="text" name="Leverantor" value=""></td></tr>
		<tr><td class='edit_argang'>Argang</td><td class='edit_row'><input type="text" name="Argang" value=""></td></tr>
		<tr><td class='edit_provadargang'>Provadargang</td><td class='edit_row'><input type="text" name="Provadargang" value=""></td></tr>
		<tr><td class='edit_alkoholhalt'>Alkoholhalt</td><td class='edit_row'><input type="text" name="Alkoholhalt" value=""></td></tr>
		<tr><td class='edit_sortiment'>Sortiment</td><td class='edit_row'><input type="text" name="Sortiment" value=""></td></tr>
		<tr><td class='edit_ekologisk'>Ekologisk</td><td class='edit_row'><input type="text" name="Ekologisk" value=""></td></tr>
		<tr><td class='edit_koscher'>Koscher</td><td class='edit_row'><input type="text" name="Koscher" value=""></td></tr>
		<tr><td class='edit_ravarorbeskrivning'>RavarorBeskrivning</td><td class='edit_row'><input type="text" name="RavarorBeskrivning" value=""></td></tr>
		
	</table>
		
		<input class='edit_inpt_submit' type='submit' name="addnew" value="L&auml;gg till i sortimentet">
		
  </form>
 </div>
</div>


</body>
</html>