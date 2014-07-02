<!DOCTYPE HTML>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Yoo | 404 Error</title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize-menu.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">


  <!-- user favicon -->
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.ico"/>
  <!-- // end user favicon -->

  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/responsive-nav.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</head>
<body class="custom-background home" style="overflow-y:scroll;">
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
              <a href="index.php"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a>
            </div>
            <div class="col-lg-9 col-sm-9 col-xs-12 menu">
              <nav class="clearfix">
                  <ul class="clearfix">
                      <?php
                        echo '<li><a href="'.base_url().'">Home</a></li>';
                      
                        echo '<li><a href="'.base_url().'yoo">How it works</a></li>';
                      
                        echo '<li><a href="'.base_url().'campaign">Campaigns</a></li>';
                     
                        echo '<li><a href="'.base_url().'product">Products & Services</a></li>';
                     
                        echo '<li><a href="'.base_url().'addproduct">Offer Anything!</a></li>';
                      
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

  <div class="row product-section">
    <div class="col-lg-12 col-md-12 col-sm-12">
      
      <div class="row">
        <div class="error-msg-404">
          <div class="error-404">Oops! That page couldn't be found.</div>
          <div class="play-game-msg">Want to play some Pacman instead?</div>
        </div>
      </div>

      <div class="row campaign camp-view">
        <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10 col-centered" style="margin-top:20px;">
          <div align="center"><embed src="<?php echo base_url(); ?>swf/pacman.swf" width="100%" height="500px" autostart="true" loop="false" controller="true"></embed></div>
        </div>
      </div>
    </div>
  </div>

  
  
</body>
</html>

<script>
jQuery(document).ready(function($) {
  
  var pull= $('#pull');
  var menu = $('nav ul');

  $(pull).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle();
  });


  
});
</script>