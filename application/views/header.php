<?php date_default_timezone_set('Asia/Calcutta'); ?>
<?php 
$page = explode( '/',uri_string() );
$page_url = $page[0];
?>

<!DOCTYPE HTML>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Yoo</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize-menu.css">

	<link rel="stylesheet" href="https://www.google.com/fonts#QuickUsePlace:quickUse/Family:Droid+Sans">


	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.delay.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.min.css">

	<!-- user favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.ico"/>
	<!-- // end user favicon -->

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/responsive-nav.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
	  function initialize() {
	    var position = new google.maps.LatLng(28.6331334,77.2203939);
	    var myOptions = {
	      zoom: 16,
	      center: position,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map(
	        document.getElementById("map_canvas"),
	        myOptions);
	 
	    var marker = new google.maps.Marker({
	        position: position,
	        map: map,
	        title:"YOO"
	    });  
	 
	    var contentString = '<strong>Yoo</strong><br> A 255/585, Rajiv Chook, New Delhi, INDIA <br>+91-8010 101010 <br>i@yoo.com';
	    var infowindow = new google.maps.InfoWindow({
	        content: contentString
	    });
	 
	    google.maps.event.addListener(marker, 'click', function() {
	      infowindow.open(map,marker);
	    });
	 
	  }
	 
	</script>

</head>
<body class="custom-background home" onload="initialize()">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="row top-header">
				<div class="col-lg-9 col-sm-9 col-md-9 col-xs-10 col-centered">
						
					<!-- start top header login , registration and social icons -->
					<div class="row">
						<!-- <div class="col-lg-1 col-md-2 col-sm-2 col-xs-6 login-text">
							<span>&gt;</span><a href="<?php echo base_url() ?>/admin" style="color:#000;">Login</a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 register-text">
								<span>&gt;</span>Register
						</div> -->
						<div class="col-lg-9 col-lg-offset-3  col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 col-xs-12">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-5  col-lg-offset-8 col-md-offset-8 col-sm-offset-8 social-icon">
									<a href="#"><img src="<?php echo base_url(); ?>images/icon_header_face.png" alt=""></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/icon_footer_tw.png" alt=""></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/youtube-icon.png" alt=""></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/instagram_icon.png" alt=""></a>
									<a href="#"><img src="<?php echo base_url(); ?>images/icon_footer_g.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
					<!--// end top header login , registration and social icons -->
					
				</div>
			</div><!-- end header -->
		</div><!-- end col-lg-12 -->
	</div> <!-- end row -->

	<div class="row">
		<div class="col-lg-12 col-sm-12">

			<div class="row header">
				<div class="col-lg-9 col-sm-9 col-xs-12 col-centered">

					<!-- start logo header -->
					<div class="row logo-header">
						<div class="col-lg-3 col-sm-3 col-xs-12 logo">
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a>
						</div>
						<div class="col-lg-9 col-sm-9 col-xs-12  menu">
							<nav class="clearfix">
							    <ul class="clearfix">
							        <?php
							        if($page_url == "")
							        {
							        	echo '<li><a href="'.base_url().'" class="active">Home</a></li>';
							        }
							        else
							        {
							        	echo '<li><a href="'.base_url().'">Home</a></li>';
							        }
							        ?>
							        <?php
							        if(current_url() == "http://www.test.codehoppr.com/yoo")
							        {
							        	echo '<li><a href="'.base_url().'yoo" class="active">How it works</a></li>';
							        }
							        else
							        {
							        	echo '<li><a href="'.base_url().'yoo">How it works</a></li>';
							        }

							        if($page_url == "campaign")
							        {
							        	echo '<li><a href="'.base_url().'campaign" class="active">Campaigns</a></li>';
							        }
							        else
							        {
							        	echo '<li><a href="'.base_url().'campaign">Campaigns</a></li>';
							        }

							        if($page_url == "product")
							        {
							        	echo '<li><a href="'.base_url().'product" class="active">Products & Services</a></li>';
							        }
							        else
							        {
							        	echo '<li><a href="'.base_url().'product">Products & Services</a></li>';
							        }

							        if($page_url == "addproduct")
							        {
							        	echo '<li><a href="'.base_url().'addproduct" class="active">Offer Anything!</a></li>';
							        }
							        else
							        {
							        	echo '<li><a href="'.base_url().'addproduct">Offer Anything!</a></li>';
							        }
							        ?>
							 
							    </ul>
							    <a href="#" id="pull">Menu</a>
							   
							</nav>
						</div>
					</div>
					<!-- // end logo header -->

				</div><!-- //end col-lg-9 centered -->
			</div><!-- //end header division -->

		</div>
	</div>