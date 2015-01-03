<?php

class Cart{
	
	/*
	 * Update the shopping cart
	 * Add item or increase quantity
	 */
	static function update($product_id) { 
		
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
	static function clear(){
		unset ( $_SESSION ["sidebar_cart"] );
	}
	

	/*
	 * Remove item from shopping cart
	 */
	static function remove($product_id){
		
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
	

	/*
	 * Get shopping cart
	 */
	static function getCart(){
		return $_SESSION ["sidebar_cart"];
	}
	
	
}