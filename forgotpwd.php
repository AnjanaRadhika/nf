<div id="forgotpassworddiv" class="modal modal-open fade popup" tabindex="-1" role="dialog" aria-labelledby="forgotpassworddiv" aria-hidden="true">
	<form class="form" id="frmforgotpassword" action="#" method="post">
		<div class="img cancel close" data-dismiss="modal">X</div><br>
		<h2>Forgot Password</h2><hr/>
		<?php 
		if(isset($forgotpwderror)){
			echo $forgotpwderror; 
		}
		?>		
		<label>To reset your password, please enter the email address you used to sign up </label>
		<br/>
		<div id="forgotemaildiv">
		<input type="email" name="forgotemail" id="forgotemail" placeholder="Email Address *" required /><br/><br/>
		<input type="submit" name="forgotpwd-submit" value="Send"/></div><br/>
		<br>
		<span class="backtosignin" data-toggle="modal" data-target="#signindiv" data-dismiss="modal">Back to Sign In</span>

	</form>
</div>	