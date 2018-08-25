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
<!-- start-smoth-scrolling -->
</head>
	
<body>
<style>
.al{
    padding-left:20px;
    padding-right:20px;
    padding-bottom:20px;
}
.product_list_header span {
    color: #fe9126;
    top: 0.1em;
}
.nav>li>a:focus {
    text-decoration: none;
    background: rgba(255, 170, 0, 0.11);
}
</style>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<!-- <div class="w3l_offers">
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.html">SHOP NOW</a></p>
			</div> -->
			<div class="agile-login">
             
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
                                        <p>
                                            <a href="<?php echo site_url('account/logout');?>" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>       </div>
                        </li>
                    </ul>
                </li>
			</div>
					
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
        <div class="w3ls_logo_products_left">
				<h1><a href="index.html">AXIA</a></h1>
			</div>
		<div class="w3ls_logo_products_left1">
				<!-- <ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
					
				</ul> -->
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> 
            </div>
		</div>
        <div>
        </div>
      
	</div>
<!-- //header -->