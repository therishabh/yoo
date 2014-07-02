
<!-- heading -->
<div class="row heading">
	<div class="col-lg-6">
		Manage Campaign
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-6">
				<a href="<?php echo base_url();?>managecampaign"><div class="submit-btn">New Campaign</div></a>
			</div>
		</div>
	</div>
</div>
<!-- // end heading -->


<div class="row campaign">
	<div class="col-lg-12">
		<div class="row">
			<!-- left hand site division -->
			<div class="col-lg-6 left-side">
				<!-- search bar -->
				<div class="row">
					<div class="col-lg-6 search-bar campaign-search">
						<input type="text" class="campaign-name search-text"  placeholder="Name..">
					</div>
					<div class="col-lg-6 search-bar staff-search">
						<input type="text" class="campaign-amount search-text rupee"  placeholder="Amount..">
					</div>
					
				</div>
				<!-- // end search bar -->

				<div class="row section">
					<div class="col-lg-12" style="padding-right:0px;">		
						<div class="view-grid staff-grid">

							<?php
							//check if there is any campaign into database.
							if($number_of_campaign)
							{
								$i = 1;
								foreach($campaign_detail as $campaign)
								{
									$description = $campaign['description'];
								
									// count left days
									$current_date = date('Y/m/d');
									$end_date_array = explode('/',$campaign['end_date']);
									$end_date = $end_date_array[2]."/".$end_date_array[1]."/".$end_date_array[0];

									$startTimeStamp = strtotime($current_date);
									$endTimeStamp = strtotime($end_date);

									$timeDiff = $endTimeStamp - $startTimeStamp;

									$numberDays = $timeDiff/86400;  // 86400 seconds in one day

									$numberDays = intval($numberDays);

									// and you might want to convert to integer
									if($numberDays < 0)
									{
										$numberDays = 0;
									}
									else
									{
										$numberDays;
									}
									
									
									// end count left days
									 
									//count complete status..
									$complete_percent = ($campaign['complete_amount'] / $campaign['amount']) * 100;
									$complete_percent = floor($complete_percent);

									if($complete_percent > 100)
									{
										$complete_percent = 100;
									}


									//execute if campaign is expaired..
									if($endTimeStamp <= $startTimeStamp)
									{
									?>
									<div class="row div-<?php echo $campaign['id']?>">
										<div class="col-lg-12 top-label">
											<div class="row">
												<div class="col-lg-6 heading-left">
												<?php echo $campaign['name']; ?>
												</div>
												<div class="col-lg-6 heading-right">
												<img src="<?php echo base_url() ?>images/price.png" alt=""> <?php echo $campaign['amount'] ?>
												</div>
											</div>
										</div>
									</div>
					

									<div class="row div-<?php echo $campaign['id']?>">
										<div class="col-lg-12">
											<div class="bottom-label expired <?php echo $i; ?>" id="<?php echo $campaign['id']; ?>" >
												<div class="row campaign-detail">
													
													<div class="col-lg-2" style="border-right:1px solid #E7E7E7;">
														<?php
														if($campaign['active'] == "true")
														{
															echo '<div class="campaign-percent" style="background:rgb(2, 131, 2);">'.$complete_percent.'%</div>';
														}
														else
														{
															echo '<div class="campaign-percent" style="background:rgb(172, 3, 3);">'.$complete_percent.'%</div>';
														}
														?>
														
														
													</div>
													<div class="col-lg-4" style="border-right:1px solid #E7E7E7;">
														<div><span style="font-family: Patua One;"><?php echo $campaign['num_of_product']; ?></span> Products</div>
														<div><span style="font-family: Patua One;"><?php echo $numberDays ?></span> Days Left</div>
														<div><span style="font-family: Patua One;"><?php echo $campaign['sell']; ?></span> Buyers</div>
													</div>
													<div class="col-lg-6">
														<?php echo $description; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									}//end if condition
									else
									{
									?>
									<div class="row div-<?php echo $campaign['id']?>">
										<div class="col-lg-12 top-label">
											<div class="row">
												<div class="col-lg-6 heading-left">
												<?php echo $campaign['name']; ?>
												</div>
												<div class="col-lg-6 heading-right">
												<img src="<?php echo base_url() ?>images/price.png" alt=""> <?php echo $campaign['amount'] ?>
												</div>
											</div>
										</div>
									</div>
					

									<div class="row div-<?php echo $campaign['id']?>">
										<div class="col-lg-12">
											<div class="bottom-label <?php echo $i; ?>" id="<?php echo $campaign['id']; ?>" >
												<div class="row campaign-detail">
													
													<div class="col-lg-2" style="border-right:1px solid #E7E7E7;">
														<?php
														if($campaign['active'] == "true")
														{
															echo '<div class="campaign-percent" style="background:rgb(2, 131, 2);">'.$complete_percent.'%</div>';
														}
														else
														{
															echo '<div class="campaign-percent" style="background:rgb(172, 3, 3);">'.$complete_percent.'%</div>';
														}
														?>
														
													</div>
													<div class="col-lg-4" style="border-right:1px solid #E7E7E7;">
														<div><span style="font-family: Patua One;"><?php echo $campaign['num_of_product']; ?></span> Products</div>
														<div><span style="font-family: Patua One;"><?php echo $numberDays ?></span> Days Left</div>
														<div><span style="font-family: Patua One;"><?php echo $campaign['sell']; ?></span> Buyers</div>
													</div>
													<div class="col-lg-6">
														<?php echo $description; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									}//end else condition..

									$i++;

								}//end foreach loop..
							}
							//if there is no any campaign into database..
							else
							{
							?>
							<div class="row">
								<div class="col-lg-12 error-msg" style="margin-top:50px; text-align:center; font-size:30px;">
									There No any Campaign Into Database..!
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
								<div class="col-lg-4 right-heading">
									New Campaign
								</div>
								<!-- // end subject form heading -->
								<div class="col-lg-5">
									<div class="status-btn campaign-active-btn"></div>
									<div class="msg success-msg">
										<?php
										if( $this->session->userdata('insert_campaign') != "" )
										{
											echo "Successfully Added.";
										}
										else if( $this->session->userdata('update_campaign') != "" )
										{
											echo "Successfully Updated.";
										}
										?>
									</div>
									
								</div><!-- end success msg -->
								<!-- edit and close button -->
								<div class="col-lg-3 edit">
									<div class="current-campaign-id" style="display:none;"></div>
									<img src="<?php echo base_url()?>/images/view.png" alt="view-btn" class="view-btn" title="View Campaign">
									<img src="<?php echo base_url()?>/images/edit-icon.png" alt="" class="edit-btn" title="Edit Campaign">
									<img src="<?php echo base_url()?>/images/close.png" alt="" class="close-btn" title="Delete Campaign">
								</div>
								<!-- // end edit and close button -->

							</div><!-- // end row -->
						</div><!-- // end col-lg-12 -->
					</div><!-- // end row -->

					<div class="display-data-form">


					<?php echo form_open_multipart('managecampaign','id="campaign-form"');?>
					<div class="row">
						<div class="col-lg-6">
							<div>
								<div class="label-text">Campaign Name</div>
								<div><input type="text" class="form-control" id="name" name="name"></div>
							</div>
							<div style="margin-top:15px;">
								<div class="label-text">Campaign Subheading</div>
								<div><input type="text" class="form-control"  name="subheading"></div>
							</div>
							<div style="margin-top:15px;">
								<div class="label-text">Campaign Amount</div>
								<div><input type="text" class="form-control rupee-box rupee" id="amount" name="amount" ></div>
							</div>
							<div style="margin-top:15px;">
								<div class="label-text">Campaign End Date</div>
								<div>
									<div class="form-group">
			                            <div class='input-group date' id='datetimepicker2' data-date-format="DD/MM/YYYY">
			                                <input type='text' class="form-control campaign-date" name="end_date" id="enddate" />
			                                <span class="input-group-addon">
			                                    <span class="glyphicon glyphicon-calendar"></span>
			                                </span>
			                            </div>
			                        </div>
								</div>
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

							<div class="row">
								<div class="col-lg-12">
									<div class="label-text" style="margin-top:68px;">
										<div style="float:left; padding-right:14px;">Campaign Goes Unlimited</div>
										<div>
											<label>
												<input type="checkbox" class="checkbox" value="yes" name="running_status">
												<div class="checkbox-img"></div>
											</label>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12">
							<div class="label-text">
								Campaign Sub Description
							</div>
							<div>
								<input type="text" class="form-control" name="sub_desc">
							</div>														
						</div>
					</div>

					<div class="row" style="margin-top:10px;">
						<div class="col-lg-12">
							<div class="label-text">
								Campaign Description
							</div>
							<div>
								<textarea class="form-control" name="desc" id="desc" rows="4"></textarea>
							</div>														
						</div>
					</div>

					<div class="row" style="margin-top:15px;">
						<div class="col-lg-12">
							<div class="label-text">
								Campaign About
							</div>
							<div>
								<textarea  class="form-control" name="about" rows="4"></textarea>
							</div>														
						</div>
					</div>

					<div class="row" style="margin-top:15px;">
						<div class="col-lg-12">
							<div class="label-text">
								Campaign Update
							</div>
							<div>
								<textarea class="form-control" name="updates" rows="4"></textarea>
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

					

					

					</div><!-- end student-right-div -->
				
				</div>
			</div>
		
		</div>
	</div>
</div>

<script type="text/javascript">
	
var data = moment().format('MMM D, YYYY');
$('#datetimepicker2').datetimepicker({
    pickTime: false
});
$('#datetimepicker2').data("DateTimePicker").setMinDate(new Date(data));


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
			$("#uploaded-image").html('<img src="<?php echo base_url(); ?>images/campaign/default.jpg"  alt="Staff Image" class="img">');
			$("#default_image").val("");
		}

	});


	$(".display-data-form").on('click', '.cross', function(event) {
		$("#files").val("");
		$(".cross").hide();
		$("#uploaded-image").html('<img src="<?php echo base_url(); ?>images/campaign/default.jpg"  alt="Staff Image" class="img">');
		//this is for remove default logo image into update section..
		$("#default_image").val("");
	});


	$(".view-grid").on('click', '.bottom-label', function() {
		var campaign_id = $(this).attr('id');
		$(".bottom-label").removeClass('selected');
		$(this).addClass('selected');
		$(".current-campaign-id").text(campaign_id);
		$(".la-anim-10").addClass('la-animate');

		$.ajax({
			url: "<?php echo base_url();?>index.php/managecampaign/view_campaign",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {id:campaign_id},
			success: function(result){
				$(".display-data-form").html(result);
				$(".right-section-heading .right-heading").text('View Campaign');
				$(".edit-btn").show();
				$(".close-btn").show();
				$(".la-anim-10").removeClass('la-animate');
				// alert(result);

				var active_status = $('.campaign_active_status').text();
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

	$(".close-btn").click(function() {
		var campaign_id = $(".current-campaign-id").text();
		$(".la-anim-10").addClass('la-animate');
		// var confirm = confirm("Do you want to delet Campaign ?");
		if(confirm("Do you want to delet Campaign ?"))
		{
			$(".display-data-form").html("");
			$(".div-"+campaign_id).fadeOut(1000);

			$.ajax({
				url: "<?php echo base_url();?>index.php/managecampaign/delete_campaign",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {id:campaign_id},
				success: function(result){
				$(".display-data-form").html(result);
					$(".right-section-heading .right-heading").text('Add Campaign');
					$(".edit-btn").hide();
					$(".close-btn").hide();
					// alert(result);
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

	$(".edit-btn").click(function() {
		var campaign_id = $(".current-campaign-id").text();
		$(".la-anim-10").addClass('la-animate');
		$(".display-data-form").html("");
		
		$.ajax({
			url: "<?php echo base_url();?>index.php/managecampaign/edit_campaign",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {id:campaign_id},
			success: function(result){
				$(".display-data-form").html(result);
				$(".right-section-heading .right-heading").text('Update Campaign');
				$(".edit-btn").hide();
				$(".close-btn").hide();
				// alert(result);
				$(".view-btn").hide();
				$(".la-anim-10").removeClass('la-animate');
			}
		});
		
	});


	$('.search-bar').on('keyup', '.campaign-name', function(event) {
		var campaign_name = $(this).val()
		var campaign_amount = $(".campaign-amount").val();
		$(".la-anim-10").addClass('la-animate');
		$.ajax({
			url: "<?php echo base_url();?>index.php/managecampaign/search_campaign",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {campaign_name : campaign_name, campaign_amount : campaign_amount},
			success: function(result){
			$(".view-grid").html(result);
			$(".la-anim-10").removeClass('la-animate');
			}
		});
	});

	$('.search-bar').on('keyup', '.campaign-amount', function(event) {
		var campaign_name = $(".campaign-name").val();
		var campaign_amount = $(this).val();
		$(".la-anim-10").addClass('la-animate');
		$.ajax({
			url: "<?php echo base_url();?>index.php/managecampaign/search_campaign",
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {campaign_name : campaign_name, campaign_amount : campaign_amount},
			success: function(result){
			$(".view-grid").html(result);
			$(".la-anim-10").removeClass('la-animate');
			}
		});
	});

	// script for percent box, rupee-box, course-fee-value..
	$(".campaign").on('keypress','.rupee',function(e){
	
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
	$(".campaign").on('keyup','.rupee',function(e){

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


	$('.campaign').on('click', '.form-submit-btn', function() {
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

		if($("#enddate").val() != "")
		{
			var flag_date = 1;
		}
		else
		{
			var flag_date = 0;
			$("#enddate").parent().addClass('has-error');
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

		if(flag_name == 1 && flag_amount == 1 && flag_date == 1 && flag_desc == 1)
		{
			$(".la-anim-10").addClass('la-animate');
			$("#campaign-form").submit();
			$(".submit-btn").removeClass('form-submit-btn')
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

	$(".campaign").on('click', '.cancel-btn', function(event) {
		$("#campaign-form")[0].reset();
	});


	$(".campaign").on('focusin', '#name', function(event) {
		$("#name").parent().removeClass('has-error');
	});
	$(".campaign").on('focusin', '#amount', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".campaign").on('focus', '#enddate', function(event) {
		$(this).parent().removeClass('has-error');
	});
	$(".campaign").on('focus', '#desc', function(event) {
		$(this).parent().removeClass('has-error');
	});


	$(".campaign").on('click', '.inactive-btn', function(event) {
		var campaign_id = $(".current-campaign-id").text();
		$(".la-anim-10").addClass('la-animate');
		if(confirm("Do you want to Active this Campaign ?"))
		{
			$.ajax({
				url: "<?php echo base_url();?>index.php/managecampaign/active_campaign",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (<O></O>ther values: xml, json, script, or html)',
				data: {campaign_id : campaign_id},
				success: function(result){
					$(".success-msg").text("");
					$(".status-btn").text('Active');
					$(".status-btn").removeClass('inactive-btn')
					$(".status-btn").addClass('active-btn');
					$(".selected .campaign-percent").css({
						backgroundColor: 'rgb(2, 131, 2)'
					});
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
	
	$(".campaign").on('click', '.active-btn', function(event) {
		var campaign_id = $(".current-campaign-id").text();
		$(".la-anim-10").addClass('la-animate');
		if(confirm("Do you want to Inactive this Campaign ?"))
		{
			$.ajax({
				url: "<?php echo base_url();?>index.php/managecampaign/inactive_campaign",
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {campaign_id : campaign_id},
				success: function(result){
					$(".success-msg").text("");
					$(".status-btn").text('Inactive');
					$(".status-btn").removeClass('active-btn')
					$(".status-btn").addClass('inactive-btn');
					$(".selected .campaign-percent").css({
						backgroundColor: 'rgb(172, 3, 3)'
					});
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

	$(".campaign").on('click', '.view-btn', function() {
		var campaign_code = $(".campaign_code_hidden").text();
		window.open('<?php echo base_url(); ?>campaign/c/'+campaign_code,'_blank');
	});


	<?php
	//execute after Course is successfully Added and show success msg.
  	// 
	if( $this->session->userdata('insert_campaign') )
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
  	if( $this->session->userdata('update_campaign') )
	{
	?>
		var id = "<?php echo $this->session->userdata('update_campaign') ?>";
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
$this->session->unset_userdata('update_campaign');
$this->session->unset_userdata('insert_campaign');
?>