<div id="signindiv" class="modal modal-open fade popup" tabindex="-1" role="dialog" aria-labelledby="signindiv" aria-hidden="true">
	<form class="form" action="home.php" id="login" method="post">
		<div data-dismiss="modal" class="img cancel close">X</div><br>
		<h2>Sign In</h2>
		<?php 
		if(isset($loginerror)){
			echo $loginerror; 
		}
		?>			
		<label for="username">Email : </label>
		<br/>
		<div class="inner-addon right-addon">
			<i class="glyphicon glyphicon-envelope"></i>		
			<input type="email" name="username" id="username" placeholder="Enter Email Address" required /><br/>
		</div>
		<br/>
		<label>Password : </label>
		<br/>
		<div class="inner-addon right-addon">
			<i class="glyphicon glyphicon-lock"></i>		
			<input type="password" name="password" id="password" placeholder="************" required /><br/>
		</div>
		<br/>
		<span id="forgot" data-toggle="modal" data-target="#forgotpassworddiv" data-dismiss="modal">Forgot Password?</span><br>
		<input type="submit" class="btn" id="loginbtn" name="login" value="Login"/>
		<input type="button" class="btn cancel" data-dismiss="modal" value="Cancel"/>
		<br/><br><hr/>
		<div align="center"><span id="signupclick" data-toggle="modal" data-target="#signupdiv" data-dismiss="modal">Sign up</span> if you are not a member</div>

	</form>
</div>