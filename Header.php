<div id="header">

   <?php $user = new User(); ?>

	<div id="logo">
		<img src="img/logo.png" width="250px">
	</div>


	<div id="search">
		<form>
			<input id="search_input" type="text" placeholder="<?php echo $lang['SEARCH']?>..."> 
			<input class="submit" id="search_btn" type="submit" value="<?php echo $lang['SEARCH']?>">
		</form>
	</div>

	<div class="login">
	
<!-- User is logged in -->
		<?php if($user->isLoggedIn()) { ?>
		<h2><?php echo $lang['MYACCOUNT'] ?></h2><br />
		<b>Account: <?php echo $user->data()['username'];?></b><br /><br />
		<?php echo $user->data()['firstname']."&nbsp;".$user->data()['lastname']; ?> <br />
		<br />  <br />
		<a href="logout.php"><?php echo $lang['LOGOUT'] ?></a>
		<?php }?>

<!-- User isn't logged in -->
		<?php if(!$user->isLoggedIn()) { ?>
		<h2>Login</h2><br />
		<form action="login.php" method="post" >
			<input class="login_input" type="text" name="username" placeholder="<?php echo $lang['USERNAME']?>" /> 
			<input class="login_input" type="password" name="password" placeholder="<?php echo $lang['PASSWORD']?>" />
			<input type="hidden" name="return_url" value="<?php echo $current_url ?>" />
			<input class="submit" type="submit" value="<?php echo $lang['LOGIN']?>" />
		</form>
		<?php
		$url = $_SERVER ['PHP_SELF'];
		$url = $url . "?todo=register";
		echo "<a href='" . $url . "'>" . $lang['REGISTER'] . "</a>" ?>
		<?php } ?>
		
	</div>
	
	<?php $language->getLanguageLinks() ?>

</div>
