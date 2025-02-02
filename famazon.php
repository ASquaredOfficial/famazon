<!DOCTYPE html>
<html>

<head>
<title>Famazon.co.uk: Family is our Zone</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="main_mystyle.css">		<!--css file-->
<link rel="shortcut icon" href="Pictures/famazon-favicon.png" type="image/png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="margin:0;padding:0">
	<div id="header">
	<?php
		//connect to server//
		include "famazon-connect.php";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
		else{
			//ListOfUsers//
			$sql = "SELECT `category` 
					FROM `items`;";
			$result = mysqli_query($conn, $sql); 
			$all_categories = array();
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$all_categories[] = $row["category"];
				//echo $row["category"]."<br>";
			}
			$Categories = json_encode($all_categories);
			//echo $Categories;
		}
	?>
	<script>
		var categories='<?php echo $Categories?>';  // php write into Javascript, as jsontext 
		$(document).ready(function(){
			var arrayOfCategories = JSON.parse(categories);
			
			var select1 = document.getElementById("selectCategory");
			for(var i = 0; i < arrayOfCategories.length; i++) {
				var opt = arrayOfCategories[i];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = opt;
				select1.appendChild(el);
			}
		});
	</script>
	<table style="width:100%;">
		<tr>
			<td><img src="Pictures/Famazon_logo_navydark.png" style="cursor: pointer;" width="144" height="49.5px" alt="Famazon Logo" onclick="window.open('famazon.php', '_self');"></td>
			<td>
			
				<table id="search_bar" class="center" style="border: 2px solid #ff9900; border-radius: 4px; background-color: #ffffff;" cellspacing="0"><tr>
					<tr>
					<td class="selectCategory">
						<select id="selectCategory" name="selectCategory" class="font selectCategory" height="50">
							<option>All</option>
						</select>				
					</td>
					<td bgcolor="#cdcdcd" width="0.1"></td>
					<td><input type="text" size="90" class="font" style="margin:0; font-size:15px; 
							border:0px solid #FFFFFF; border-radius:0; background-color:#FFFFFF; padding: 8px 10px;">
					</td>
					<td id="seacrhButton" class="pointer"></td>
					</tr>
				</table>
			
			</td>
			<td class="font">Hello, 
				<span class="link pointer" onclick="window.open('signin.php', '_self');">Sign in 
				</span>
			</td>
			<td id="basket">1</td>
		</tr>
	</table>
	</div>

	
	<div id="main">		
		<div id="about">
			<table class="center" width="1300px" height="100px" style="border: 1px solid white; background-color:#FFFFFF">
				<tr>
				<td rowspan="2" style="padding-left: 10px;padding-right: 20px;"><img src="Pictures/Famazon_logo_white.png" width="144" height="49.5px" alt="Famazon Logo"></td>
				<td style="vertical-align: text-top; padding:0px; ">
					<p class="font" style="font-size: 20px; margin:0px; padding-top:10px; padding-bottom: 5px;"><b>Welcome to Famazon</b></p>
					<p class="font" style="font-size: 15px; margin:0px; padding:0px;">Hello, welcome to the Famazon Webpage. Our webpage famazon 
						is aimed to helped family by providing products that will improve the well being and daily lives of all of our customers, hence
						our slogan "Family is our Zone". This webpage well inspired by the famous <a style="color: #0066c0" onclick="window.open('amazon.co.uk', '_self');">amazon.</p>
				</td>
				</tr>
			</table>
		<br>
		</div>
		
		<div id="content" >
		
			<table class="center" width="1300px" height="350px" style="border: 1px solid white; background-color:#FFFFFF; padding: 12.5px; border-spacing: 15px;" >
				<td id="primeApp" class="friendApp" onclick="window.open('https://www.amazon.co.uk/amazonprime', '_blank')"></td>
				<!--<td id="twitchApp" class="friendApp" onclick="window.open('https://www.twith.tv', '_blank')"></td>-->
				<td id="imdbApp" class="friendApp" onclick="window.open('https://www.imdb.com/', '_blank')"></td>
				<!--<td id="musicApp" class="friendApp" onclick="window.open('https://music.amazon.co.uk/', '_blank')"></td>-->
				<td id="alexaApp" class="friendApp" onclick="window.open('https://developer.amazon.com/en-US/alexa', '_blank')"></td>
				<td id="audibleApp" class="friendApp" onclick="window.open('https://www.audible.co.uk/', '_blank')"></td>
			</table>

			<table>
				<td></td>
			</table>
		</div>
		
	</div>
	
	<div id="prefooter">
	<br><hr><br>	
	<table class="center" style=" table-layout: fixed;">
		<tr><td class="font" style="text-align:center; font-size:14px;">Want to be able to use a basket?</td></tr>
		<tr><td><button class="button3 font " type="button" style="width:240px;" onclick="window.open('signin.php', '_self');"><b>Sign in</b></button></td></tr>
		<tr><td class="font" style="text-align:center; font-size:12px;">New Customer? <a id="orangeHover" onclick="window.open('register.php', '_self');">Start here.</a></td></tr>
	</table>
	<br><hr><br>
	</div>
	
	<div id="subfooter">
	<p onclick="topFunction()" id="toTop" style="padding-top:15px; padding-bottom:15px; margin:0px; cursor: pointer;">Back to Top</p>
	<script>
		// When the user clicks "Back to Top", scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0; // For Safari
		  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}
	</script>
	</div>
	
	<div id="footer">
	<br><br><br>
	<table id="footerTable" class="font center" style="width:1000px; table-layout: fixed; text-align:left;">
		<tr>
			<th width="10px">Get to Know Us</th>
			<th width="100px">Make Money with Us</th>
			<th width="100px">Amazon Payment Methods</th>
			<th width="100px" style="padding-left:50px">Let Us Help You</th>
		</tr>
		<tr>
			<td><span class="link" onclick="window.open('https://www.amazon.jobs/en-gb', '_self');" style="color:#dddddd; font-size:14px;">Careers</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Sell on Amazon</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Amazon Platinum Mastercard</span></td>
			<td><span class="link fourthT" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Track Packages or View Orders</span></td>
		</tr>
		<tr>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">About Us</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Sell on Amazon Business</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Amazon Classic Mastercard</span></td>
			<td><span class="link fourthT" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Delivery Rates & Policies</span></td>
		</tr>
		<tr>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">UK Modern Slavery Statement</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Sell on Amazon Handmade</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Amazon Money Store</span></td>
			<td><span class="link fourthT" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Amazon Prime</span></td>
		</tr>
		<tr>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Sustainability</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Sell on Amazon Launchpad</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Gift Cards</span></td>
			<td><span class="link fourthT" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Returns & Replacements</span></td>
		</tr>
		<tr>
			<td></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Amazon Pay</span></td>
			<td><span class="link" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Shop with Points</span></td>
			<td><span class="link fourthT" onclick="window.open('', '_self');" style="color:#dddddd; font-size:14px;">Recycling</span></td>
		</tr>
	</table>
	<br><br>
	<hr style="border: 0.1px solid #3a4553;">
	<table class="center" width="100px">
		<td><img src="Pictures/Famazon_logo_blue.png" class="pointer" width="115.5px" height="40px" alt="Famazon Logo" onclick="window.open('famazon.php', '_self');"></td>
	</table>
	<br>
	</div>
		
	<div id="postfooter">
		<br><br>
		<table id="table3" class="center font" style="width:900px;">
			<tr>
				<td class="link" href="https://www.amazon.co.uk/gp/help/customer/display.html/ref=ap_signin_notification_condition_of_use?ie=UTF8&nodeId=1040616">Conditions of Use<td>
				<td class="link" href="https://www.amazon.co.uk/gp/help/customer/display.html/ref=ap_desktop_footer_privacy_notice?ie=UTF8&nodeId=502584">Privacy Notice</a></td>
				<td class="link" href="https://www.amazon.co.uk/gp/help/customer/display.html?nodeId=508510">Help</a></td>
				<td class="link" href="https://www.amazon.co.uk/gp/help/customer/display.html/?nodeId=201890250">Cookies Notice</a></td>
				<td class="link" href="https://www.amazon.co.uk/gp/help/customer/display.html/?nodeId=201909150">Interest-Based Ads Notice<a/></td>
				<td colspan="5">© 1996-2021, Famazon.com, Inc. or its affiliates</td>
			</tr>
		</table><br><br>
	</div>

</body>

</html>