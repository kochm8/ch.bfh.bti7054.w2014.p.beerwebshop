<div id="header">

	<div id="logo">
		<img src="../img/logo.png">
	</div>


	<div id="search">
		<form>
			<input id="search_input" type="text" placeholder="<?php echo $lang['SEARCH']?>..."> 
			<input id="search_btn" type="submit" value="<?php echo $lang['SEARCH']?>">
		</form>
	</div>

	<div class="login">
		<form>
			<input type="text" placeholder="<?php echo $lang['USER']?>" /> 
			<input type="password" placeholder="<?php echo $lang['PASSWORD']?>" />
			<input type="submit" value="<?php echo $lang['LOGIN']?>" />
		</form>
		<!-- <a href="#">Register</a> • <a href="#">Forgot Password</a> -->
	</div>
	
	
	<?php $language->getLanguageLinks() ?>

</div>
