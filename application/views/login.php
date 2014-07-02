
<div class="row campaign ">
	<div class="col-lg-9 col-centered">
		<div class="heading">
			<div class="heading-title">
				<span class="no-bar">Admin Login</span>
			</div>
		</div>
	</div>
</div>
<div class="row login-form">

	<div class="col-lg-6 col-centered">
		<div class="row">
			<div class="col-lg-12 error">
				
			</div>
		</div>

		<?php echo form_open(); ?>
		
		<div class="row username animate1 bounceIn">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 col-centered">
				<input type="text" class="form-control" style="border-radius:0;" autofocus required name="username" autocomplete="off" placeholder="Enter Your UserName">
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 col-centered animate2 bounceIn">
				<input type="password" class="form-control" style="border-radius:0;" required placeholder="Enter Your Password" name="password">
			</div>
		</div>

		
		<div class="row" style="margin-top:20px; ">
			<div class="col-lg-6 col-md-8 col-sm-8 col-xs-10 col-centered animate3 bounceIn">
				<input type="Submit" name="submit_btn" class="submit-btn" value="Login">
			</div>
		</div>

		<div class="row error-msg" style="margin-top:20px; margin-bottom:40px; ">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 col-centered animate4 bounceIn">
				<?php 
				if(isset($error) && !empty($error))
				{
					echo $error;
				}
				?>
			</div>
		</div>
		<?php echo form_close(); ?>
		
		

	</div>
</div>