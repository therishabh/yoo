
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="top-footer">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-centered">
						<div class="row">
							<!-- <div class="col-lg-3 col-md-3 col-sm-6">
								<div class="campaign-heading">Yoo</div>
								<div class="campaign"><a href="#">hello 123</a></div>
								<div class="campaign"><a href="#">hello 456</a></div>
								<div class="campaign"><a href="#">hello 789</a></div>
								<div class="campaign"><a href="#">hello 101</a></div>
								<div class="campaign"><a href="#">hello 121</a></div>
							</div> -->
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="campaign-heading">RECENT CAMPAIGN</div>
								<?php 
								if($campaign_detail)
								{

									$i = 1;
									foreach($campaign_detail as $campaign)
									{
										// count left days
										$current_date = date('Y/m/d');
										$end_date_array = explode('/',$campaign['end_date']);
										$end_date = $end_date_array[2]."/".$end_date_array[1]."/".$end_date_array[0];

										$currenttime = strtotime($current_date);
										$endtime = strtotime($end_date);

										//count complete status..
										$complete_percent = ($campaign['complete_amount'] / $campaign['amount']) * 100;
										$complete_percent = floor($complete_percent);
										if($i< 6)
										{
											//execute if campaign is completed..
											//campaign fund percentage is 100 or more than 100..
											//then display in blur mode..
											if($complete_percent >= 100 )
											{
												
												//check if there is check on running unlimited..!
												//then display campaing in blur mode
												if($campaign['running_status'] == 'yes')
												{
													$i++;
													?>
													<div class="campaign"><a href="<?php echo base_url()?>campaign/c/<?php echo $campaign['code']?>"><?php echo $campaign['name']?></a></div>
													<?php
												}//end if condition if($campaign['running_status'] == 'yes')
											}
											//execute is campaign is not completed..
											else
											{
												//execute if campaign is expaired...
												if($endtime < $currenttime )
												{
													$i++;
													?>
													<div class="campaign"><a href="<?php echo base_url()?>campaign/c/<?php echo $campaign['code']?>"><?php echo $campaign['name']?></a></div>
													<?php
												}
												else
												{
													$i++;
													?>
													<div class="campaign"><a href="<?php echo base_url()?>campaign/c/<?php echo $campaign['code']?>"><?php echo $campaign['name']?></a></div>
													<?php
												}
											}//end else condition //execute is campaign is not completed..			
										}//end if condition.. ($i <= 6)
									}
								}
								else
								{
								?>
									<div class="campaign">There is no any Campaign</div>
								<?php
								}
								?>
								
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="campaign-heading">TOP SELLING PRODUCTS</div>

								<?php 
								if($product_detail)
								{
									$a = 1;
									foreach($product_detail as $product)
									{
										if($a<6)
										{
											$campaign_id = $product['campaign'];
											$campaign = $this->model->fetchbyid($campaign_id,'campaign');

											if($campaign['active'] == "true")
											{

												// count left days
												$current_date = date('Y/m/d');
												$end_date_array = explode('/',$campaign['end_date']);
												$end_date = $end_date_array[2]."/".$end_date_array[1]."/".$end_date_array[0];

												$currenttime = strtotime($current_date);
												$endtime = strtotime($end_date);

												//count complete status..
												$complete_percent = ($campaign['complete_amount'] / $campaign['amount']) * 100;
												$complete_percent = floor($complete_percent);
												
													
												//execute if campaign is completed..
												//campaign fund percentage is 100 or more than 100..
												//then display in blur mode..
												if($complete_percent >= 100 )
												{
													
													//check if there is check on running unlimited..!
													//then display campaing in blur mode
													if($campaign['running_status'] == 'yes')
													{
														$a++;
														?>
														<div class="campaign"><a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>"><?php echo $product['name']?></a></div>
														<?php
													}//end if condition if($campaign['running_status'] == 'yes')
												}
												//execute is campaign is not completed..
												else
												{
													//execute if campaign is expaired...
													if($endtime < $currenttime )
													{
														$a++;
														?>
															<div class="campaign"><a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>"><?php echo $product['name']?></a></div>
														<?php
													}
													else
													{
														$a++;
														?>
															<div class="campaign"><a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>"><?php echo $product['name']?></a></div>
																	
														<?php
													}
												}//end else condition //execute is campaign is not completed..
												
											}
											

										}
									}
								}
								else
								{
								?>
									<div class="campaign">There is no any Product</div>
								<?php
								}
								?>
								
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="footer-img">
									<div style="background:gray;"></div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="contact">CONTACT</div>
								<div class="contact-desc">1234 Street
									<br>Lorem Ipsum, CA 91919
								</div>
								<div class="contact-desc">
									Phone: +1 123 123-123-123
								<br>	Fax: +1 123-123-123
								</div>
								<div class="contact-desc">
									E-mail: email@email.by
									<br>
									Website: www.example.com
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="middle-footer">
				<div class="row">
					<div class="col-lg-9 col-md-10 col-centered">
						<div class="heading">Patners</div>
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 images"><img src="<?php echo base_url() ?>/images/patners/1.jpg" alt=""> </div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 images"><img src="<?php echo base_url() ?>/images/patners/2.jpg" alt=""> </div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 images"><img src="<?php echo base_url() ?>/images/patners/3.jpg" alt=""> </div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 images"><img src="<?php echo base_url() ?>/images/patners/4.jpg" alt=""> </div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 images"><img src="<?php echo base_url() ?>/images/patners/5.jpg" alt=""> </div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 images"><img src="<?php echo base_url() ?>/images/patners/6.jpg" alt=""> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-footer">
				<div class="row">
					<div class="col-lg-9 col-md-10 col-centered">
						<div class="row">
							<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12 footer-menu">
								<span><a href="<?php echo base_url(); ?>">Home</a></span>
								<span><a href="<?php echo base_url(); ?>yoo">How's Yoo works ?</a></span>
								<span><a href="<?php echo base_url(); ?>yoo/aboutus">About Us</a></span>
								<span><a href="<?php echo base_url(); ?>yoo/terms">Terms & Conditions</a></span>
								<span><a href="<?php echo base_url(); ?>yoo/refundpolicy">Refund Policy</a></span>
								<span><a href="<?php echo base_url(); ?>yoo/contactus">Contact Us</a></span>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 social-icon">
								<a href="#"><img src="<?php echo base_url(); ?>images/icon_header_face.png" alt=""></a>
								<a href="#"><img src="<?php echo base_url(); ?>images/icon_footer_tw.png" alt=""></a>
								<a href="#"><img src="<?php echo base_url(); ?>images/youtube-icon.png" alt=""></a>
								<a href="#"><img src="<?php echo base_url(); ?>images/instagram_icon.png" alt=""></a>
								<a href="#"><img src="<?php echo base_url(); ?>images/icon_footer_g.png" alt=""></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9 col-md-10 col-centered">
						<div class="copyright">
							&copy; 2014 YOO Copy Rights Reserved. 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<div id="preloader">
	<div id="status">&nbsp;</div>
</div>

<script type="text/javascript">

	$(window).load(function() { // makes sure the whole site is loaded
			$('#status').fadeOut(); // will first fade out the loading animation
			$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			$('body').delay(350).css({'overflow':'visible'});
		})

</script>
  
</body>
</html>

<script>
jQuery(document).ready(function($) {
	
	var pull= $('#pull');
	var	menu = $('nav ul');

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	$(window).scroll(function(){
		var width = $( window ).width();
		// var height = $( window ).height();
		if( width > 1024 )
		{
		    if ($(window).scrollTop() >= 43) {
		       $('.header').addClass('fixed');
		    }
		    else {
		       $('.header').removeClass('fixed');
		    }
			
		}
	});
	
});
</script>