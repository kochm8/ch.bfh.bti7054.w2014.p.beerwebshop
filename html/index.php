<?php
 session_start();
 include_once("config.php");
 include_once("db.php");
?>
<!DOCTYPE html>
<html>

<head>
<title>BeerWebshop</title>
<link rel="stylesheet" type="text/css" href="../css/global.css" />
</head>
<body>
	<div id="wrapper">

	<?php include("Header.php"); ?>
	
	<div id="menu">
		<a id="tdb1" href="shopping_cart.php" role="button" aria-disabled="false">Warenkorb</a>
	</div>

		<div id="leftcolumn">
			<?php
		
			//connection to the database		
			$dbhandle = mysql_connect($db_host , $db_username, $db_password)
			 or die("Unable to connect to MySQL");
			
			//select a database to work with
			$selected = mysql_select_db($db_name,$dbhandle)
			  or die("Could not select database $db_name");
			
			//execute the SQL query and return records
			$result = mysql_query("SELECT product_id, product_name FROM products");
			
			//close the connection
			mysql_close($dbhandle);
			
			//fetch tha data from the database
			while ($row = mysql_fetch_array($result)) {
				$url = $_SERVER ['PHP_SELF'];
				$url = $url . "?id=" . $row{'product_id'};
			   echo "<a href=\"$url\">" . $row{'product_name'} . "</a>";
			   echo "<br />";
			}

			?>

		</div>

		<?php include("Content.php");  ?>

		<div id="rightcolumn">
			<p>Warenkorb</p>
				
				<?php 
				
				if(isset($_SESSION["products"])) {
					foreach ($_SESSION["products"] as $key => $value){
						echo "$value <br />";
					}
				}
				
				?>
				
		</div>

		<div id="footer">
			<p>Footer</p>
		</div>

	</div>
</body>
</html>
