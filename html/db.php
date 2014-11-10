<?php

function execute_query($query){

	global $db_username;
	global $db_host;
	global $db_password;
	global $db_name;

	//connection to the database
	$dbhandle = mysql_connect($db_host , $db_username, $db_password)
	or die("Unable to connect to MySQL");

	//select a database to work with
	$selected = mysql_select_db($db_name,$dbhandle)
	or die("Could not select database $db_name");

	//execute the SQL query and return records
	$result = mysql_query($query);

	//close the connection
	mysql_close($dbhandle);

	return $result;
}

?>