<?php include('config/connection.php'); ?>
<?php include ('template/header.php'); ?>



<?php

$id = $_GET['id'];
$sql = "SELECT * FROM sortiment1 WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

	if($rows > 0) {
		
		$sok = '';		
		$desc = '';
		
		while($row = mysqli_fetch_assoc($result)) {
			
			$id = stripslashes($row["id"]);
			$artikelid = stripslashes($row["Artikelid"]);
			$varnummer = stripslashes($row["Varnummer"]);
			$namn = stripslashes(utf8_encode($row["Namn"]));
			$namn2 = stripslashes(utf8_encode($row["Namn2"]));
			$prisinklmoms = stripslashes($row["Prisinklmoms"]);
			$volymiml = stripslashes($row["Volymiml"]);
			$saljstart = stripslashes($row["Saljstart"]);
			$varugrupp = stripslashes(utf8_encode($row["Varugrupp"]));
			$ursprung = stripslashes(utf8_encode($row["ursprung"]));
			$ursprunglandnamn = stripslashes(utf8_encode($row["Ursprunglandnamn"]));
			$producent = stripslashes(utf8_encode($row["Producent"]));
			$leverantor = stripslashes(utf8_encode($row["Leverantor"]));
			$argang = stripslashes($row["Argang"]);
			$alkoholhalt = stripslashes($row["Alkoholhalt"]);
			$ravarorbeskrivning = stripslashes(utf8_encode($row["RavarorBeskrivning"]));
			
			
			$desc .= '<div id="row">
						
						<div id="top_header">
						<a id="link_result" href="index.php"><i class="fa fa-arrow-left"><span> Ditt sökresultat</span></i></a>
						<a id="link_search" href="index.php"><i class="fa fa-search"><span> Ny sökning</span></i></a>
						</div>
						
						<diV class="box_img_placeholder"><img class="box_img" src="img/products/product-placeholder.png" ></div>
						
						<div class="box_details">
							<div class="box_header">
								<div class="category"><span class="varugrupp">'.$varugrupp.'</span></div>
								<h2 class="box_namn">'.$namn.' <small style="font-weight:normal; font-size:15px;">Nr&nbsp;'.$varnummer.'</small></h2>
								<h3 class="land">'.$ursprunglandnamn.'<h3>
								<p class="pris">'.$prisinklmoms.'</p>
								<p class="packaging"><span>'.$volymiml.' ml</span></p>
							</div>
							<div class="box_description">
								<p class="ravarorbeskrivning">'.$ravarorbeskrivning.'<p>
								<div class="box_desc_info">
									<h3 class="saljstart_header">Saljstart</h3>
									<p class="saljstart">'.$saljstart.'</p>
									
									<h3 class="alkoholhalt_header">Alkoholhalt</h3>
									<p class="alkoholhalt">'.$alkoholhalt.'</p>
									
									<h3 class="producent_header">Producent</h3>
									<p class="producent">'.$producent.'</p>
									
									<h3 class="leverantor_header">Leverantor</h3>
									<p class="leverantor">'.$leverantor.'</p>									
								</div>
								<a class="cart_shopping" href="cart.php?id='.$id.'"><button class=box_btn_cart><i id="icon_shopping" class="fa fa-cart-plus fa-2x"> LÄGG TILL DRYCK</i></button></a>
							</div>
						</div>
												
										
					  </div>
			';					
		}
	}

?>

<div id="box_wrapper">
	<div id="box_content">
	<?php echo $desc; ?>
	</div>
</div>


<?php include ('template/footer.php'); ?>