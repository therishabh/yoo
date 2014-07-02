<?php 

if($this->session->userdata('yoousername'))
{
	$username = $this->session->userdata('yoousername');
	//check if username is exist into database or not..
	$check_username = $this->model->fetchbyfield('username',$username,'admin');
	if($check_username)
	{

	}
	else
	{
		header("Location: " . site_url());
	}
}
else
{
	 header("Location: " . site_url());
}
?>
<?php 
$page = explode( '/',uri_string() );
$page_url = $page[0];
?>

<html>
<head>
	<title>Yoo</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-backend.css">


	<!-- user favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.ico"/>
	<!-- // end user favicon -->

	<!-- loder css and script.. -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/component.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>js/modernizr.custom.js"></script>
	<!-- // end loder css and script.. -->


	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>


	<!-- script for data picker -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/site.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>
	<!-- // end script for data picker -->

</head>
<body>
	<div class="la-anim-10"></div>
<!-- left-panel div -->
	<nav id="left-panel">
		<a class="logo-anchor" href="<?php echo base_url();?>dashboard">
		<div class="logo">
			Y
		</div>
		</a>

		<div class="icon">
			<?php
	        if($page_url == "dashboard")
	        {
	        ?>
	        <a href="<?php echo base_url();?>dashboard">
				<img class="active" src="<?php echo base_url();?>images/right-panel/home.png" alt="" title="Home">
			</a>
	        <?php
	        }
	        else
	        {
	        ?>
	        <a href="<?php echo base_url();?>dashboard">
				<img src="<?php echo base_url();?>images/right-panel/home.png" alt="" title="Home">
			</a>
	        <?php
	        }
	        ?>
			
		</div>
		<div class="icon ">
			<?php
	        if($page_url == "managecampaign")
	        {
	        ?>
	        <a href="<?php echo base_url();?>managecampaign">
				<img class="active" src="<?php echo base_url();?>images/right-panel/campaign-icon.png" alt="" title="Manage Campaign">
			</a>
	        <?php
	        }
	        else
	        {
	        ?>
	       <a href="<?php echo base_url();?>managecampaign">
				<img src="<?php echo base_url();?>images/right-panel/campaign-icon.png" alt="" title="Manage Campaign">
			</a>
	        <?php
	        }
	        ?>
			
		</div>
		<div class="icon">
			<?php
	        if($page_url == "manageproduct")
	        {
	        ?>
	        <a href="<?php echo base_url();?>manageproduct">
				<img class="active" src="<?php echo base_url();?>images/right-panel/product.png" alt="" title="Manage Product">
			</a>
	        <?php
	        }
	        else
	        {
	        ?>
	        <a href="<?php echo base_url();?>manageproduct">
				<img src="<?php echo base_url();?>images/right-panel/product.png" alt="" title="Manage Product">
			</a>
	        <?php
	        }
	        ?>
			
			
		</div>
		<div class="icon">
			<?php
	        if($page_url == "setting")
	        {
	        ?>
	        <a href="<?php echo base_url();?>setting">
				<img class="active" src="<?php echo base_url();?>images/right-panel/setting.png" alt="" title="Setting">
			</a>
	        <?php
	        }
	        else
	        {
	        ?>
	        <a href="<?php echo base_url();?>setting">
				<img src="<?php echo base_url();?>images/right-panel/setting.png" alt="" title="Setting">
			</a>
	        <?php
	        }
	        ?>
			
		</div>
		<div class="icon">
			<a href="<?php echo base_url();?>logout">
				<img src="<?php echo base_url();?>images/right-panel/logout.png" alt="" title="Logout">
			</a>
		</div>
		<!-- <div class="user">
			<div class="user_img">
				<img src='<?php //echo base_url();?>/images/admin/default.png'>
			</div>
			<div class="user_name">
				Admin
			</div>
			
		</div> -->
		
	</nav>
	<!-- // end left-panel div -->

	<!-- start main body for content -->
	<div class="main-body" style="overflow-y:auto;">
		<div class="row">
			<div class="col-lg-12">

