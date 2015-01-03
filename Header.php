<div id="header">

   <?php $user = new User();  ?>
   
	<script type="text/javascript">

		function getHint(value) {

			var doc = document.getElementById("content");			
			var xmlhttp;

			if (window.XMLHttpRequest) 
				xmlhttp = new XMLHttpRequest();
			else if (window.ActiveXObject) 
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			else {
				 alert("Your browser does not support XMLHTTP!"); 
				 return;
			}
	
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4)
					if (xmlhttp.responseText.length > 0) 
						doc.innerHTML = xmlhttp.responseText;
			}
			xmlhttp.open("GET","hint.php?hint="+value+"&return_url="+window.location,true);
			xmlhttp.send(null);
		}
	</script>

	<div id="logo">
		<img src="img/logo.png" width="250px">
	</div>


	<div id="search">
		<form>
			<input id="search_input" type="text" placeholder="<?php echo $lang['SEARCH']?>..." onkeyup="getHint(this.value);"> 
			<!--<input class="submit" id="search_btn" type="submit" value="<?php echo $lang['SEARCH']?>">  -->
		</form>
	</div>
	
			
	<script type="text/javascript">
	
		var getCookie = function(name){
	
			  var str = RegExp(""+name+"[^;]+").exec(document.cookie);		  
			  return unescape(!!str ? str.toString().replace(/^[^=]+./,"") : "");
		 };
	
	
		var deleteCookie = function(name) {
		    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		};
		
		var cookievalue = getCookie('Search');
		deleteCookie('Search');
		var element = document.getElementById("search_input").value = cookievalue;
		getHint(cookievalue);
		
	</script>

	<div class="login">
	
<!-- User is logged in -->
		<?php 
		if($user->isLoggedIn()) {
			echo "<h2>". $lang['MYACCOUNT'] ."</h2><br />";
			echo $lang['WELCOME'] ."&nbsp;". $user->data()['firstname'] . "<br />";
			echo "<br />";
			echo '<a href="logout.php">'. $lang['LOGOUT'] ."</a>";
		}
		?>

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
