<?php
	
	session_start();
	$link = mysqli_connect("shareddb-f.hosting.stackcp.net", "farmerdb-32364802", "admin123", "farmerdb-32364802");	
	$pwdchangestatus =$script=$error=$active="";
	if(mysqli_connect_error()) {
		die("Failed to connect to the database ");
	} else {
		if(!empty($_GET) && isset($_POST)) {
			echo $_SERVER['QUERY_STRING'];
			parse_str(urldecode(base64_decode($_SERVER['QUERY_STRING'])),$string);
			$key=$string['key'];
			$email=rtrim($string['email'],'7');	
			if(array_key_exists('updatepassword', $_POST) && $_POST['updatepassword']==="Update Password") {
				if($_POST['newpassword']==="" or $_POST['confirmpassword']==="" ){
					$pwdchangestatus .= '<div class="alert-danger">Please enter the new password and confirm. </div>';
				} else {
					if($_POST['newpassword']!=$_POST['confirmpassword']) {
							$pwdchangestatus='<div class="alert alert-danger">
									<p>Passwords do not match. Please try again!</p>
									</div>';						
					} else {
						$query = "SELECT `activate` FROM `users` "
								." WHERE `email`='".$email."' and `username`='".$key."'";
						$result = mysqli_query($link, $query);

						if(mysqli_num_rows($result) > 0) {				
							$row=mysqli_fetch_array($result);
							$active = $row['activate'];
						} else {
							$pwdchangestatus='<div class="alert alert-danger">
									<p>You have used a different email for signing up. Please try with the registered email.</p>
									</div>';							
						}

						if($active) {
							echo("<script>console.log('inside active')</script>");
							$query = "UPDATE `users` SET `password`= '"
							.mysqli_real_escape_string($link, password_hash($_POST['newpassword'],PASSWORD_DEFAULT))
							."' WHERE `email`='".$email."' and `username`='".$key."' LIMIT 1";
							if(mysqli_query($link, $query)) {
								$pwdchangestatus="<div class='alert alert-success'>
										<p>Hi <strong> {$key} </strong>,<br>
											Your password with NeighbourhoodFarmers.com has been changed successfully. 
										</p>
										</div>";				
							} else {
								$pwdchangestatus='<div class="alert alert-danger">
										<p>Some problem occured while changing the password. Please try again later!</p>
										</div>';				
							}
						} else {
							$pwdchangestatus='<div class="alert alert-danger">
									<p>The account is not activated yet. The activation link has been sent to your registered email. </p>
									</div>';							
						}
					}
				}
				if(!empty($pwdchangestatus)) {
					$script =  "<script>$('#updatepwddiv').modal('show')</script>"; // Show modal
				}
			}
		} else {
				$error='<div class="alert alert-danger">
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
		<?php if(!empty($error)) { 
			echo $error; 
		} else { ?>

		<div class="message" style="text-align:center">
			<div class="popup">
			<br><br>
				<form class="form" action="#" id="changepwdform" method="post">
					<h2>Change Password</h2>
					<label for="newpassword">New Password : <span>*</span></label>
					<input type="password" name="newpassword" id="newpassword" style="width:15%" placeholder="************" required /><br/><br/>
					<div class="bar center-block" style="width:15%;height:22px;background:whitesmoke;border:solid 0.5px;border-radius:5px;">
						<div class="progressbar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
					</div> <br/>

					<label for="confirmpassword">Confirm Password : <span>*</span></label>
					<input type="password" name="confirmpassword" id="confirmpassword" style="width:15%" placeholder="************" required /><br/><br/>			
					<div id="message" style="text-align:center"></div>
					<input type="submit" class="btn" name="updatepassword" value="Update Password" style="width:20%!important"/>
					<br/><br><hr/>

				</form>				
			</div>
		</div>
		<?php } ?>
		<div id="updatepwddiv" class="modal modal-open fade popup" tabindex="-1" role="dialog" aria-labelledby="updatepwddiv" aria-hidden="true">
			<form id="changepwd" class="centered" action="home.php"><br/><br/>
				<div class="img cancel close" data-dismiss="modal">X</div>
				<h4>NeighbourhoodFarmers.com Password Reset</h4><hr/>
					<?php if(isset($pwdchangestatus)) echo $pwdchangestatus;?>
				<div align="center">
				<input type="submit" class="btn" value="Home" />				
				<input type="button" class="btn cancel" data-dismiss="modal" value="Cancel"/>
				</div>
			</form>
		</div>		

		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/script.js"></script>	
	<script type="text/javascript">
		$('#newpassword, #confirmpassword').on('keyup', function () {
		  if ($('#newpassword').val() == $('#confirmpassword').val()) {
			$('#message').html('Matching').css('color', 'green');
		  } else 
			$('#message').html('Not Matching').css('color', 'red');
		});	
	</script>
 	<?php 
		if(!empty($script)) {
			echo $script;
		}
	?>        
  </body>
    
</html>
