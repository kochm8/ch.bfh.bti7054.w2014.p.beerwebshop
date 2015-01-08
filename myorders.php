<?php

	echo ' <h1>' . $lang['MYORDERS'] . '</h1>';
	
	$_db = DBHandler::getInstance ();
	
	$resOrders = $_db->getOrdersByUserID($user->data()['user_ID']);
	
	echo '<table style="border-collapse: collapse;">';
	echo '  <tr style="background-color: #ddd;">';
	echo '    <th style="width:80px;" class="table_td">' . $lang['ORDERID'] . '</td>';
	echo '    <th style="width:100px;" class="table_td">' . $lang['DATE'] . '</td>';
	echo '    <th style="width:250px;" class="table_td">' . $lang['PRODUCT'] . '</td>';
	echo '    <th style="width:100px;" class="table_td">' . $lang['TOTAL'] . ' CHF</td>';
	echo '    <th style="width:150px;" class="table_td">Status</td>';
// 	echo '    <th>' . $lang['GIFTBOX'] . '</td>';
	echo '  </tr>';
	
	while ( $db_orders = $resOrders->fetch_object () ) {
		
		$orderID = $db_orders->order_ID;
		
		$resBeers = $_db->getBeersByOrderID($db_orders->order_ID);

		echo '  <tr>';	
		echo '    <td class="table_td">' . $db_orders->order_ID . '</td>';
		echo '    <td class="table_td">' . $db_orders->date . '</td>';
		
		echo '    <td class="table_td">';
		while ( $db_beers = $resBeers->fetch_object () ) {
		
			echo   $db_beers->quantity . 'x ' . $db_beers->beer_name . ' à ' . $db_beers->beer_price . '<br>';
				
		}
		echo '    </td>';
		
		echo '    <td class="table_td">' . $db_orders->price_total . '</td>';
		echo '    <td class="table_td">' . $db_orders->status . '</td>';
// 		echo '    <td>' . $db_orders->is_giftbox . '</td>';
		echo '  </tr>';
		
	}
	
	echo '</table>';
	

?>
	