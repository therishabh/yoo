<!-- start campaign section -->
	<div class="row campaign-section product">
		<div class="col-lg-12 col-md-12 col-sm-12">

			<!-- Blue Bar -->
			<div class="row">
				<div class="error-msg-404">
					<div class="error-404">Type Your Message Here</div>
					<div class="play-game-msg">Type your message here</div>
				</div>
			</div>
			<!-- // end Blue Bar -->


			<div class="row campaign">
				<div class="col-lg-9 col-centered">
					<div class="heading">
						<div class="heading-title">
							<span class="no-bar">Add Product & Service</span>
						</div>
						<?php
						if($this->session->userdata('insert_product'))
						{
						?>
						<div class="subheading" style="color:green">Product/Service has been Successfully Added.</div>
						<?php
						} 
						if($this->session->userdata('update_product'))
						{
						?>
						<div class="subheading" style="color:green">Product/Service has been Successfully updated.</div>
						<?php
						} 
						 ?>
					</div>
				</div>
			</div>

			<div class="row campaign">
				<div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 col-centered">

					<?php echo form_open_multipart('addproduct','id="product-form"');?>
					<fieldset>
						<legend>Personal Info</legend>
						<div class="row">
							<div class="col-lg-3 label-text">Name *</div>
							<div class="col-lg-3"><input type="text" name="username" id="username" class="form-control"></div>
							<div class="col-lg-3 label-text">Mobile *</div>
							<div class="col-lg-3"><input type="text" name="mobile" id="mobile" class="form-control number-only"></div>
						</div>
						
						<div class="row" style="margin-top:15px;">
							<div class="col-lg-3 label-text">Email Id *</div>
							<div class="col-lg-3"><input type="text" id="email" name="email" class="form-control"></div>
							<div class="col-lg-3 label-text">Address</div>
							<div class="col-lg-3">
								<textarea class="form-control" name="address" id="address" rows="2"></textarea>
							</div>
						</div>
					</fieldset>

					<fieldset style="margin-top:20px;">
						<legend>Product & Service Info</legend>
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6 label-text">Product Name *</div>
									<div class="col-lg-6"><input type="text" class="form-control" id="name" name="name"></div>
								</div>
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Campaign *</div>
									<div class="col-lg-6">
									<select class="form-control" name="campaign" id="campaign">
										<option value="">Select Campaign</option>
										<?php
										foreach($campaign_detail as $campaign)
										{
											echo '<option value="'.$campaign['id'].'">'.$campaign['name'].'</option>';
										}
										?>
									</select>
									</div>
								</div>
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Product Amount *</div>
									<div class="col-lg-6">
										<input type="text" class="form-control rupee-box rupee" id="amount" name="amount" >
									</div>
								</div>
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Type *</div>
									<div class="col-lg-6">
										<select name="type" id="type" class="form-control">
											<option value="">Select Type</option>
											<option value="Product">Product</option>
											<option value="Service">Service</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-lg-offset-2">
								<div class="row">
									<div class="col-lg-10 col-centered image" >
										<div id="uploaded-image">
											<img src="<?php echo base_url(); ?>images/product/default.jpg"  alt="Staff Image" class="img">
										</div>
										<div class="cross">
											<img src="<?php echo base_url();?>images/close.png" alt="">
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top:5px;">
									<div class="col-lg-8 col-centered">
										<label style="width:100%;">
											<input type="file" style="display:none;" name="image" accept="image/*" id="files">
											<div class="view-more" style="font-weight:normal;">Upload Image</div>
										</label>
									</div>
								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Delivery Time *</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="col-lg-6">
												<input type="text" id="delivery-time" name="delivery-time" class="form-control number-only">
											</div>
											<div class="col-lg-6">
												<select name="delivery-mode" id="" class="form-control">
													<option value="Days">Days</option>
													<option value="Hours">Hours</option>
												</select>
											</div>
										</div>
									</div>
								</div>

							</div>
							
							<div class="col-lg-6" style="margin-top:15px;">
								<div class="row">
									<div class="col-lg-6 label-text">Quantity *</div>
									<div class="col-lg-6">
										<select name="quantity_type" id="quality-type" class="form-control">
											<option value="Unlimited">Unlimited</option>
											<option value="Limited">Limited</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row q-amount" style="margin-top:15px;">
							<div class="col-lg-6 col-lg-offset-6">
								<div class="row">
									<div class="col-lg-6 label-text">Quantity Amount *</div>
									<div class="col-lg-6"><input type="text" class="form-control rupee" id="quantity-amount" name="quantity_amount"></div>
								</div>
								
							</div>
						</div>

						<div class="row" style="margin-top:15px;">
							<div class="col-lg-3 label-text">Description *</div>
							<div class="col-lg-9">
								<textarea name="desc" id="desc" rows="4" class="form-control"></textarea>
							</div>
						</div>
						<div class="row" style="margin-top:15px;">
							<div class="col-lg-3 label-text">About The Offer</div>
							<div class="col-lg-9">
								<textarea name="about_the_offer" id="about_the_offer" rows="4" class="form-control"></textarea>
							</div>
						</div>

						<!-- save and cancle button -->
						<div class="row" style="margin-top:15px;">
							<div class="col-lg-4 col-centered">
								<div class="row">
									<div class="col-lg-6">
										<input type="hidden" name="insert_btn" value="success">
										<div class="view-more form-submit-btn">Save</div>
									</div>
									<div class="col-lg-6">
										<a href="<?php echo base_url() ?>addproduct"><div class="view-more" id="reset">Cancel</div></a>
									</div>
								</div>
							</div>
						</div>
						<!-- //end save and cancle button -->
					

					</fieldset>

					<?php echo form_close(); ?>

				</div>
			</div>
	

		</div>
	</div>

