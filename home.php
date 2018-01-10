<?php include('controller/homecontroller.php'); 
		$logout_success="";
	?>
<!DOCTYPE html>

<html lang="en">
    
  <head>
    <title>Neighbourhood Farmers</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed|Russo+One" rel="stylesheet">
	<link rel="shortcut icon" href="images/logo.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styles.css"> 
	<link rel="stylesheet" type="text/css" href="css/menu.css"> 
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="150">

	<!--Header -->
	<?php include('nav.php'); ?>
	
    <div id="wrapper">
        <div class="overlay"></div>	

			<!-- Sidebar -->
			<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
				<ul class="nav sidebar-nav">
					<li class="sidebar-brand">
						<a href="#">
						   Brand
						</a>
					</li>
					<li>
					
					<?php
						if(!empty($_SESSION)) {
							if(array_key_exists('name', $_SESSION)) { 
								echo "<a href='home.php?key=".urlencode(base64_encode($_SESSION['name']))."'>Home</a>"; 
							} else {
								echo "<a href='home.php'>Home</a>"; 								
							}
						} else {
								echo "<a href='home.php'>Home</a>"; 							
						}
					?>					
						
					</li>
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Events</a>
					</li>
					<li>
						<a href="#">Team</a>
					</li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
						<li class="dropdown-header">Dropdown heading</li>
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					  </ul>
					</li>
					<li>
						<a href="#">Services</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<hr/>
					<li>
						<a href="home.php?logout=1">Log Out</a>
					</li>
				</ul>
			</nav>
		
			<?
			if(array_key_exists('logout',$_GET)) {
				if($_GET['logout'] === 1) {
					session_unset();
					session_destroy();
					$logout_success="<div class='alert alert-success'>
							<p>Session logged out successfully!	</p>
							</div>";
					header("location:home.php");
					exit();
				}
			}
			?>	
			<div class="message centered">
				<div class="container">
					<?php echo $logout_success;?>
				</div>
			</div>	
			
			<!-- /#sidebar-wrapper -->
			<div id="page-content-wrapper">						
				<div id="content-wrapper">			
				  <h1 class="display-3">FRESH FROM FARMERS</h1><br><br>
				  <br><br>
					<div class="container">
						<form>
						  <div class="form-row">
							<div class="form-group col-xs-7">
							  <label for="searchLookUp" class="sr-only">Location or Item</label>
							  <div class="inner-addon right-addon">
								<span class="glyphicon glyphicon-search"></span>
								<input type="text" class="form-control input-element" aria-describedby="searchLookUp" id="searchLookUp" placeholder="Search By Location or Item">
							  </div>			  
							</div>
							<div class="form-group col-xs-3">
							  <label for="searchItemType" class="sr-only">Item Type</label>
							  <select id="searchItemType" class="form-control input-element">
								<option selected>Choose Item Type...</option>
								<option>...</option>
							  </select>
							</div>
						  <button type="submit" id="searchBtn" class="btn col-xs-1 input-element">Search</button>	
						  </div>

						</form>
					</div>
				</div>
				
				<!-- /#content-wrapper -->

				<div class="container">    		
					<div class="pictures" align="center">
						<table id="picturetable">
						<tr><td class="cells"><img class="cellimg"src="images/cell1.jpg"></td>
						<td class="cells"><img class="cellimg" src="images/cell2.jpg"></td>
						<td class="cells"><img class="cellimg" src="images/cell3.jpg"></td></tr>
						<tr><td class="cells"><img class="cellimg" src="images/cell4.jpg"></td>
						<td class="cells"><img class="cellimg" src="images/cell5.jpg"></td>
						<td class="cells"><img class="cellimg" src="images/cell6.jpg"></td></tr>
						</table>
					</div>
					<br><br>
					<div class="content">
						<h3>Getting fresh products directly from farmers</h3>
						<p>Quisque condimentum nibh porttitor sapien facilisis, semper auctor urna ultricies. Vivamus molestie in enim at volutpat. Praesent molestie consectetur tincidunt. Donec vitae commodo dolor. Aenean bibendum, ante vel cursus blandit, nulla elit porta orci, vitae varius lacus velit at mauris. Nunc molestie molestie magna, eget laoreet justo mollis eu. Nam feugiat sit amet dui a venenatis. Nullam bibendum, mauris a egestas sollicitudin, enim ante aliquam orci, a eleifend augue dolor non libero. Morbi pellentesque quis lectus ac blandit.</p>
					</div>
				</div>
			</div>
    </div>
    <!-- /#wrapper -->			
      
		<!-- Footer -->
		<?php include('footer.php'); ?>
	  
		<!--Login Form -->
		<?php include('loginform.php'); ?>

		<!--Sign Up Form -->
		<?php include('signup.php'); ?>

		<!--Forgot Password Form -->
		<?php include('forgotpwd.php'); ?>

		<!--Terms of Use -->
		<?php include('termsofuse.php'); ?>
		
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="js/script.js"></script>	
	<script>
	$(document).ready(function () {
	  var trigger = $('.hamburger'),
		  overlay = $('.overlay'),
		 isClosed = false;

		trigger.click(function () {
		  hamburger_cross();      
		});

		function hamburger_cross() {

		  if (isClosed == true) {          
			overlay.hide();
			trigger.removeClass('is-open');
			trigger.addClass('is-closed');
			isClosed = false;
		  } else {   
			overlay.show();
			trigger.removeClass('is-closed');
			trigger.addClass('is-open');
			isClosed = true;
		  }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
			$('#wrapper').toggleClass('toggled');
	  });  
	});	
	</script>
 	<?php 
		if(!empty($script)) {
			echo $script;
		}
	?>     
  </body>
    
</html>