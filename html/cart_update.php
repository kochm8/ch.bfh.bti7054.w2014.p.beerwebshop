<?php
session_start ();

$product_id = $_GET ["id"];
$return_url = base64_decode ( $_GET ["return_url"] );

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'add') {
	
	/*$new_product = array (
			array('id'=>'', 'qty'=>'')
	);*/
	
	$product_added = array(array('id'=>$product_id, 'quan'=>'1'));
	
	if (isset ( $_SESSION ["sidebar_cart"] ))
	{
		
		$found = false;
		foreach ( $_SESSION ["sidebar_cart"] as $key => $value ) {
			
			if ($value['id'] == $product_id){
				
				$quan = $value['quan'] + 1;
				$product_old[] = array('id'=>$value['id'], 'quan'=>$quan);
				$found = true;
			}else{
				
				$product_old[] = array('id'=>$value['id'], 'quan'=>$value['quan']);
			}
		}
		
		if($found == false){
			
			$_SESSION["sidebar_cart"] = array_merge($product_old, $product_added);
			echo sizeof($product_old);
			echo sizeof($product_added);
		}else{

			$_SESSION ["sidebar_cart"] = $product_old;
		}
		
	}else{
		
		$product_old[] = array('id'=>$product_id, 'quan'=>'1');
		$_SESSION ["sidebar_cart"] = $product_added;
	}
	

}

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'remove' ) {
	

}

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'clear' ) {

	session_destroy();
}

header ( 'Location:' . $return_url );

?>