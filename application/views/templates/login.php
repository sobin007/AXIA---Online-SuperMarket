<div class="container" id="main">    

	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post" action="" class="form-horizontal" role="form">
                <?php if(!empty(@$notif)){ ?>
                <div id="login-alert" class="alert alert-<?php echo @$notif['type'];?> col-sm-12"><?php echo @$notif['message'];?></div>
                <?php } ?>
                <input id="login-username" type="text"  name="email" value="<?php echo $this->input->post('email');?>" placeholder="Email address"> 
                <input id="login-password" type="password" name="password" placeholder="password">
                <div class="forgot">
						<a href="<?php echo site_url('account/forgot_password'); ?>">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Don't have an account ! <a href="<?php echo site_url('account/register'); ?>">Sign Up Here</a>
                            </div>
			</div>
			<h4>For New People</h4>
			<p><a href="registered.html">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
</div>
