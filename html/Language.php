<?php
class Language {
	
	public function __construct($defaultLang){
		
		if( $this->getLangCookie() == NULL ){
			$language = $defaultLang;
			$this->setLangCookie($defaultLang);
		}else{
			$language = $this->getLangCookie();
		}

		$this->setPageLanguage($language);
		
	}
	
	function getLangCookie() {
		if (isset($_COOKIE["Language"])){
			return $_COOKIE["Language"];
		}
	}
	
	function setLangCookie($lang) {
		setcookie ( "Language", $lang, time () + 24 * 60 * 60 );
	}
	
	function setPageLanguage($defaultLang) {
		$_SESSION ['lang'] = $defaultLang;
		
		$this->importLangFile ();
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
		
		$this->importLangFile ();
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
}

?>