<?php
session_start ();
$product_id = $_GET ["id"];
$return_url = base64_decode ( $_GET ["return_url"] );

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'add') {
	update ();
}

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'remove') {
	remove ();
}

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'clear') {
	clear ();
}

header ( 'Location:' . $return_url );


/*
 * Update the shopping cart
 * Add item or increase quantity
 */
function update() {
	global $product_id, $return_url;

	$product_added = array (
			array (
					'id' => $product_id,
					'quan' => '1' 
			) 
	);
	
	if (isset ( $_SESSION ["sidebar_cart"] )) {
		
		$found = false;
		foreach ( $_SESSION ["sidebar_cart"] as $key => $value ) {
			
			if ($value ['id'] == $product_id) {
				
				$quan = $value ['quan'] + 1;
				$product_old [] = array (
						'id' => $value ['id'],
						'quan' => $quan 
				);
				$found = true;
			} else {
				
				$product_old [] = array (
						'id' => $value ['id'],
						'quan' => $value ['quan'] 
				);
			}
		}
		
		if ($found == false) {
			
			$_SESSION ["sidebar_cart"] = array_merge ( $product_old, $product_added );
			echo sizeof ( $product_old );
			echo sizeof ( $product_added );
		} else {
			
			$_SESSION ["sidebar_cart"] = $product_old;
		}
	} else {
		
		$product_old [] = array (
				'id' => $product_id,
				'quan' => '1' 
		);
		$_SESSION ["sidebar_cart"] = $product_added;
	}
}


/*
 * clear shopping cart
 */
function clear() {
	unset ( $_SESSION ["sidebar_cart"] );

}
	
	
/*
 * Remove item from shopping cart
 */
function remove() {
	global $product_id, $return_url;
	
	if (isset ( $_SESSION ["sidebar_cart"] )) {
		
		foreach ( $_SESSION ["sidebar_cart"] as $key => $value ) {
			
			if ($value ['id'] == $product_id) {
				echo "no";
			} else {
				
				$products [] = array (
						'id' => $value ['id'],
						'quan' => $value ['quan'] 
				);
			}
		}
		
		$_SESSION ["sidebar_cart"] = $products;
	}
}

?>