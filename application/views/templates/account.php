<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url();?>assets/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?= base_url();?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="<?= base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?= base_url();?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
});
</script>
<div class="agileits_header">
	<div class="container">
		<div class="w3ls_logo_products_left">
			<h1><a href="<?php echo site_url('/');?>">AXIA</a></h1>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
			</form>
		</div>
	<div class="product_list_header">  
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-user"></span> 
					<span><?php echo $session_user['first_name'];?></span>
				</a>
				<ul class="dropdown-menu al">
					<li>
						<div class="navbar-login">
							<div class="row">
								<div class="col-lg-8">
									<p class="text-left"><strong><?php echo $session_user['first_name'].' '.$session_user['last_name']; ?></strong></p>
									<p class="text-left small"><?php echo $session_user['email'];?></p>
								</div>
							</div>
						</div>
					</li>
					<li class="divider"></li>
					<li>
						<div class="navbar-login">
							<div class="row">
								<div class="col-lg-8">
									<p class="text-left" style="min-width:150px;"><a href="<?php echo site_url('account/change_password');?>">Change password</a></p>
								</div>
							</div>
						</div>
					</li>
					<li class="divider"></li>
					<li>
						<div class="navbar-login">
							<div class="row">
								<div class="col-lg-8">
									<p  class="text-left" style="min-width:150px;"><a href="<?php echo site_url('account/cart');?>">Add to Cart</a></p>
								</div>
							</div>
						</div>
					</li>
					<li class="divider"></li>
					<li>
						<div class="navbar-login">
							<div class="row">
								<div class="col-lg-8">
									<p  class="text-left" style="min-width:150px;"><a href="<?php echo site_url('account/profile');?>">Profile</a></p>
								</div>
							</div>
						</div>
					</li>
					<li class="divider"></li>
					<li>
						<div class="navbar-login navbar-login-session">
							<div class="row">
								<div class="col-lg-12">
									<p><a href="<?php echo site_url('account/logout');?>" class="btn btn-danger btn-block">Logout</a>
									</p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
		</ul>       
	</div>
</div>
</div>
<div class="body">
<div class="container" >
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


<div >
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
