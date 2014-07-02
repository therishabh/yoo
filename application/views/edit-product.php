<!-- start campaign section -->
	<div class="row campaign-section product">
		<div class="col-lg-12 col-md-12 col-sm-12">

			<!-- Blue Bar -->
			<!-- <div class="row">
				<div class="error-msg-404">
					<div class="error-404">Oops! That page couldn't be found.</div>
					<div class="play-game-msg">Want to play some Pacman instead?</div>
				</div>
			</div> -->
			<!-- // end Blue Bar -->
			
			<?php 
			$delivery = explode(" ",$product_data['delivery']);
			$delivery_time = $delivery[0];
			$delivery_mode = $delivery[1];

			 ?>

			<div class="row campaign">
				<div class="col-lg-9 col-centered">
					<div class="heading">
						<div class="heading-title">
							<span class="no-bar">Edit Product & Service</span>
						</div>
						<?php
						if(isset($update_product))
						{
						?>
						<div class="subheading" style="color:green">Product/Service has been successfully added.</div>
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
							<div class="col-lg-3"><input type="text" name="username" value="<?php echo $user_data['name']; ?>" id="username" class="form-control"></div>
							<div class="col-lg-3 label-text">Mobile *</div>
							<div class="col-lg-3"><input type="text" name="mobile" id="mobile" value="<?php echo $user_data['phone']; ?>" class="form-control number-only"></div>
						</div>
						
						<div class="row" style="margin-top:15px;">
							<div class="col-lg-3 label-text">Email Id *</div>
							<div class="col-lg-3"><input type="text" id="email" name="email" value="<?php echo $user_data['email']; ?>" class="form-control"></div>
							<div class="col-lg-3 label-text">Address</div>
							<div class="col-lg-3">
								<textarea class="form-control" name="address" id="address" rows="2"><?php echo $user_data['address']; ?></textarea>
							</div>
						</div>
					</fieldset>

					<fieldset style="margin-top:20px;">
						<legend>Product & Service Info</legend>
					
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6 label-text">Product Name *</div>
									<div class="col-lg-6"><input type="text" class="form-control" id="name" name="name"  value="<?php echo $product_data['name']; ?>"> </div>
								</div>
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Campaign *</div>
									<div class="col-lg-6">
									<select class="form-control" name="campaign" id="campaign">
										<?php
										foreach($campaign_detail as $campaign)
										{
											if($product_data['campaign'] == $campaign['id'])
											{
											echo '<option selected value="'.$campaign['id'].'">'.$campaign['name'].'</option>';
											}
											else
											{
											echo '<option value="'.$campaign['id'].'">'.$campaign['name'].'</option>';
											}
										}
										?>
									</select>
									</div>
								</div>
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Product Amount *</div>
									<div class="col-lg-6">
										<input type="text" class="form-control rupee-box rupee" value="<?php echo $product_data['amount'] ?>" id="amount" name="amount" >
									</div>
								</div>
								<div class="row" style="margin-top:15px;">
									<div class="col-lg-6 label-text">Type *</div>
									<div class="col-lg-6">
										<select name="type" id="type" class="form-control">
											<?php
											if($product_data['type'] == "Product")
											{
												echo '<option selected value="Product">Product</option>';
											} 
											else
											{
												echo '<option value="Product">Product</option>';
											}

											if($product_data['type'] == "Service")
											{
												echo '<option selected value="Service">Service</option>';
											} 
											else
											{
												echo '<option value="Service">Service</option>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-lg-offset-2">
								<div class="row">
									<div class="col-lg-10 col-centered image" >
										<div id="uploaded-image">
											<img src="<?php echo base_url(); ?>images/product/<?php echo $product_data['image'] ?>"  alt="Staff Image" class="img">
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
											<div class="upload-file">Upload Image</div>
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
												<input type="text" id="delivery-time" value="<?php echo $delivery_time; ?>"  name="delivery-time" class="form-control number-only">
											</div>
											<div class="col-lg-6">
												<select name="delivery-mode" id="" class="form-control">
													<?php
													if($delivery_mode == "Hours")
													{
														echo '<option value="Days">Days</option>
														<option selected value="Hours">Hours</option>';
													}
													else
													{
														echo '<option selected value="Days">Days</option>
														<option value="Hours">Hours</option>';
													} 
													 ?>
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
											<?php 
											if($product_data['quantity'] == "Unlimited")
											{
												echo '<option selected value="Unlimited">Unlimited</option>
												<option value="Limited">Limited</option>';
											}
											else
											{
												echo '<option value="Unlimited">Unlimited</option>
												<option selected value="Limited">Limited</option>';
											}
											 ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<?php
						if($product_data['quantity'] == "Limited")
						{
						?>
						<div class="row q-amount" style="margin-top:15px;">
							<div class="col-lg-6 col-lg-offset-6">
								<div class="row">
									<div class="col-lg-6 label-text">Quantity Amount *</div>
									<div class="col-lg-6"><input type="text" class="form-control rupee" value="<?php echo $product_data['quantity_amount']; ?>" id="quantity-amount" name="quantity_amount"></div>
								</div>
								
							</div>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="row q-amount" style="margin-top:15px; display:none;">
							<div class="col-lg-6 col-lg-offset-6">
								<div class="row">
									<div class="col-lg-6 label-text">Quantity Amount *</div>
									<div class="col-lg-6"><input type="text" class="form-control rupee" value="<?php echo $product_data['quantity_amount']; ?>" id="quantity-amount" name="quantity_amount"></div>
								</div>
								
							</div>
						</div>
						<?php
						}
						?>

						<div class="row" style="margin-top:15px;">
							<div class="col-lg-3 label-text">Description *</div>
							<div class="col-lg-9">
								<textarea name="desc" id="desc" rows="4" class="form-control"><?php echo $product_data['description'] ?></textarea>
							</div>
						</div>

						<div class="row" style="margin-top:15px;">
							<div class="col-lg-3 label-text">About The Offer</div>
							<div class="col-lg-9">
								<textarea name="about_the_offer" id="about_the_offer" rows="4" class="form-control"><?php echo $product_data['about_the_offer'] ?></textarea>
							</div>
						</div>

						<!-- save and cancle button -->
						<div class="row" style="margin-top:15px;">
							<div class="col-lg-4 col-centered">
								<div class="row">
									<div class="col-lg-6">
										<input type="hidden" name="code_2" value="<?php echo $product_data['code_2']; ?>">
										<input type="hidden" name="code" value="<?php echo $product_data['code']; ?>">
										<input type="hidden" name="default_image" id="default_image" value="default">
										<input type="hidden" name="old_image" value="<?php echo $product_data['image']; ?>">
										<input type="hidden" name="product_id" value="<?php echo $product_data['id']; ?>">
										<input type="hidden" name="old_campaign_id" value="<?php echo $product_data['campaign']; ?>">
										<input type="hidden" name="update_btn" value="success">
										<div class="submit-btn form-submit-btn">Update</div>
									</div>
									<div class="col-lg-6">
										<div class="cancel-btn" id="reset">Cancle</div>
									</div>
								</div>
							</div>
						</div>
						<!-- //end save and cancle button -->
					


					<?php echo form_close(); ?>
					</fieldset>

				</div>
			</div>
	

		</div>
	</div>

<script type="text/javascript">
	<?php
	if($product_data['image'] == "default.jpg")
	{
		?>
		$(".cross").hide();
		<?php
	}
	else
	{
		?>
		$(".cross").show();
		<?php
	}
	?>

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

	$('.product').on('click', '.submit-btn', function() {
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
	if(isset($insert_product))
	{
	?>
	$(".subheading").delay(2000).slideUp(slow);
	<?php
	} 
	?>

</script>