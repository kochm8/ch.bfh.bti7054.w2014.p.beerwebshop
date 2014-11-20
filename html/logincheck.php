<?php

session_start();

if( isset($_POST["user"]) || isset($_POST["pw"]) ) {
	
	echo $_POST["user"].$_POST["pw"];
	
}




?>