<!DOCTYPE html>
<html>

<head>
<title>BeerWebshop</title>
<link rel="stylesheet" type="text/css" href="../css/global.css" />
</head>

<body>
	<div id="wrapper">

	<?php include("Header.php");  ?>

		<div id="leftcolumn">
			<?php 
			
				$products = array(
						array("Name" => "Beer1", "Price" => "1.00", "Quantity" => "5dl"),
						array("Name" => "Beer2", "Price" => "1.00", "Quantity" => "5dl"),
						array("Name" => "Beer3", "Price" => "1.00", "Quantity" => "5dl"),
						array("Name" => "Beer4", "Price" => "1.00", "Quantity" => "5dl")
				);
				
				for ($i=0; $i<sizeof($products); $i++){
					$url = $_SERVER['PHP_SELF'];
					$url = $url."?id=".$i;
					echo "<a href=\"$url\">".$products[$i]["Name"]."</a>";
					echo "<br />";			
				} 
						
			?>
		</div>

		<?php include("Content.php");  ?>

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
