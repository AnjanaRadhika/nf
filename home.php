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

    <div id="wrapper" class="container-fluid">
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
					<li>
						<a href="#">Services</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<hr/>
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
				<div class="container-fluid">
				  <div class="row">
				    <div class="col-sm-2">
				      <!-- Advertisement bar -->
							  </div>
			      <!-- Page container Start-->
				    <div class="col-sm-8">
								<!-- Search -->
								<?php include('searchfarmer.php'); ?>
							</div>
			      <!-- Page container End-->
		        <div class="col-sm-2">
		          <!-- Advertisement bar -->
							</div>
						  </div>
		      <!-- end row-->
					</div>
			  <!-- end container -->
				</div>

		<!-- Footer -->
		<?php include('footer.php'); ?>

	</div>
	<!-- /#wrapper -->
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
