<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>

.body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 10px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<div class="body">
<div class="container body">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo base_url('assets/images/user.png'); ?>" class="img-responsive">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					<p class="text-center"><strong><?php echo $session_user['first_name'].' '.$session_user['last_name']; ?></strong></p>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
						<div  id="main">    

<div class="register" style="padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 5em;
    padding-left: 0px;">
<div >
	<h2>Build Your Profile</h2>
	<div class="login-form-grids" style="width :100%">
		<h5>profile information</h5>
		<form method="post" action="" class="form-horizontal" role="form">

								 <?php if(!empty(@$notif)){ ?>
								<div id="signupalert" class="alert alert-<?php echo @$notif['type'];?>">
										<p><?php echo @$notif['message'];?></p>
										<span></span>
								</div>
								<?php } ?>

								<div class= "row" >
								<div class="col-md-6" style="margin-bottom: 20px" >
								<input type="text"  name="first_name" placeholder="First Name" value="<?php echo $this->input->post('first_name');?>">
								</div>
								<div class="col-md-6" style="margin-bottom: 20px" >
								<input type="text"  name="first_name" placeholder="First Name" value="<?php echo $this->input->post('first_name');?>">
								</div>
								<div>

								<input type="text"  name="first_name" placeholder="First Name" value="<?php echo $this->input->post('first_name');?>">
								<input type="text" name="last_name" placeholder="Last Name" value="<?php echo $this->input->post('last_name');?>">
				<h6>Login information</h6>
								<input type="email"  name="email" placeholder="Email Address" value="<?php echo $this->input->post('email');?>">
			<input type="password" name="password" placeholder="Password" value="<?php echo $this->input->post('password');?>">
			<input type="text"  name="confirm_password" placeholder="Confirm Password" value="<?php echo $this->input->post('confirm_password');?>">
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
								<!-- <div class="register-check-box">
				<div class="check">
												<input type="checkbox" name="is_active" value="1" <?php echo $checked;?>> <label>I accept the terms and conditions</label>
					<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
				</div>
			</div> -->
			<input type="submit" value="Register">
		</form>
	</div>
	<div class="register-home">
		<a href="index.html">Home</a>
	</div>
</div>
</div>

            </div>
		</div>
	</div>
</div>
