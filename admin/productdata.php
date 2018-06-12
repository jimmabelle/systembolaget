<?php include ('config/connection.php'); ?>

<?php 
session_start(); 
if(!(isset($_SESSION['epost'])) && ($_SESSION['epost']!="")) {
	header ("Location: login.php?msg=You have to log in!");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Valkommen till Systembolaget.se</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	
<body>
<nav>
	<ul class="edit_ul">
		<li class="link_addadryck"><a href="addadryck.php" class="fa fa-file-text">	L&auml;gg till dryck</a></li>
		<li class="link_data"><a href="productdata.php" class="fa fa-table"> Tabell drycker</a></li>
		<li class="edit_inpt_outsubmit">
			<form action="../index.php" method="POST" name="logout">
			<input class="outsubmit" type="submit" name="outsubmit" value="Logga ut" >
			</form>
		</li>	
	</ul>
</nav>

<div id="">
	<div id="">		
		<form class="productdata_form" action="productdata.php" method="get">
			<input type="search" id="productdata_inpt"	name="search" placeholder="S&ouml;ka">
			<button type="submit" id="productdata_btn" name="submit"><i class="fa fa-search"></i></button>
		</form>
				
	</div>
</div>

<?php
$submit = $_POST['logout']; 
	if (isset($_POST['logout'])) {	
		session_destroy(); 
			header ("Location: login.php?msg=You are now logged out!");
}
?>


<?php
$search_data = $_GET[search];
$search = utf8_decode($_GET[search]);



$sql = "SELECT * FROM sortiment1 WHERE Ursprunglandnamn LIKE '%$search%' OR Namn LIKE '%$search%' ";
$query = mysqli_query($conn, $sql);
$count = mysqli_num_rows($query);

	$per_page = 20;
	
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$start = ($page - 1) * $per_page;
	
	$a = $count/$per_page;
	$pages = ceil($a);

	if($pages < 1) {
		$pages = 1;	
	}
	
	if($page < 1) {
		$page = 1;
	} else if($page > $pages) {
		$page = $pages;
	}
	

	
$selectSql = "SELECT * FROM sortiment1 WHERE Ursprunglandnamn LIKE '%$search%' OR Namn LIKE '%$search%' LIMIT $start, $per_page";
$sqlResult = mysqli_query($conn, $selectSql); 

if ($count > 0) {
	
	echo "<div class='table_wrapper';>";
	echo "<div class='table_content';>";
	
	echo "<table id='table_admin' border='1'>";
	
	echo "<tr id='table_row_th'>";
		
		echo "<th>Id</th>";
		echo "<th>Artikelid</th>";
		echo "<th>Varnummer</th>";
		echo "<th>Namn</th>";
		echo "<th>Namn2</th>";
		echo "<th>Prisinklmoms</th>";
		echo "<th>Pant</th>";
		echo "<th>Volymiml</th>";
		echo "<th>PrisPerLiter</th>";
		echo "<th>Saljstart</th>";
		echo "<th>Slutlev</th>";
		echo "<th>Varugrupp</th>";
		echo "<th>Forpackning</th>";
		echo "<th>Ursprung</th>";
		echo "<th>Ursprunglandnamn</th>";
		echo "<th>Producent</th>";
		echo "<th>Leverantor</th>";
		echo "<th>Argang</th>";
		echo "<th>Provadargang</th>";
		echo "<th>Alkoholhalt</th>";
		echo "<th>Sortiment</th>";
		echo "<th>Ekologisk</th>";
		echo "<th>Koscher</th>";
		echo "<th>RavarorBeskrivning</th>";
		
		echo "<th>Redigera</th>";
		echo "<th>Tabort</th>";
		
	echo "</tr>";
	
	
	while($row = mysqli_fetch_assoc($sqlResult)) {	
		
			$id = stripslashes($row["id"]);
			$artikelid = stripslashes($row["Artikelid"]);
			$varnummer = stripslashes($row["Varnummer"]);
			$namn = stripslashes(utf8_encode($row["Namn"]));
			$namn2 = stripslashes(utf8_encode($row["Namn2"]));
			$prisinklmoms = stripslashes($row["Prisinklmoms"]);
			$volymiml = stripslashes($row["Volymiml"]);
			$prisperliter = stripslashes($row["PrisPerLiter"]);
			$saljstart = stripslashes($row["Saljstart"]);
			$slutlev = stripslashes($row["Slutlev"]);
			$varugrupp = stripslashes(utf8_encode($row["Varugrupp"]));
			$forpackning = stripslashes($row["Forpackning"]);
			$forslutning = stripslashes($row["Forslutning"]);
			$ursprung = stripslashes(utf8_encode($row["Ursprung"]));
			$ursprunglandnamn = stripslashes(utf8_encode($row["Ursprunglandnamn"]));
			$producent = stripslashes(utf8_encode($row["Producent"]));
			$leverantor = stripslashes(utf8_encode($row["Leverantor"]));
			$argang = stripslashes($row["Argang"]);
			$provadargang = stripslashes($row["Provadargang"]);
			$alkoholhalt = stripslashes($row["Alkoholhalt"]);
			$sortiment = stripslashes($row["Sortiment"]);
			$ekologisk = stripslashes($row["ekologisk"]);
			$koscher = stripslashes($row["Koscher"]);
			$ravarorbeskrivning = stripslashes(utf8_encode($row["RavarorBeskrivning"]));
	
	echo "<tr id='table_row_td'>";
	
		echo "<td id='td_id'>".$id."</td>";
		echo "<td id='td_artikel'>".$artikelid."</td>";
		echo "<td id='td_varnum'>".$varnummer."</td>";
		echo "<td id='td_namn'>".$namn."</td>";
		echo "<td id='td_namn2'>".$namn2."</td>";
		echo "<td id='td_prisinklmoms'>".$prisinklmoms."</td>";
		echo "<td id='td_volym'>".$volymiml."</td>";
		echo "<td id='td_prisperliter'>".$prisperliter."</td>";
		echo "<td id='td_saljstart'>".$saljstart."</td>";
		echo "<td id='td_slutlev'>".$slutlev."</td>";
		echo "<td id='td_varugrupp'>".$varugrupp."</td>";
		echo "<td id='td_forpackning'>".$forpackning."</td>";
		echo "<td id='td_forslutning'>".$forslutning."</td>";
		echo "<td id='td_ursprung'>".$ursprung."</td>";
		echo "<td id='td_ursprunglandnamn'>".$ursprunglandnamn."</td>";
		echo "<td id='td_producent'>".$producent."</td>";
		echo "<td id='td_leverantör'>".$leverantor."</td>";
		echo "<td id='td_argang'>".$argang."</td>";
		echo "<td id=td_'provadargang'>".$provadargang."</td>";
		echo "<td id='td_alkoholhalt'>".$alkoholhalt."</td>";
		echo "<td id='td_sortiment'>".$sortiment."</td>";
		echo "<td id='td_ekologisk'>".$ekologisk."</td>";
		echo "<td id='td_koscher'>".$koscher."</td>";
		echo "<td id='td_ravarorbeskrivning'>".$ravarorbeskrivning."</td>";
		
		echo "<td id='td_edit_content'><a id='td_edit' href='edit.php?id=".$row['id']."'>Edit</a></td>";
		echo "<td id='td_delete_content'><a id='td_delete' href='delete.php?id=".$row['id']."'>Delete</a></td>";
		
			
	echo "</tr>";
	
	}
	
	echo "</table>";
	
	echo "</div>";
	echo "</div>";
	
} else {
	 	 
	 echo '<h2> Det finns inga produkter i databasen. </h2>';
}



$paginationsCntrls = '';

if($pages != 1) {
	
	//previous
	if($page > 1 ) {
		$previous = $page - 1;
		$paginationsCntrls .= '<a class="paginations" href="'.$_SERVER["PHP_SELF"].'?page='.$previous.'">Previous</a> &nbsp; &nbsp; ';
			for($i = $page-4; $i < $page; $i++) {
				if($i > 0) {
				$paginationsCntrls .= '<a class="paginations" href="'.$_SERVER["PHP_SELF"].'?page='.$i.'" >'.$i.'</a> &nbsp; ';	
				}
			}
		
	}
	
	//targeting the page number
	$paginationsCntrls .= ''.$page.' &nbsp; ';
		for($i = $page+1; $i <= $pages; $i++) {
		$paginationsCntrls .= '<a class="paginations" href="'.$_SERVER["PHP_SELF"].'?page='.$i.'" >'.$i.'</a> &nbsp; ';	
			if($i >= $page+4) {
				break;
			}
		}
		
	//next
	if ($page != $pages) {
        $next = $page + 1;
        $paginationsCntrls .= ' &nbsp; &nbsp; <a class="paginations" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a> ';
    }
}

mysqli_close($conn);
?>

<div id="productdata_paginations"><p><?php echo $paginationsCntrls; ?></p></div>

</body>
</html>