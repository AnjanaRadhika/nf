<nav class="navbar navbar-expand-xs navbar-light bg-light navbar-fixed-top" id="navbar">
	<div class="row align-items-start">
		<div class="col-xs-2 dropdown">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
		</div>
	
		<div id="head" class="col-xs-7 centered">
			<img id="logo" src="images/logo.ico">
			<span id="domain">NeighbourhoodFarmers.com</span>
		</div>					
		<div class="col-xs-3" id="signin-div" data-toggle="modal" data-target="#signindiv">
			<img id="signin-image" src="images/signinimage.png">
			<?php
				$string=$name="";
				if(!empty($_GET)) {
					if(array_key_exists('key', $_GET)) {
						parse_str($_SERVER['QUERY_STRING'],$string);						
						$name=urldecode(base64_decode($string['key']));
						echo "<span id='signin-text'>".$name."</span>";
					} else { 
							echo "<span id='signin-text'>Sign In / Sign Up</span>";
						}
				} else {
					if(!empty($_SESSION)) {
						if(array_key_exists('name', $_SESSION)) { 
							echo "<span id='signin-text'>".$_SESSION['name']."</span>"; 
						} else { 
							echo "<span id='signin-text'>Sign In / Sign Up</span>";
						}
					} else {
						echo "<span id='signin-text'>Sign In / Sign Up</span>";
					} 
				}?>
					

		</div>
	</div>
</nav>