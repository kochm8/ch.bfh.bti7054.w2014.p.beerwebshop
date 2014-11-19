<div id="header">

	<link rel="shortcut icon" href="../img/favicon.ico">

	<div id="logo">
		<img src="../img/logo.png">
	</div>


	<div id="search">
		<form>
			<input id="search_input" type="text" placeholder="<?php echo $lang['SEARCH']?>..."> 
			<input class="submit" id="search_btn" type="submit" value="<?php echo $lang['SEARCH']?>">
		</form>
	</div>

	<div class="login">
		<form>
			<input class="login_input" type="text" placeholder="<?php echo $lang['USER']?>" /> 
			<input class="login_input" type="password" placeholder="<?php echo $lang['PASSWORD']?>" />
			<input class="submit" type="submit" value="<?php echo $lang['LOGIN']?>" />
		</form>
		<!-- <a href="#">Register</a> • <a href="#">Forgot Password</a> -->
	</div>
	
	<?php $language->getLanguageLinks() ?>

</div>
