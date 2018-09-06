<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    AXIA
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url();?>assets/css/now-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url();?>assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          
        </a>
        <a href="#" class="simple-text logo-normal">
          AXIA
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="#">
              <i class="now-ui-icons users_single-02"></i>
              <p>Personal Information</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons education_atom"></i>
              <p>My Orders</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons location_map-big"></i>
              <p>Payments</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>WishList</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="#">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Personal Information</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
			  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons  users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="<?php echo site_url('account/change_password');?>">Change Password</a>
                  <a class="dropdown-item" href="<?php echo site_url('account/logout');?>">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              	<div class="card-header">
                <h5 class="card-category">Personal Informations</h5>
                <h4 class="card-title">Personal Informations</h4>
              	</div>
              	<div class="card-body">
                	<form  method="post" action="" class="form-horizontal" role="form">
						          <?php if(!empty(@$notif)){ ?>
                    		<div id="signupalert" class="alert alert-<?php echo @$notif['type'];?>">
                        		<p><?php echo @$notif['message'];?></p>
                        		<span></span>
                    		</div>
                    	<?php } ?>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" disabled="" placeholder="User Name" value="<?php echo $user['uname'];?>">
                          </div>
                        </div>
                        <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email"  class="form-control" disabled="" placeholder="Email Address" value="<?php echo $user['email']?>">
                          </div>
                        </div>
                      </div>
                  		<div class="row">
                    		<div class="col-md-6 pr-1">
                      			<div class="form-group">
                        			<label>First Name</label>
                              <?php if(!empty(@$customer)){ ?>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $customer['first_name']?>">
                    	        <?php }else{ ?>
                        			<input type="text" name="first_name" class="form-control" placeholder="First Name" value="">
                              <?php }?>
                      			</div>
                    		</div>
                    		<div class="col-md-6 pl-1">
                      			<div class="form-group">
                        			<label>Last Name</label>
                              <?php if(!empty(@$customer)){ ?>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $customer['last_name']?>">
                    	        <?php }else{ ?>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="">
                              <?php }?>
                      			</div>
                    		</div>
				  		        </div>
                      <div class="row">
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                            <label>Date of Birth</label>
                            <?php if(!empty(@$customer)){ ?>
                              <input type="date" name="dob" class="form-control" placeholder="dob" value="<?php echo $customer['dob']?>">
                    	        <?php }else{ ?>
                                <input type="date" name="dob" class="form-control" placeholder="dob" value="">
                            <?php }?>
                          </div>
                        </div>
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <?php if(!empty(@$customer)){ ?>
                              <input type="phone" name="phone" class="form-control" placeholder="Mobile Number" value="<?php echo $customer['phone']?>">
                    	        <?php }else{ ?>
                                <input type="phone" name="phone" class="form-control" placeholder="Mobile Number" value="">
                            <?php }?>
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                          <div class="form-group">
                          <label>Gender</label>
                          <?php if(!empty(@$customer)){ ?>
                              <?php if($customer['gender'] == 1) { ?>
                                <select id="gender" class="form-control" name="gender">
                                  <option value="1" selected="selected">Male</option>
                                  <option value="2">Female</option>
                                </select>
                              <?php }else{ ?>
                                <select id="gender" class="form-control" name="gender">
                                  <option value="1" >Male</option>
                                  <option value="2" selected="selected">Female</option>
                                </select>
                              <?php } ?>
                    	        <?php }else{ ?>
                                <select id="gender" class="form-control" name="gender">
                                  <option value="1">Male</option>
                                  <option value="2">Female</option>
                                </select>
                            <?php }?>
                           
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Address</label>
                            <?php if(!empty(@$customer)){ ?>
                              <input type="text" name="address" class="form-control" placeholder="Home Address" value="<?php echo $customer['address']?>" >
                    	        <?php }else{ ?>
                                <input type="text" name="address" class="form-control" placeholder="Home Address" value="" >
                            <?php }?>
                            
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                            <input type="submit" class="form-control" style="background :#3399cc ;color:#fff; margin-Top :10px;margin-Left :10px;" value="Update Profile">
                          <div>
                        </div>
                      </div>
					          </div>
					        </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="<?= base_url();?>assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?= base_url();?>assets/img/mike.jpg" alt="...">
                    <h5 class="title">
                      <?php echo $user['uname']; ?>
                    </h5>
                  </a>
                  <p class="description">
				            <?php echo $user['email'];?>
                  </p>
                </div>
                <p class="description text-center">
                    "Lamborghini Mercy
                  <br> Your chick she so thirsty
                  <br> I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="#">
                  AXIA
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Designed By
            <a  target="_blank">AXIA PVT LTD</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?= base_url();?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url();?>assets/js/now-ui-dashboard.min.js?v=1.1.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url();?>assets/demo/demo.js"></script>
</body>

</html>