<?php
	
	session_start();
	$link = mysqli_connect("shareddb-f.hosting.stackcp.net", "farmerdb-32364802", "admin123", "farmerdb-32364802");
	echo("<script>console.log('inside signup submitted')</script>");
	if(mysqli_connect_error()) {
		echo("<script>console.log('failed connection')</script>");
		die("Failed to connect to the database ");
	} else {
		echo("<script>console.log('connection success')</script>");
		if(!empty($_SESSION)) {		
			$name=$_SESSION['name'];
			$email=$_SESSION['email'];
			$sent=$mail_sent="";
			// Set content-type header for sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			$headers .= "From: anjana.rajeevv@gmail.com" . "\\r\
			" . "Reply-to: rajeevvasudevan@outlook.com";

			$message = "<div class='container' style='background:whitesmoke'><br>Hello <strong>{$name}</strong>,<br><br> Welcome to NeighbourhoodFarmers.com You can login with: {$email} and your the password you entered.".
				"Before you can use your account you must activate it! you can activate here: 
				<a href='http://neighbourhoodfarmerstest-com.stackstaging.com/nf/activate.php?".urlencode(base64_encode("key=".$name."&email=".$email))
				."'>http://neighbourhoodfarmerstest-com.stackstaging.com/nf/activate.php?".urlencode(base64_encode("key=".$name."&email=".$email))
				."</a><br><br>Thanks & Regards,<br>support@NeighbourhoodFarmers.com </div>";

			$subject = "Your NeighbourhoodFarmers.com Account";

			$to = $email; // you should run that through a cleaning function or clean it some how
			$query = "INSERT INTO `users`(`username`,`email`, `password`, `role`) VALUES('" . mysqli_real_escape_string($link, $_SESSION['name'])."','" 
				. mysqli_real_escape_string($link, $_SESSION['email'])."','"
				.mysqli_real_escape_string($link, password_hash($_SESSION['password'],PASSWORD_DEFAULT))."','Seller')";
			
echo $query;			
			echo("<script>console.log('inside signup')</script>");
				
			if(mysqli_query($link, $query)) {
				$sent=mail($to,$subject,$message,$headers);	
				if($sent) {
					$mail_sent="<div class='alert alert-success'>
							<p>Hi <strong> {$name} </strong>,<br>
							An email has been send to <strong> {$email} </strong>. 
							Please click on the link provided in the email to activate your account with NeighbourhoodFarmers.com.
							</p>
							</div>";
				}else {
					$mail_sent='<div class="alert alert-danger">
							<p>Some problem occured. Please try again later!</p>
							</div>';		
				}
			} else {
					$mail_sent='<div class="alert alert-danger">
							<p>Some problem occured while signing up. Please try again later!</p>
							</div>';				
			}
		} else {
				$mail_sent='<div class="alert alert-danger">
						<p>Some problem occured while signing up. Please try again later!</p>
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
		
		<div class="container">
			<div class="message centered">
				<?php echo $mail_sent;?>
			</div>
		</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/script.js"></script>	
      
  </body>
    
</html>
