<!-- heading -->
<div class="row heading">
	<div class="col-lg-6">
		Manage Product
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-6">
				<a href="<?php echo base_url();?>manageproduct"><div class="submit-btn">New Product</div></a>
			</div>
		</div>
	</div>
</div>
<!-- // end heading -->

  




<?php
// check if there is any Campaign exist into database or not
if(!$number_of_campaign)
{
?>
	<div class="row">
		<div class="col-lg-12 col-centered error-msg-display">
			There is no any Campaign into Database <a href="<?php echo base_url() ?>/managecampaign">Click Here</a> for Add Campaign
		</div>
	</div>
	
<?php
}
//if organization is exist in database..
else{
?>



<div class="row product">
	<div class="col-lg-12">
		<div class="row">
			<!-- left hand site division -->
			<div class="col-lg-6 left-side">
				<!-- search bar -->
				<div class="row">
					<div class="row">
					<div class="col-lg-4 search-bar campaign-search" style="border-bottom:0px;">
						<input type="text" class="search-text" id="search-name" placeholder="Name..">
					</div>
					<div class="col-lg-4 search-bar staff-search"  style="border-bottom:0px;">
						<select name="" id="search-campaign">
							<option value="">Select Campaign</option>
							<?php
							foreach($campaign_detail as $campaign)
							{
								echo '<option value="'.$campaign['id'].'">'.$campaign['name'].'</option>';
							}
							?>
						</select>
					</div>
					<div class="col-lg-4 search-bar staff-search" style="border-bottom:0px;">
						<select name="" id="search-status">
							<option value="">Select Status</option>
							<option value="true">Active</option>
							<option value="false">Inactive</option>
						</select>
					</div>
				</div>
				</div>
				<!-- // end search bar -->

				<div class="row section" style="border-top:1px solid #E7E7E7;">
					<div class="col-lg-12" style="padding-right:0px;">		
						<div class="view-grid staff-grid">

						<?php
						if($product_detail)
						{
							$i = 1;
							foreach($product_detail as $product)
							{
								$description = character_limiter($product['description'],115);
								$campaign_id = $product['campaign'];
								$campaign = $this->model->fetchbyid($campaign_id,'campaign');
								if($product['active'] == "true")
								{
									$active_status = "Active";
								}
								else
								{
									$active_status = "Inactive";
								}
						?>
							<div class="row div-<?php echo $product['id']?>">
								<div class="col-lg-12 top-label">
									<div class="row">
										<div class="col-lg-6 heading-left">
										<?php echo $product['name']; ?>
										</div>
										<div class="col-lg-6 heading-right">
										<?php echo $product['type']; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="row div-<?php echo $product['id']?>">
								<div class="col-lg-12">
									<div class="bottom-label <?php echo $i; ?>" id="<?php echo $product['id']; ?>" >
										<div class="row campaign-detail">
											
											<div class="col-lg-2" style="border-right:1px solid #E7E7E7;">
												<div class="campaign-percent">
													<img src="<?php echo base_url() ?>images/price.png" alt=""> <?php echo $product['amount'] ?>
												</div>
											</div>

											<div class="col-lg-10" style="padding:0">
												<div class="camp-name">
													<?php echo $campaign['name']; ?>
												</div>
												<div class="row">
													<div class="col-lg-6 buyer" style='border-right: 1px solid #E7E7E7;'>
														<div class="buyer"><span><?php echo $product['sell']; ?></span> Buyer</div>
													</div>
													<div class="col-lg-6 active-inactive">
														
														<?php 
														if($active_status == "Active")
														{
															?>
															<div class="active active-status"><?php echo $active_status; ?></div>
															<?php
														}
														else
														{
															?>
															<div class="inactive active-status"><?php echo $active_status; ?></div>
															<?php
														}
														 ?>
														
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						<?php	
							$i++;
							}//end for loop..
							
						}
						else
						{
						?>
						<div class="row">
							<div class="col-lg-12 error-msg" style="margin-top:50px; text-align:center; font-size:30px;">
								There No any Product Into Database..!
							</div>
						</div>
						<?php
						}
						?>
						
							

						
							
						</div><!-- end view-grid -->
					</div><!-- end  class="col-lg-12" -->
				</div><!-- end row section -->

			</div><!-- // end<div class="col-lg-6 left-side"> -->
			<!-- // end left hand site division -->


			<div class="col-lg-6 right-side">

				<div class="display-div">
						
					<div class="row" style="padding:6px 15px;">
						<div class="col-lg-12 right-section-heading">
							<div class="row">
								<!-- course form heading -->
								<div class="col-lg-5 right-heading">
									New Product / Service
								</div>
								<!-- // end subject form heading -->
								<div class="col-lg-4">
									<div class="msg">

										<div class="status-btn">
										</div>
										<div class="success-msg">
										<?php
										if( $this->session->userdata('insert_product') != "" )
										{
											echo "Successfully Added.";
										}
										else if( $this->session->userdata('update_product') != "" )
										{
											echo "Successfully Updated.";
										}
										?>
										</div>
									</div>
									
								</div><!-- end success msg -->
								<!-- edit and close button -->
								<div class="col-lg-3 edit">
									<div class="current-product-id" style="display:none;"></div>
									<img src="<?php echo base_url()?>/images/view.png" alt="view-btn" class="view-btn" title="View Product">
									<img src="<?php echo base_url()?>/images/edit-icon.png" alt="edit-btn" class="edit-btn" title="Edit Product">
									<img src="<?php echo base_url()?>/images/close.png" alt="close-btn" class="close-btn" title="Delete Product">
								</div>
								<!-- // end edit and close button -->

							</div><!-- // end row -->
						</div><!-- // end col-lg-12 -->
					</div><!-- // end row -->

					<div class="display-data-form">

					<?php echo form_open_multipart('manageproduct','id="product-form"');?>
					<div class="row">
						<div class="col-lg-6">
							<div>
								<div class="label-text">Product Name</div>
								<div><input type="text" class="form-control" id="name" name="name"></div>
							</div>
							<div style="margin-top:15px;">
								<div class="label-text">Campaign</div>
								<div>
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
							<div style="margin-top:15px;">
								<div class="label-text">Product Amount</div>
								<div><input type="text" class="form-control rupee-box rupee" id="amount" name="amount" ></div>
							</div>
							
						</div>
						<div class="col-lg-6">

							<div class="row">
								<div class="col-lg-12 image" >
									<div id="uploaded-image">
										<img src="<?php echo base_url(); ?>images/campaign/default.jpg"  alt="Staff Image" class="img">
									</div>
									<div class="cross">
										<img src="<?php echo base_url();?>images/close.png" alt="">
									</div>
								</div>

							</div>
							
							<div class="row" style="margin-top:5px;">
								<div class="col-lg-9 col-centered">
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
							<div style="margin-top:15px;">
								<div class="label-text">Type</div>
								<div>
									<select name="type" id="type" class="form-control">
										<option value="">Select Type</option>
										<option value="Product">Product</option>
										<option value="Service">Service</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div style="margin-top:15px;">
								<div class="label-text">Delivery Time</div>
								<div>
									<div class="row">
										<div class="col-lg-6">
											<input type="text" id="delivery-time" name="delivery-time" class="form-control">
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
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div style="margin-top:15px;">
								<div class="label-text">Quantity</div>
								<div>
									<select name="quantity_type" id="quality-type" class="form-control">
										<option value="Unlimited">Unlimited</option>
										<option value="Limited">Limited</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6 q-amount">
							<div style="margin-top:35px;">
								<input type="text" class="form-control rupee" id="quantity-amount" name="quantity_amount">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6">
							<div style="margin-top:15px;">
								<div>
								<div class="label-text" style="float:left;padding-right:20px;">Launch Date Display</div>
									<label>
										<input type="checkbox" class="checkbox" value="yes" name="date_display">
										<div class="checkbox-img"></div>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="row" style="margin-top:15px;">
						<div class="col-lg-12">
							<div class="label-text">
								Product Sub Description
							</div>
							<div>
								<input type="text" class="form-control" id="sub_desc" name="sub_desc">
							</div>												
						</div>
					</div>

					<div class="row" style="margin-top:15px;">
						<div class="col-lg-12">
							<div class="label-text">
								Product Description
							</div>
							<div>
								<textarea class="form-control" name="desc" id="desc" rows="4"></textarea>
							</div>												
						</div>
					</div>

					<div class="row" style="margin-top:15px;">
						<div class="col-lg-12">
							<div class="label-text">
								About the Offer
							</div>
							<div>
								<textarea class="form-control" name="about_the_offer" rows="4"></textarea>
							</div>												
						</div>
					</div>


					

					<!-- save and cancle button -->
					<div class="row" style="margin-top:15px;">
						<div class="col-lg-3 col-lg-offset-3">
							<input type="hidden" name="insert_btn" value="success">
							<div class="submit-btn form-submit-btn">Save</div>
						</div>
						<div class="col-lg-3">
							<div class="cancel-btn" id="reset">Cancle</div>
						</div>
					</div>
					<!-- //end save and cancle button -->
					
					<?php echo form_close(); ?>

					
					</div><!-- end display-data-form -->
				
				</div>
			</div>
		
		</div>
	</div>
</div>

<?php 
}
?>


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
	$(".display-data-form").on('change', '#files', function(event) {
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


	$(".display-data-form").on('click', '.cross', function(event) {
		$("#files").val("");
		$(".cross").hide();
		$("#uploaded-image").html('<img src="<?php echo base_url(); ?>images/product/default.jpg"  alt="Staff Image" class="img">');
		//this is for remove default logo image into update section..
		$("#default_image").val("");
	});


	$(".q-amount").hide();

	$(".display-data-form").on('change', '#quality-type', function(event) {
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

		if(flag_name == 1 && flag_amount == 1 && flag_campaign == 1 && flag_type == 1 && flag_time == 1 && flag_quantity == 1 && flag_desc == 1)
		{
			$("#product-form").submit();
			$(".submit-btn").removeClass('form-submit-btn');
			$(".la-anim-10").addClass('la-animate');
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






	$(".view-grid").on('click', '.bottom-label', function() {
		var product_id = $(this).attr('id');
		$(".bottom-label").removeClass('selected');
		$(this).addClass('selected');
		$(".current-product-id").text(product_id);
		$(".la-anim-10").addClass('la-animate');

		$.ajax({
			url: "<?php echo base_url();?>index.php/manageproduct/view_product",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {product_id:product_id},
			success: function(result){
				$(".display-data-form").html(result);
				$(".right-section-heading .right-heading").text('View Product / Service');
				$(".edit-btn").show();
				$(".close-btn").show();
				$(".la-anim-10").removeClass('la-animate');
				var active_status = $('.running_status').text();
				if(active_status == 'true')
				{	
					$(".success-msg").text("");
					$(".status-btn").text('Active');
					$(".status-btn").removeClass('inactive-btn')
					$(".status-btn").addClass('active-btn');
					$(".view-btn").show();
				}
				else
				{
					$(".success-msg").text("");
					$(".status-btn").text('Inactive');
					$(".status-btn").removeClass('active-btn')
					$(".status-btn").addClass('inactive-btn');
					$(".view-btn").hide();
				}
			}
		});
	});



	$(".product").on('click', '.inactive-btn', function(event) {
		var product_id = $(".current-product-id").text();
		$(".la-anim-10").addClass('la-animate');
		if(confirm("Do you want to Active this Product ?"))
		{
			$.ajax({
				url: "<?php echo base_url();?>index.php/manageproduct/active_product",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (<O></O>ther values: xml, json, script, or html)',
				data: {product_id : product_id},
				success: function(result){
					$(".success-msg").text("");
					$(".status-btn").text('Active');
					$(".status-btn").removeClass('inactive-btn')
					$(".status-btn").addClass('active-btn');
					$(".selected .active-status").text("Active");
					$(".selected .active-status").removeClass('inactive');
					$(".selected .active-status").addClass('active');
					$(".view-btn").show();
					$(".la-anim-10").removeClass('la-animate');
				}
			});
		}
		else
		{
			$(".la-anim-10").removeClass('la-animate');
		}
	});
	
	$(".product").on('click', '.active-btn', function(event) {
		var product_id = $(".current-product-id").text();
		$(".la-anim-10").addClass('la-animate');
		if(confirm("Do you want to Inactive this Product ?"))
		{
			$.ajax({
				url: "<?php echo base_url();?>index.php/manageproduct/inactive_product",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {product_id : product_id},
				success: function(result){
					$(".success-msg").text("");
					$(".status-btn").text('Inactive');
					$(".status-btn").removeClass('active-btn')
					$(".status-btn").addClass('inactive-btn');
					$(".selected .active-status").text("Inactive");
					$(".selected .active-status").removeClass('active');
					$(".selected .active-status").addClass('inactive');
					$(".view-btn").hide();
					$(".la-anim-10").removeClass('la-animate');
				}
			});
		}
		else
		{
			$(".la-anim-10").removeClass('la-animate');
		}
	});


	$(".product").on('click', '.view-btn', function() {
		var product_code = $(".product_code_hidden").text();
		window.open('<?php echo base_url(); ?>product/p/'+product_code,'_blank');
	});




	$(".product").on('click', '.cancel-btn', function(event) {
		$("#product-form")[0].reset();
	});


	$(".close-btn").click(function() {
		var product_id = $(".current-product-id").text();
		$(".la-anim-10").addClass('la-animate');
		// var confirm = confirm("Do you want to delet Campaign ?");
		if(confirm("Do you want to delet Product ?"))
		{
			$(".display-data-form").html("");
			$(".div-"+product_id).fadeOut(1000);

			$.ajax({
				url: "<?php echo base_url();?>index.php/manageproduct/delete_product",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {product_id:product_id},
				success: function(result){
				$(".display-data-form").html(result);
				$(".right-section-heading .right-heading").text('Add Product');
				$(".edit-btn").hide();
				$(".close-btn").hide();
				$(".view-btn").hide();
				$(".la-anim-10").removeClass('la-animate');
				// alert(result);
				}
			});
		}		
		else
		{
			$(".la-anim-10").removeClass('la-animate');
			//do nothing..
		}
	});


	$(".edit-btn").click(function() {
		var product_id = $(".current-product-id").text();
		$(".la-anim-10").addClass('la-animate');
		$(".display-data-form").html("");
		
		$.ajax({
			url: "<?php echo base_url();?>index.php/manageproduct/edit_product",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {product_id:product_id},
			success: function(result){
				$(".right-section-heading .right-heading").text('Update Product');
				$(".edit-btn").hide();
				$(".close-btn").hide();
				$(".status-btn").text('');
				$(".display-data-form").html(result);
				$(".view-btn").hide();
				$(".la-anim-10").removeClass('la-animate');
				// alert(result);
			}
		});
		
	});



	$('.search-bar').on('keyup', '#search-name', function(event) {
		var product_name = $("#search-name").val();
		var product_campaign = $("#search-campaign").val();
		var product_status = $('#search-status').val();
		$(".la-anim-10").addClass('la-animate');
		$.ajax({
			url: "<?php echo base_url();?>index.php/manageproduct/search_product",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {product_name : product_name, product_campaign :  product_campaign, product_status : product_status},
			success: function(result){
			$(".view-grid").html(result);
			$(".la-anim-10").removeClass('la-animate');
			}
		});
	});

	$('.search-bar').on('change', '#search-campaign', function(event) {
		var product_name = $("#search-name").val()
		var product_campaign = $("#search-campaign").val();
		var product_status = $('#search-status').val();
		$(".la-anim-10").addClass('la-animate');
		$.ajax({
			url: "<?php echo base_url();?>index.php/manageproduct/search_product",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {product_name : product_name, product_campaign :  product_campaign, product_status : product_status},
			success: function(result){
			$(".view-grid").html(result);
			$(".la-anim-10").removeClass('la-animate');
			}
		});
	});

	$('.search-bar').on('change', '#search-status', function(event) {
		var product_name = $("#search-name").val()
		var product_campaign = $("#search-campaign").val();
		var product_status = $('#search-status').val();
		$(".la-anim-10").addClass('la-animate');
		$.ajax({
			url: "<?php echo base_url();?>index.php/manageproduct/search_product",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {product_name : product_name, product_campaign :  product_campaign, product_status : product_status},
			success: function(result){
			$(".view-grid").html(result);
			$(".la-anim-10").removeClass('la-animate');
			}
		});
	});


	<?php
	//execute after Course is successfully Added and show success msg.
  	// 
	if( $this->session->userdata('insert_product') )
	{
	?>
		
		$(".1").css({
			backgroundColor: 'rgb(142, 213, 114)'
		});

		$(".1").animate({
	    	backgroundColor:"#fff"
	  	},9000);
		
		$(".success-msg").delay(5000).fadeOut(1000);
  	
  	<?php
  	}
  	if( $this->session->userdata('update_product') )
	{
	?>
		var id = "<?php echo $this->session->userdata('update_product') ?>";
		$("#"+id).css({
			backgroundColor: 'rgb(142, 213, 114)'
		});

		$("#"+id).animate({
	    	backgroundColor:"#fff"
	  	},9000);
		
		$(".success-msg").delay(5000).fadeOut(1000);

		var p = $( "#"+id );

		var offset = p.offset();
		var top_value = parseFloat(offset.top) - 200;
		$('.staff-grid').animate({scrollTop:top_value}, 'slow');
  	
  	<?php
  	}
  	?>



</script>


<?php
$this->session->unset_userdata('update_product');
$this->session->unset_userdata('insert_product');
?>