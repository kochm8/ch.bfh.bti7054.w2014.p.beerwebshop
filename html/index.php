<!DOCTYPE html>
<html>

<head>
<title>BeerWebshop</title>
<link rel="stylesheet" type="text/css" href="../css/global.css" />
</head>

<body>
	<div id="wrapper">
		<div id="header">

			<div id="logo">
				<img src="../img/logo.png">
			</div>


			<div id="search">
				<form>
					<input id="search_input" type="text" placeholder="Search...">
					<input id="search_btn" type="submit" value="Search">
				</form>
			</div>


			<div class="login">
				<form>
					<input type="text" placeholder="Username" />
					<input type="password" placeholder="Password" /> 
					<input type="submit" value="Sign in" />
				</form>
				<!-- <a href="#">Register</a> • <a href="#">Forgot Password</a> -->
			</div>


		</div>

		<div id="leftcolumn">
			<?php //include("Product.php"); 
			
				$products = array(
						array("Name" => "Beer1", "Price" => "1.00", "Quantity" => "5dl"),
						array("Name" => "Beer2", "Price" => "1.00", "Quantity" => "5dl"),
						array("Name" => "Beer3", "Price" => "1.00", "Quantity" => "5dl"),
						array("Name" => "Beer4", "Price" => "1.00", "Quantity" => "5dl")
				);
				
				foreach ($products as $value) {
					echo $value["Name"]."<br />";
				}
							
			?>
		</div>

		<div id="content">
			<p>Content</p>
		</div>

		<div id="rightcolumn">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed
				nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis
				ipsum. Praesent mauris. Fusce nec tell</p>
		</div>

		<div id="footer">
			<p>Footer</p>
		</div>

	</div>
</body>
</html>
