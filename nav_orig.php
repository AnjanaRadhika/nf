<nav class="navbar navbar-expand-xs navbar-light bg-light navbar-fixed-top" id="navbar">
	<div class="row align-items-start">
		<div class="col-xs-2 dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img src="images/menu.png" id="image_off">
				<span id="menutext">Menu</span>
			</button>
			
			<div class="dropdown-menu" aria-labelledby="menu">
				<a class="dropdown-item" href="#">Action</a>
				<a class="dropdown-item" href="#">Another action</a>
				<a class="dropdown-item" href="#">Something else here</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Separated link</a>
			</div>
		</div>
	
		<div id="head" class="col-xs-7 centered">
			<img id="logo" src="images/logo.ico">
			<span id="domain">NeighbourhoodFarmers.com</span>
		</div>					
		<div class="col-xs-3" id="signin-div" data-toggle="modal" data-target="#signindiv">
			<img id="signin-image" src="images/signinimage.png">
			<?php if(!empty($_SESSION)) {
						if(array_key_exists('name', $_SESSION)) { 
							echo "<span id='signin-text'>".$_SESSION['name']."</span>"; 
						} else { 
							echo "<span id='signin-text'>Guest</span>";
						}
					} else {
						echo "<span id='signin-text'>Sign In / Sign Up</span>";
					} ?>
					

		</div>
	</div>
</nav>