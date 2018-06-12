<?php include ("config/connection.php");  ?>
<?php include ("config/count.php"); ?>
<?php include ("functions/functions.php"); ?>
<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Valkommen till Systembolaget.se</title>		
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>
		
		
	</head>
<body>
  <div class="topbar-align">
	
	<?php cart(); ?>
	
	<div class="topbar">
		<div class="barsicon"><a href="cart.php"><i class="fa fa-bars"><span class="totalItems"><?php total_items(); ?></span></i><span class="alladrycker">Drycklista</span></a></div>			
			<div class="usericon"><a href="login.php"><i class="fa fa-user"></i></a></div>
	</div>
  </div>

	<div class="container">
		<div class="bolagetslogo"><a href="index.php"><img src="img/logo/systembolaget-logo.png" alt="systembolaget logo"></a></div>
			<div class="container-list">
				<ul class="navlist">
					<li><h5 class=""><a class="dryck" href="#">Sök dryck</a></h5></li>
					<li><h5 class=""><a class="fakta" href="#">Fakta & Nyheter</a></h5></li>
					<li><h5 class=""><a class="passa" href="#">Vad passar till?</a></h5></li>
					<li><h5 class=""><a class="alkohol" href="#">Om alkohol</a></h5></li>
					<li><h5 class=""><a class="uppdrag" href="#">Vårt uppdrag</a></h5></li>
					<li><h5 class=""><a class="tider" href="#">Öppettider</a></h5></li>
				</ul>
			</div>
	 </div>
	
	<div class="dotted">
	<hr class="efter-dotted">	
	</div>
	
	
	 <div id="cartWrapper">
		<div id="cartContent">
		
		<form action="" method="POST" enctype="multipart/form-data">
		
			
			<div><h2 class="dryckelista-heading">Dryckeslista</h2></div>
			
			<div><img class="dryckelista-img" src="img/icon/dryckeslista-ikon.png" alt="" width="" height=""></div>
			
			
			
			<div>
			
				<p><span class="dryckelista-span-text">Du kan inte beställa drycker som finns i vald butik</span></p>
			
				<div class="dryckelista-div-text">Välj Butik för att Visa Saldo<i class="fa fa-arrow-down fa-lg"></i>
				
					<div>
						<ul class="dryckelista-ul">
							<li class="dryckelista-li-prnt"><i class="fa fa-print fa-lg"></i></li>
							<li class="dryckelista-li-bttn"><button style="border:none; background:none;"><i class="fa fa-share-square-o fa-lg"></i></button></li>
						</ul>
					</div>
			
				</div>
			
			
	<?php
		
	$total = 0;
	
	$bestall = "Beställ";
		
	global $conn;
	
	$ip = getIp();
	
	$sel_price = "SELECT * FROM cart where ip_add='$ip'"; 
	$run_price = mysqli_query($conn, $sel_price);
	
	while($p_price = mysqli_fetch_assoc($run_price)) {
		
		$pro_id = $p_price['p_id'];
		
		$pro_price = "SELECT * FROM sortiment1 where id='$pro_id'";
		$run_pro_price = mysqli_query($conn, $pro_price);
		
		while ($pp_price = mysqli_fetch_assoc($run_pro_price)) {
			
			$prisinklmoms = array($pp_price['Prisinklmoms']);	
			$namn = utf8_encode($pp_price['Namn']);
			$namn2 = utf8_encode($pp_price['Namn2']);
			$volymiml = $pp_price['Volymiml'];
			$perPris = $pp_price['Prisinklmoms'];
			
			
			$values = array_sum($prisinklmoms);
			
			$total += $values;
			
		
	?>
				<table class="dryckelista-table">
					<tr>
						<td>
							<input class="dryckelista-inpt" type="text" size="" name="qty" value="<?php echo $_SESSION['qty']; ?>">
								
								<?php
								
								if(isset($_POST['update_cart'])) {
									
									$qty = $_POST['qty'];
									
									$update_qty = "UPDATE cart set qty='$qty'";
									$run_qty = mysqli_query($conn, $update_qty);
									
									$_SESSION['qty'] = $qty; 
									
									$total = $total*$qty;
									
								}
								
								?>
							
							
							
							<img class="dryckelista-img-td" src="img/products/product-placeholder.png" width="50px" height="90px" >
							<p class="dryckelista-namn"><?php echo "<b>$namn</b>". ", " ."$volymiml"; ?> ml</p>
							<p class="dryckelista-namn2"><?php echo "$namn2"; ?></p>
							<p class="dryckelista-pris"><b><?php echo $perPris; ?> :-/st</b></p>
							<button class="dryckelista-trash-bttn" type="text" name="remove[]" value="<?php echo $pro_id; ?>"><i id="dryckelista-trash" class="fa fa-trash-o fa-2x" ></i></button>
						</td>
					</tr>
					
				
	<?php } } ?>
					<input type="hidden" name="update_cart" value="">
				</table>

				<div class="dryckelista-total"><span>Total ( artiklar):</span><span class="dryckelista-total-bold"><b><?php echo $total; ?> :-</b></span></div>				
				<div class="dryckelista-rensa-bestall">
					<input type="hidden" name="update_cart" value="">
					<button class="rensa-bttn">Rensa Listan</button>
					<button class="bestall-bttn"><a href="checkout.php" style="text-decoration:none; color:#fff;"><?php echo $bestall; ?></a></button>
				</div>
				
			</div>
				
		</form>
		
		<?php
		
	function updatecart() {
		
	global $conn;
	
	$ip = getIp();
	
	if(isset($_POST['update_cart'])) {
		
		foreach($_POST['remove'] as $remove_id) {
			
			$delete_product = "DELETE FROM cart where p_id='$remove_id' AND ip_add='$ip' ";
			$run_delete = mysqli_query($conn, $delete_product);
			
				if($run_delete) {
					
					echo "<script>window.open('cart.php','_self')</script>";
				}
		}
	}
	
	echo @$up_cart = update();
	
    }
		
		?>
		
		
		
		
		</div>
	 </div>
	 
	  
	 
	  
	  

    	
	<!-- FOOTER -->
	<footer>
		<!-- footer 1-->
		<div class="footer1">
		<div class="footer-info">
		  <h2 class="contact-medd">Vi svarar gärna på dina frågor i butiken, på telefon, e-post, Twitter och Facebook. Välkommen!</h2>
		  
		  <ul class="contact-list">
				<li><img src="img/icon/icon-sites.png" alt="" width="50px" height="50px" id="sitesico">
					<a href="#" id="siteiconlink">V&#229;ra butiker och ombud</a>
					<p id="sitepara">Adresser och &#246;ppettider f&#246;r v&#229;ra butiker och ombud.</p>
				</li>
				<li><img src="img/icon/10_icon-customer-service.png" alt="" width="50px" height="50px" id="customsrviceicon">
					<a href="#" id="srviceiconlink">kundtjanst@systembolaget.se</a>
					<p id="servicepara">Vi finns p&#229; plats vardagar 9-18 och l&#246;rdagar 10-15.&#160; <a href="#" id="contactno">0771-83 83 00</a></p>
				</li>
				<li><img src="img/icon/icon-twitter.png" alt="" width="50px" height="50px" id="twittericon">
					<a href="#" id="twittericonlink">@systembolaget</a>
					<p id="twittpara">F&#246;lj oss p&#229; Twitter. H&#228;r twittrar vi om aktuella fr&#229;gor.</p>
				</li>
				<li><img src="img/icon/icon-facebook.png" alt="" width="50px" height="50px" id="facebookicon">
					<a href="#" id="fbiconlink">facebook.com/systembolaget</a>
					<p id="fbpara">Diskutera med andra eller st&#228;ll dina fr&#229;gor direkt till oss.</p>
				</li>
		  </ul>
		  
		  <img src="img/footer_image_medarbetare.png" alt="medarbetare" class="medarbetareimg">		  		 
		</div>
		<div>
	
		<!-- Footer 2 -->
		<div class="footer2">
			<div class="upper-bottom-links">
			</div>
		</div>
	
		<!-- Footer 3 -->
		<div class="footer3">
			<div class="content-footer">
				<div class="copyright-footer">&#9426; Systembolaget</div>
		  
				<div class="bottom-links">
					<ul class="container-bottom-links">
						<li><a class="omlankning" href="omlankning.php">Om länkning</a></li>
						<li><a class="omcookies" href="omcookies.php">Om cookies</a></li>
						<li><a class="omwebbplatsen" href="omwebbplatsen.php">Om webbplatsen</a></li>
						<li><a class="allmannavillkor" href="allmannavillkor.php">Allmänna villkor</a></li>
					</ul>
				</div>	
			</div>
		</div>
		
	</footer>
<!-- END CONTAINER -->

	<script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/jquery.js"></script>
	
</body>
</html>