<script type="text/javascript">
	$(".cross").hide();

	function handleFileSelect(evt) {
		
	var files = evt.target.files; // FileList object

	// Loop through the FileList and render image files as thumbnails.
	for (var i = 0, f; f = files[i]; i++) {
		if (!f.type.match('image.*')) {
		continue;
		// Only process image files.
	}

	var reader = new FileReader();

	// Closure to capture the file information.
	reader.onload = (function(theFile) {
		
		return function(e) {
		  // Render thumbnail.
		  var span = document.createElement('span');
		  span.innerHTML = ['<img class="img" src="', e.target.result,
		                    '" title="', escape(theFile.name), '"/>'].join('');
		  document.getElementById('uploaded-image').insertBefore(span, null);
			};
		})(f);

		// Read in the image file as a data URL.
		reader.readAsDataURL(f);
		}
	}
	$("#files").hide();



	//display logo image when select any logo..
	$(".product").on('change', '#files', function(event) {
		$("#uploaded-image").html("");
		//execute if use select any image
		if($(this).val() != "")
		{
			$(".cross").show();
			$("#default_image").val("hello");
	  		handleFileSelect(event);

		}
		//execute if user has not select any image..
		else
		{
			$(".cross").hide();
			$("#uploaded-image").html('<img src="<?php echo base_url(); ?>images/product/default.jpg"  alt="Staff Image" class="img">');
			$("#default_image").val("");
		}

	});


	$(".product").on('click', '.cross', function(event) {
		$("#files").val("");
		$(".cross").hide();
		$("#uploaded-image").html('<img src="<?php echo base_url(); ?>images/product/default.jpg"  alt="Staff Image" class="img">');
		//this is for remove default logo image into update section..
		$("#default_image").val("");
	});


	$(".q-amount").hide();


	$(".product").on('change', '#quality-type', function(event) {
		var value = $(this).val();
		if(value == "Limited")
		{
			$(".q-amount").slideDown();
			$(".q-amount").focus();
		}
		if(value == "Unlimited")
		{
			$(".q-amount").slideUp();
		}
	});

	// script for percent box, rupee-box, course-fee-value..
	$(".product").on('keypress','.rupee',function(e){
	
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57))
		{
			return false;
		}

		//when press dot 
		if(e.which == 46)
		{
			//check if one dot is exist in string then return false
			if($(this).val().indexOf('.') !== -1)
			{
				return false
			}
		}

		//if only one digit is enter in discount textbox
		if( $(this).val().length == 1 )
		{
			//if there is only one dot and it is starting digit then return 0.
			if($(this).val().indexOf('.') !== -1)
			{
				$(this).val("0.");
			}
		}

	});

	//excute when key up from rupee-box and course fee value..
	$(".product").on('keyup','.rupee',function(e){

		//if there is 0 starting before percentage..
		//0999 == 999
		if($(this).val().length == 2)
		{
			if($(this).val() != "0.")
			{
				if($(this).val()[0] == '0')
				{
					$(this).val($(this).val()[1]);	
				}
			}
		}
	});


	$(".product").on('keypress', '.number-only', function(e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		{
			return false;
		}
	});

	$('.product').on('click', '.form-submit-btn', function() {
		if($("#name").val() != "")
		{
			var flag_name = 1;
		}
		else
		{
			var flag_name = 0;
			$("#name").parent().addClass('has-error');
		}

		if($("#amount").val() != "" && $("#amount").val() != "0")
		{
			var flag_amount = 1;
		}
		else
		{
			var flag_amount = 0;
			$("#amount").parent().addClass('has-error');
		}

		if($("#campaign").val() != "")
		{
			var flag_campaign = 1;
		}
		else
		{
			var flag_campaign = 0;
			$("#campaign").parent().addClass('has-error');
		}

		if($("#type").val() != "")
		{
			var flag_type = 1;
		}
		else
		{
			var flag_type = 0;
			$("#type").parent().addClass('has-error');
		}

		if($("#delivery-time").val() != "" && $("#delivery-time").val() != "0")
		{
			var flag_time = 1;
		}
		else
		{
			var flag_time = 0;
			$("#delivery-time").parent().addClass('has-error');
		}

		if( $("#quality-type").val() == "Unlimited")
		{
			var flag_quantity = 1;
		}
		else
		{
			if( $("#quantity-amount").val() != "" && $("#quantity-amount").val() != "0")
			{
				var flag_quantity = 1;
			}
			else
			{
				var flag_quantity = 0;
				$("#quantity-amount").parent().addClass('has-error');
			}
		}

		if($("#desc").val() != "")
		{
			var flag_desc = 1;
		}
		else
		{
			var flag_desc = 0;
			$("#desc").parent().addClass('has-error');
		}

		if($("#username").val() != "")
		{
			var flag_username = 1;
		}
		else
		{
			var flag_username = 0;
			$("#username").parent().addClass('has-error');
		}

		if($("#email").val() != "")
		{
			//execute if email id is valid
			email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
				
			if( email_regex.test( $("#email").val() ) )
			{
				flag_email = 1;
			}
			//execute if email id is not valid
			else
			{
				//display error
				$(this).parent().addClass('has-error');
				flag_email = 0;
			}
		}
		else
		{
			var flag_email = 0;
			$("#email").parent().addClass('has-error');
		}

		if($("#mobile").val() != "")
		{
			var flag_mobile = 1;
		}
		else
		{
			var flag_mobile = 0;
			$("#mobile").parent().addClass('has-error');
		}



		if(flag_name == 1 && flag_amount == 1 && flag_campaign == 1 && flag_type == 1 && flag_time == 1 && flag_quantity == 1 && flag_desc == 1 && flag_username == 1 && flag_mobile == 1 && flag_email == 1)
		{
			$("#product-form").submit();
		}
		else
		{
			$('.msg').show();
			$('.msg').text("Please Enter Basic Fields !");
			$('.msg').removeClass('success-msg');
			$('.msg').addClass('error-msg');
			$('.msg').delay(5000).fadeOut(1000);
		}
	});

	$(".product").on('focusin', '#name', function(event) {
		$("#name").parent().removeClass('has-error');
	});
	$(".product").on('focusin', '#amount', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#campaign', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#type', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focusin', '#delivery-time', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#quantity-amount', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#desc', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#username', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#email', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".product").on('focus', '#mobile', function(event) {
		$(this).parent().removeClass('has-error');
	});

	<?php
	if($this->session->userdata('insert_product'))
	{
	?>
	$(".subheading").delay(5000).slideUp('slow');
	<?php
	} 
	if($this->session->userdata('update_product'))
	{
	?>
	$(".subheading").delay(5000).slideUp('slow');
	<?php
	} 
	?>

</script>


<?php 
$this->session->unset_userdata('insert_product');
$this->session->unset_userdata('update_product');
 ?>