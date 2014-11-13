<?php

include_once ("config.php");
include_once ("db.php");
include("Language.php");

$DBHanlder = new DBHandler ();
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>