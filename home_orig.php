<?php include('controller/homecontroller.php'); ?>
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
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="150">

		<!-- Header -->
		<?php include('nav.php'); ?>

        <div class="jumbotron" id="content-wrapper">
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
 	<?php 
		if(!empty($script)) {
			echo $script;
		}
	?>     
  </body>
    
</html>