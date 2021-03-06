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
	
	
	
/*
 * Get the browser cookie
 */
	function getLangCookie() {
		if (isset($_COOKIE["Language"])){
			return $_COOKIE["Language"];
		}
	}
	
	
	
/*
 * Set the browser cookie with livetime 1 day
 */
	function setLangCookie($lang) {
		setcookie ( "Language", $lang, time() + 86400, '/' ); // 86400 = 1 day, / -> f�r alle domain zulassen
	}

	
/*
 * set the session
 */
	function setPageLanguage($defaultLang) {
		$_SESSION ['lang'] = $defaultLang;
		
		$this->importLangFile ();
	}
	
	
	
/*
 * print the langugae links
 */
	function getLanguageLinks() {
		$url = $_SERVER ['PHP_SELF'];
		
		if (Input::get('categoryid') != '') {
			$url = $url . "?categoryid=" . Input::get('categoryid') . "&lan=";
			
		}elseif (Input::get('todo') != ''){
			
			if(Input::get('step') != ''){
				$url = $url . "?todo=" . Input::get('todo') . "&step=" . Input::get('step') . "&lan=";
			}else{
				$url = $url . "?todo=" . Input::get('todo') . "&lan=";
			}
			
		} else {
			$url = $url . "?lan=";
		}
		
		echo '<a href="' . $url . 'de">DE</a>';
		echo '&nbsp;|&nbsp;';
		echo '<a href="' . $url . 'en">EN</a>';
		
		$this->importLangFile ();
	}
	
	
	
/*
 * import the language file
 */
	function importLangFile() {
		if (Input::get('lan') != '') {
			$currLang = Input::get('lan');
			
			$_SESSION ['lang'] = $currLang;
		}
		
		$currLang = $_SESSION ['lang'];
		
		if ($currLang == 'de') {
			$file = 'language/lang.de.php';
		} else if ($currLang == 'en') {
			$file = 'language/lang.en.php';
		} else{
			$file = 'language/lang.en.php';
		}
		
		$this->setLangCookie($currLang);
		include ($file);
	}
}

?>