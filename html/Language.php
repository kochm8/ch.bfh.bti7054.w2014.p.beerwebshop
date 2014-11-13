<?php

function setLanguage($defaultLang) {
	$_SESSION ['lang'] = $defaultLang;
	
	importLangFile();
}

function getLanguageLinks() {
	$url = $_SERVER ['PHP_SELF'];
	
	if (isset ( $_GET ['id'] )) {
		$url = $url . "?id=" . $_GET ['id'] . "&lan=";
	} else {
		$url = $url . "?lan=";
	}
	
	echo '<a href="' . $url . 'de">DE</a>';
	echo '&nbsp;';
	echo '<a href="' . $url . 'en">EN</a>';
	
	importLangFile();
}


function importLangFile() {
	if (isset ( $_GET ['lan'] )) {
		$currLang = $_GET ['lan'];
		
		$_SESSION ['lang'] = $currLang;
	}
	
	$currLang = $_SESSION ['lang'];
	
	if ($currLang == 'de') {
		$file = 'lang.de.php';
	} else if ($currLang == 'en') {
		$file = 'lang.en.php';
	}
	
	include ($file);
}


?>