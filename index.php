<?php include ("config/connection.php");  ?>
<?php include ("config/count.php"); ?>
<?php include ("functions/functions.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Valkommen till Systembolaget.se</title>		
		<link rel="stylesheet" type="text/css" href="css/style.css">		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Lato|Open+Sans' rel='stylesheet' type='text/css'>
		
		<script type="text/javascript">
		var imagecount = 1;
		var total = 6;
		
			function slide(x) {
			var image = document.getElementById('img');
			imagecount = imagecount + x;
			
			if (imagecount > total) {
				imagecount = 1;
			}
			if (imagecount < 1) {
				imagecount = total;
			}
			image.src = "img/wallpaper/img"+imagecount+".jpg";			
			} 
			
			//Set it automatic
			window.setInterval (function slideA() {
			var image = document.getElementById('img');
			imagecount = imagecount + 1;
			
			if (imagecount > total) {
				imagecount = 1;
			}
			if (imagecount < 1) {
				imagecount = total;
			}
			image.src = "img/wallpaper/img"+imagecount+".jpg";			
			},3000); 
				
	
	</script>		
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
	
	<!-- SEARCH -->
	<div class="search-dryck">
	  <h1 class="search-bland-dryck">Sök bland <?php echo $userCount; ?> drycker</h1><br>
		<form class="search-form" action="index.php" method="get">
			<div id="search-div">
				<input type="search" id="search-inpt" name="search" placeholder="S&ouml;k dryck, land, varunummer, druva etc." >
				<button type="submit" id="search" name="submit"><i class="fa fa-search"></i></button>
			</div>
		</form>
	 </div>
	 
	 <!-- WALLPAPER -->
	  <div id="wallpaper">
		    <div class="container-wallpaper"><img src="img/wallpaper/img1.jpg" id="img" /></div>
			<div id="leftHolder"><img src="img/arrowLeft.png" onclick="slide(-1)" class="left" /></div>
			<div id="rightHolder"><img src="img/arrowRight.png" onclick="slide(1)" class="right" /></div>	
	  </div>
	  
	  <?php include("search.php"); ?>
	  
	  <!-- SECTION -->
	  <div class="section">
			<div id="sectionLeft"><img src="img/healthyliving/parent-child1.jpg" alt="parent-child" class="leftimg" /></div>
			<div id="sectionRight"><img src="img/healthyliving/fruits1.jpg" alt="fruits" class="rightimg"/></div>
			
			
			<div class="pratomtonaring">
				<h5 class="leftHeading"><i id="arrowLeft"class="fa fa-arrow-circle-right"></i>Så pratar du alkohol med din tonåring</h5>
				<p class="leftPara">Fråga ditt barn vad de känner inför alkohol. Lyssna ordentligt. Är du orolig, säg det rakt ut. Bli inte förbannad, men var tydlig."</p>
			</div>
			
			<div class="vegetariskt">
				<h5 class="rightHeading"><i id="arrowRight" class="fa fa-arrow-circle-right"></i>Dags för vegetariskt?</h5>
				<p class="rightPara">Många vegetariska rätter har sitt ursprung från Asien eller kring Medelhavet. Få tips på passande dryck till vegetariskt.</p>
			</div>
			
	  </div>
	  
	  <br/>
	  <br/>

    	
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
