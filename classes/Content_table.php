<?php

class Content_table{
	
	private $array = array();
	private $lang = array();
	private $title;
	
	public function __construct($beers, $lang){
		$this->array = $beers;
		$this->lang = $lang;	
	}
	
	/*
	 * Set table content title
	 */
	public function setTitle($title){
		$this->title = $title;
	}
	
	/*
	 * print the table content
	 */
	public function printTable($return_url){
		
		echo "<h2>" . $this->title . "</h2>";
		
		for($i=0; $i < sizeOf($this->array); $i++){
			
			$beer = $this->array[$i];
			
			echo "<table>";
				
			echo "<tr>";
			echo "<td>";
			echo $this->lang['NAME']. ":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_name;
			echo "</td>";
			echo "</tr>";
				
			echo "<tr>";
			echo "<td>";
			echo $this->lang['COUNTRY'] . ":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_country;
			echo "</td>";
			echo "</tr>";
				
			echo "<tr>";
			echo "<td>";
			echo $this->lang['CONTENT'] . ":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_size."cl | " . $beer->beer_alcohol . "%";
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $this->lang['PRICE'] . " CHF: ";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_price;
			echo "</td>";
			echo "</tr>";
				
			echo "<tr>";
			echo "<td align='center' width='150'>";
			echo '<img src="img/beer/' . $beer->beer_image . '" alt="' . $beer->beer_name . '" height="150">';
			echo "</td>";
			echo "<td>";
			echo $beer->beer_desc;
			echo "</td>";
			echo "</tr>";
				
			echo "</table>";

			echo '<form method="get" action="cart_update.php">';
			echo '<input class="submit" type="submit" value="' . $this->lang['ADDTOCART'] . '" />';
			echo '<input type="hidden" name="id" value="' . $beer->beer_ID . '" />';
			echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="' . $return_url . '" />';
			echo '</form>';
				
			echo "<hr>";
			
		}
		
	}
	
}

?>