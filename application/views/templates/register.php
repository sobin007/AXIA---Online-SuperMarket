<div class="container" id="main">    

    <div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form method="post" action="" class="form-horizontal" role="form">

                     <?php if(!empty(@$notif)){ ?>
                    <div id="signupalert" class="alert alert-<?php echo @$notif['type'];?>">
                        <p><?php echo @$notif['message'];?></p>
                        <span></span>
                    </div>
                    <?php } ?>

                    <input type="text"  name="first_name" placeholder="First Name" value="<?php echo $this->input->post('first_name');?>">
                    <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $this->input->post('last_name');?>">
				    <h6>Login information</h6>
                    <input type="email"  name="email" placeholder="Email Address" value="<?php echo $this->input->post('email');?>">
					<input type="password" name="password" placeholder="Password" value="<?php echo $this->input->post('password');?>">
					<input type="text"  name="confirm_password" placeholder="Confirm Password" value="<?php echo $this->input->post('confirm_password');?>">
                    <div> </div>
                    <div class="register-check-box">
						<div class="check">
                            <?php  
                               $checked ='';
                               if(count($_POST)){
                                   if($this->input->post('is_active'))  $checked ='checked';
                               }
                               else $checked ='checked';
                            ?>
                            <input type="checkbox" name="is_active" value="1" <?php echo $checked;?>> <label class="checkbox">I accept the terms and conditions</label>
                        </div>
                    </div>
					<input type="submit" value="Register">
				</form>
			</div>
		</div>
	</div>
</div>

