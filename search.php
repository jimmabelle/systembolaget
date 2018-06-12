<?php

//anslut till databasen
include ("config/connection.php");

$searchinput = $_GET['search'];    
$search = utf8_decode($_GET['search']);  

//räkna hur många rader som finns
$q = "SELECT * FROM sortiment1 WHERE Ursprunglandnamn LIKE '%$search%' OR Namn LIKE '%$search%'";    
$query = mysqli_query($conn, $q);   
$count = mysqli_num_rows($query);

//hur många rader per sida
$per_page = 15;

//kolla om sidan är satt
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

//start
$start = ($page - 1) * $per_page;

//räkna ut hur många sidor det blir
$a = $count/$per_page;
$pages = ceil($a);

//$pages variabeln kan inte bli mindre än 1
if($pages < 1) {
	$pages = 1;
}
		
if($page < 1) {
	$page = 1;
} else if($page > $pages) {
	$page = $pages;
}
		
//hämta data
$select_query = "SELECT * FROM sortiment1 WHERE Ursprunglandnamn LIKE '%$search%' OR Namn LIKE '%$search%' LIMIT $start, $per_page";
$result_query = mysqli_query($conn, $select_query); 

// This shows the user what page they are on, and the total number of pages
$textline1 = "Sortiment (<b>$count</b>)";
$textline2 = "Sidan <b>$page</b> av <b>$pages</b>";
   
if($count == 0) {
	
    echo "Det finns ingen data!";
	
} else {
    
	$list = '';  
 
    while ($row = mysqli_fetch_assoc($result_query)) {
        
		$lasMer = "Läs mer";
		$id = stripslashes($row["id"]);
		$namn = stripslashes(utf8_encode($row["Namn"]));
		$namn2 = stripslashes(utf8_encode($row["Namn2"]));
		$ursprunglandnamn = stripslashes(utf8_encode($row["Ursprunglandnamn"]));
		$prisinklmoms = stripslashes(utf8_encode($row["Prisinklmoms"]));
		
		$list .= '<diV id="prod_list">
					<a class="desc" href="product.php?id='.$id.' ">
						<img class="prod_img" src="img/products/product-placeholder.png" width="50px" height="70px" >
						<p class="namn_row">'.$namn.'</p>
						<p class="namn2_row">'.$namn2.'</p>
						<p class="ursprunglandnamn_row">'.$ursprunglandnamn.'</p>
						<p class="prisinklmoms_row">'.$prisinklmoms.'</p>	
					</a>
						<a class="cart" href="index.php?add_cart='.$id.'"><i id="icon_cart" class="fa fa-cart-plus fa-2x"></i></a>
										
				  </div>
			
		';					
    }  
    
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Valkommen till Systembolaget.se</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/map/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>
	
	</head>	
		
<body>
<div id="product_wrapper">
	<div id="product_content">
	  <h2 class="sort"><?php echo $textline1; ?></h2>
	  <p class="pages"><?php echo $textline2; ?></p>
	  <p class="list_results"><?php echo $list; ?></p>
	  <p class="pagination_controls"><?php echo $paginationsCntrls; ?></p>
	</div>
</div> 
</body>
</html>