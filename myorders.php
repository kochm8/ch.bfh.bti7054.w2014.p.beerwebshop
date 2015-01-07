<?php

	echo ' <h1>' . $lang['MYORDERS'] . '</h1>';
	
	$_db = DBHandler::getInstance ();
	
	$resOrders = $_db->getOrdersByUserID($user->data()['user_ID']);
	
	echo '<table>';
	echo '  <tr>';
	echo '    <th>' . $lang['DATE'] . '</td>';
	echo '    <th>' . $lang['ORDERID'] . '</td>';
	echo '    <th>' . $lang['PRODUCT'] . '</td>';
	echo '    <th>' . $lang['TOTAL'] . '</td>';
// 	echo '    <th>' . $lang['GIFTBOX'] . '</td>';
	echo '  </tr>';
	
	while ( $db_orders = $resOrders->fetch_object () ) {
		
		$orderID = $db_orders->order_ID;
		
		$resBeers = $_db->getBeersByOrderID($db_orders->order_ID);

		echo '  <tr>';		
		echo '    <td>' . $db_orders->date . '</td>';
		echo '    <td>' . $db_orders->order_ID . '</td>';
		
		echo '    <td>';
		while ( $db_beers = $resBeers->fetch_object () ) {
		
			echo   $db_beers->quantity . 'x ' . $db_beers->beer_name . ' à ' . $db_beers->beer_price . '<br>';
				
		}
		echo '    </td>';
		
		echo '    <td>' . $db_orders->price_total . '</td>';
// 		echo '    <td>' . $db_orders->is_giftbox . '</td>';
		echo '  </tr>';
		
	}
	
	echo '</table>';
	

?>
	