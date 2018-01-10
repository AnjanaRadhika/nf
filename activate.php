<?php
	session_start();
	$link = mysqli_connect("shareddb-f.hosting.stackcp.net", "farmerdb-32364802", "admin123", "farmerdb-32364802");
	$activatemsg="";
	if(mysqli_connect_error()) {
		die("Failed to connect to the database ");
	} else {
		if(!empty($_GET)) {
			echo $_SERVER['QUERY_STRING'];
			parse_str(urldecode(base64_decode($_SERVER['QUERY_STRING'])),$string);
			$key=$string['key'];
			$email=rtrim($string['email'],'7');			
			$query = "UPDATE `users` SET `activate`= true WHERE `email`='".$email."' and `username`='".$key."' LIMIT 1";
			echo $query;
			if(mysqli_query($link, $query)) {
				$activatemsg="<div class='alert alert-success'>
						<p>Hi <strong> {$key} </strong>,<br>
							Your account with NeighbourhoodFarmers.com has been activated. 
							Please click on the below link and login using your credentials to access your account.<br><br>
							<a href='http://neighbourhoodfarmerstest-com.stackstaging.com/nf/home.php'>http://neighbourhoodfarmerstest-com.stackstaging.com/nf/home.php</a>
						</p>
						</div>";				
			} else {
				$activatemsg='<div class="alert alert-danger">
						<p>Some problem occured while activating your account. Please try again later!</p>
						</div>';				
			}
		} else {
				$activatemsg='<div class="alert alert-danger">
						<p>Some problem occured while activating your account. Please try again later!</p>
						</div>';		
		}
		mysqli_close($link);
	}

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
	<link rel="stylesheet" type="text/css" href="css/styles.css">     
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="150">
		<nav class="navbar navbar-expand-xs navbar-light bg-light navbar-fixed-top" id="navbar">
			<div class="row align-items-start">
				<div id="head" class="col centered">
					<img id="logo" src="images/logo.ico">
					<span id="domain">NeighbourhoodFarmers.com</span>
				</div>					
			</div>
		</nav>
		<div class="message centered">
			<div class="container">
				<?php echo $activatemsg;?>
			</div>
		</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/script.js"></script>	
      
  </body>
    
</html>
