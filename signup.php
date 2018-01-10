<div id="signupdiv" class="modal modal-open fade popup" tabindex="-1" role="dialog" aria-labelledby="signupdiv" aria-hidden="true">

	<form class="form" id="contact" action="#" method="post">
		<div class="img cancel close" data-dismiss="modal">X</div><br>
		<h2>Sign Up</h2>
		<?php 
		if(isset($error)){
			echo $error; 
		}
		?>
		<label for="name">Full Name: <span>*</span></label>
		<br/>
		<input type="text" name="name" id="name" placeholder="Enter Full Name" required />
		<br/><br/>
		<label for"email">Email: <span>*</span></label>
		<br/>
		<input type="email" name="email" id="email" placeholder="Enter Email Address" required />
		<br/><br/>
		<label for="password">Password : <span>*</span></label>
		<br/>
		<input type="password" name="password" id="signuppassword" placeholder="************" required />
		<br /><br />
		<span><u>Password Strength</u></span>
		<div class="bar" style="width:100%;height:22px;background:lightgrey;border:solid 0.5px;border-radius:5px;">
			<div class="progressbar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
		</div>		
		<br/>
		By registering, I accept the NeighbourhoodFarmers.com 
		<span id="termsofuseclick" data-toggle="modal" data-target="#termsofusediv" data-dismiss="modal">Terms Of Use</span><br/>				
		<input type="submit" name="signup-submit" class="btn" value="Sign Up" />
		<input type="button" class="btn cancel" data-dismiss="modal" value="Cancel" />
		<hr/>
		<div align="center"><span class="signinclick" data-toggle="modal" data-target="#signindiv" data-dismiss="modal">Sign in</span> if you are already a member</div>
	</form>
</div>
