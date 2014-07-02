<!-- start product section -->
	<div class="row product-section">
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
			//count complete status..
			if($campaign_view['active'] == "true")
			{
				if($product_view['active'] == "true")
				{
					$complete_percent = ($campaign_view['complete_amount'] / $campaign_view['amount']) * 100;
					$complete_percent = floor($complete_percent);


					// count left days
					$current_date = date('Y/m/d');
					$end_date_array = explode('/',$campaign_view['end_date']);
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
					?>
					<div class="row campaign camp-view">
						<div class="col-lg-9 col-md-10 col-sm-10 col-xs-10 col-centered">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
									<div class="heading">
										<div class="heading-title">
											<span class="no-bar"><?php echo $product_view['name']; ?></span>
										</div>
									</div>
								</div>
								<!-- campaign image and details -->
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									
									<div class="campaign-image">
										<img src="<?php echo base_url() ?>images/product/<?php echo $product_view['image']; ?>" alt="Product Name">
									</div>
									<div class="tabs">

										<!-- Nav tabs -->
										<ul class="nav nav-tabs" id="myTab">
										  <li class="active"><a href="#disctiption" id="tabs" data-toggle="tab">DESCRIPTION</a></li>
										  <li><a href="#details" id="tabs" data-toggle="tab">ABOUT THE OFFER</a></li>
										</ul>

										<div class="tab-content">
										  <div class="tab-pane active" id="disctiption">
										  	<?php echo $product_view['description']?>
										  </div>
										  <div class="tab-pane" id="details">
										  	<?php echo $product_view['about_the_offer'];?>
										  </div>
										</div>

									</div>
									
									<?php
									if($product_view['date_display'] == "1")
									{
									?>
									<div class="launch-date">
										Launched : <?php echo date('M j, Y',strtotime($product_view['date'])); ?>
									</div>
									<?php
									} 
									 ?>
								</div>
								<!-- // end campaign image and details -->
								
								<!-- campaign description -->
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 camp-desc">
									<div class="camp-des">
										

										<div class="row camp-right">
											<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 price-img">
											</div>
											<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 price-value">
												<div class="product-number"><?php echo $this->model->IND_money_format($product_view['amount']);?></div>
												<div class="product">Cost</div>
											</div>
										</div>
										<hr  style="width:80%; margin-left:30px;">
										
										<div class="row camp-right">
											<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 time-img">
											</div>
											<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 time-value">
												<div class="product-number"><?php echo $product_view['delivery']; ?></div>
												<div class="product">delivery time</div>
											</div>
										</div>
										<hr  style="width:80%; margin-left:30px;">

										<div class="row camp-right">
											<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 days-img">
											</div>
											<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 days-value">
												<?php 
												if($numberDays == 0)
												{
													if($current_date == $end_date)
													{
														?>
														<div class="product-number"><?php echo $numberDays; ?> Days</div>
														<div class="product">left to expire</div>
														<?php
													}
													else
													{
														?>
														<div class="expire"  style="font-size:19px;">Product Has Been Expired !</div>
														<?php
													}
													
												}
												else
												{
													?>
													<div class="product-number"><?php echo $numberDays; ?> Days</div>
													<div class="product">left to expire</div>
													<?php
												}
												 ?>
											</div>
										</div>

										<hr style="width:80%; margin-left:30px;">

										<div class="row camp-right" style="margin-bottom:30px;">
											<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 people-img">
											</div>
											<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 people-value">
												<div class="product-number"><?php echo $product_view['sell']; ?></div>
												<div class="product">buyers have purchaged</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-10 col-centered">
												<a href="#">
												<div class="buy-div">
													<div class="under">
														<div>BUY</div>
														<div>and support the<br>Campaign</div>
													</div>
												</div>
												</a>
											</div>
										</div>
										
										
									</div>

								</div>
								<!-- campaign description -->
							</div>
							
						</div>
					</div>
					
				<?php
				}// end if($product_view['active'] == "true")
				else
				{
					 redirect('/product/', 'refresh');
				}
			}// end if($campaign_view['active'] == "true")
			else
			{
				 redirect('/product/', 'refresh');
			}

			?>

		</div>
	</div>