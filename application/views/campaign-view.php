<!-- start product section -->
	<div class="row">
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
			if($campaign_view['active'] == "true")
			{

				//count complete status..
				$complete_percent = ($campaign_view['complete_amount'] / $campaign_view['amount']) * 100;
				$complete_percent = floor($complete_percent);
				if($complete_percent > 100)
				{
					$complete_percent = 100;
				}

				// count left days
				$current_date = date('Y/m/d');
				$end_date_array = explode('/',$campaign_view['end_date']);
				$end_date = $end_date_array[2]."/".$end_date_array[1]."/".$end_date_array[0];

				$start_date_array = explode('/',$campaign_view['start_date']);
				$start_date = $start_date_array[2]."/".$start_date_array[1]."/".$start_date_array[0];

				$startTimeStamp = strtotime($current_date);
				$endTimeStamp = strtotime($end_date);
				 
				$timeDiff = $endTimeStamp - $startTimeStamp;

				$numberDays = $timeDiff/86400;  // 86400 seconds in one day

				// and you might want to convert to integer
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
										<span class="no-bar"><?php echo $campaign_view['name']; ?></span>
									</div>
								</div>
							</div>
							<!-- campaign image and details -->
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								
								<div class="campaign-image">
									<img src="<?php echo base_url()?>images/campaign/<?php echo $campaign_view['image']?>" alt="">
								</div>
								<div class="tabs">

									<!-- Nav tabs -->
									<ul class="nav nav-tabs" id="myTab">
									  <li class="active"><a href="#disctiption" id="tabs" data-toggle="tab">DESCRIPTION</a></li>
									  <li><a href="#details" id="tabs" data-toggle="tab">DETAILS</a></li>
									  <li><a href="#update" id="tabs" data-toggle="tab">UPDATES</a></li>
									</ul>

									<div class="tab-content">
									  <div class="tab-pane active" id="disctiption">
									  	<?php echo $campaign_view['description']?>
									  </div>
									  <div class="tab-pane" id="details">
									  	<?php echo $campaign_view['about']?>
									  </div>
									  <div class="tab-pane" id="update">
									  	<?php echo $campaign_view['updates']?>
									  </div>
									</div>

								</div>
								<div class="launch-date">
									Launched : <?php echo date('M j, Y',strtotime($start_date)); ?>
								</div>
							</div>
							<!-- // end campaign image and details -->
							
							<!-- campaign desctiption -->
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 camp-desc">
								<div class="camp-des">

									<div class="row camp-right">
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 price-img">
										</div>
										<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 price-value">
											<div class="product-number"><?php echo $this->model->IND_money_format($campaign_view['amount']); ?></div>
											<div class="product">funding needed</div>
										</div>
									</div>
									<hr  style="width:80%; margin-left:30px;">

									<div class="row camp-right">
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 percent-img">
										</div>
										<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 percent-value">
											<div class="product-number"><?php echo $complete_percent; ?> %</div>
											<div class="product">collected</div>
										</div>
									</div>
									<hr  style="width:80%; margin-left:30px;">

									<div class="row camp-right">
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 product-img">
										</div>
										<a href="<?php echo base_url()?>product/c/<?php echo $campaign_view['code']?>">
											<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 product-value">
												<div class="product-number"><?php echo $campaign_view['num_of_product']; ?></div>
												<div class="product">products & services</div>
											</div>
										</a>
									</div>
									<hr  style="width:80%; margin-left:30px;">

									<div class="row camp-right" style="margin-bottom:30px;">
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 days-img">
										</div>
										<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 days-value">
											<?php 
											if($numberDays == 0)
											{
												if($current_date == $end_date)
												{
													?>
													<div class="product-number"><?php echo $numberDays; ?> days</div>
													<div class="product">time remaining</div>
													<?php
												}
												else
												{
													?>
													<div class="expire" style="font-size:16px;">Campaign Has Been Expired !</div>
													<?php
												}
												
											}
											else
											{
												?>
												<div class="product-number"><?php echo $numberDays; ?> days</div>
												<div class="product">remaining</div>
												<?php
											}
											?>
											
										</div>
									</div>

									<div class="row">
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-10 col-centered">
											<a href="<?php echo base_url()?>product/c/<?php echo $campaign_view['code']?>">
											<div class="buy-div">
												<div class="under-camp">
													<div>View all products & services<br>under this campaign</div>
												</div>
											</div>
											</a>
										</div>
									</div>

								</div>

							</div>
							<!-- campaign desctiption -->
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<!-- start product section -->
		<div class="row product-section">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="row campaign">
					<div class="col-lg-9 col-centered">
						<div class="heading">
							<div class="heading-title">
								<span class="no-bar">Products & Services</span>
							</div>
							<div class="subheading"><?php echo  $campaign_view['name']; ?></div>
						</div>
					</div>
				</div>
				<div class="row campaign">
					<div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 col-centered">
						
						
						<div class="row">
							
						<?php 

						if($campaign_product)
						{
							foreach($campaign_product as $product) 
							{
								$a = 1;
								//only display 6 campaign..
								if( $a <= 6 )
								{
									$campaign_id = $campaign_view['id'];
									$campaign = $this->model->fetchbyid($campaign_id,'campaign');
									
									//execute if product's campaign is not deleted.. 
									//that means status is 1..
									if($campaign)
									{
										$description = $product['sub_desc'];
										
										// count left days
										$current_date = date('Y/m/d');
										$end_date_array = explode('/',$campaign['end_date']);
										$end_date = $end_date_array[2]."/".$end_date_array[1]."/".$end_date_array[0];

										$startTimeStamp = strtotime($current_date);
										$endTimeStamp = strtotime($end_date);
										 
										//count complete status..
										$complete_percent = ($campaign['complete_amount'] / $campaign['amount']) * 100;
										$complete_percent = floor($complete_percent);


										//execute if campaign is completed..
										//then display in blur mode..
										if($complete_percent >= 100 )
										{
											//check if there is check on running unlimited..!
											//then display campaing in blur mode
											if($campaign['running_status'] == 'yes')
											{
											?>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display blur">
												<div class="row">
													<div class="col-lg-10 col-md-10 col-sm-10 col-centered campaign-box">
														<div class="row">
															<a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>" style="color:#000;">
															<div class="col-lg-12 col-md-12 campaign-name"><?php echo $product['name']?></div>
															</a>
														</div>
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 money-goes-to">
																<span>Money Goes To :</span> <a href="<?php echo base_url() ?>campaign/c/<?php echo $campaign['code'];?>"><?php echo $campaign['name'];?></a>
															</div>
														</div>
														<a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>">
															<div class="row">
																<div class="col-lg-12 campaign-image">
																	<img src="<?php echo base_url();?>images/product/thumbnail/<?php echo $product['image']?>" alt="">
																</div>
															</div>
														</a>
														<div class="row camp-p-d">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 campaign-desc"><?php echo $description;?></div>
														</div>
														
														<div class="row camp-p-p-t">
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-price product-price" style="padding-top:11px;">
																<img src="<?php echo base_url(); ?>images/rupee.png" alt=""> <?php echo $this->model->IND_money_format($product['amount']);?>
															</div>
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-product">
																<div style="font-size:19px; font-weight:bold;"><?php echo $product['sell']?></div>
																<div style="font-size:12px;">Buyers</div>
															</div>
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-time">
																<div style="font-weight:bold;"><?php echo $numberDays;?></div>
																<div style="font-size:12px;">days left</div>
															</div>
															
														</div>
													</div>
												</div>
											</div><!-- // end folder display and col-lg-4 -->
											<?php
											}//end if condition if($campaign['running_status'] == 'yes')
										}//end if condition (if($complete_percent >= 100 ))
										//execute is campaign is not completed..
										else
										{
											//execute if campaign is expaired...
											if($endTimeStamp < $startTimeStamp )
											{
												?>
												<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display blur">
													<div class="row">
														<div class="col-lg-10 col-md-10 col-sm-10 col-centered campaign-box">
															<div class="row">
																<a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>" style="color:#000;">
																<div class="col-lg-12 col-md-12 campaign-name"><?php echo $product['name']?></div>
																</a>
															</div>
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 money-goes-to">
																	<span>Money Goes To :</span> <a href="<?php echo base_url() ?>campaign/c/<?php echo $campaign['code'];?>"><?php echo $campaign['name'];?></a>
																</div>
															</div>
															<a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>">
																<div class="row">
																	<div class="col-lg-12 campaign-image">
																		<img src="<?php echo base_url();?>images/product/thumbnail/<?php echo $product['image']?>" alt="">
																	</div>
																</div>
															</a>
															<div class="row camp-p-d">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 campaign-desc"><?php echo $description;?></div>
															</div>
															
															<div class="row camp-p-p-t">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-price product-price" style="padding-top:11px;">
																	<img src="<?php echo base_url(); ?>images/rupee.png" alt=""> <?php echo  $this->model->IND_money_format($product['amount']);?>
																</div>
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-product">
																	<div style="font-size:19px; font-weight:bold;"><?php echo $product['sell']?></div>
																	<div style="font-size:12px;">Buyers</div>
																</div>
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-time">
																	<div style="font-weight:bold;"><?php echo $numberDays;?></div>
																	<div style="font-size:12px;">days left</div>
																</div>
																
															</div>
														</div>
													</div>
												</div><!-- // end folder display and col-lg-4 -->
												<?php
												
											}//end if condition if($endTimeStamp < $startTimeStamp )
											else
											{
												?>
												<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display">
													<div class="row">
														<div class="col-lg-10 col-md-10 col-sm-10 col-centered campaign-box">
															<div class="row">
																<a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>" style="color:#000;">
																<div class="col-lg-12 col-md-12 campaign-name"><?php echo $product['name']?></div>
																</a>
															</div>
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 money-goes-to">
																	<span>Money Goes To :</span> <a href="<?php echo base_url() ?>campaign/c/<?php echo $campaign['code'];?>"><?php echo $campaign['name'];?></a>
																</div>
															</div>
															<a href="<?php echo base_url()?>product/p/<?php echo $product['code']?>">
																<div class="row">
																	<div class="col-lg-12 campaign-image">
																		<img src="<?php echo base_url();?>images/product/thumbnail/<?php echo $product['image']?>" alt="">
																	</div>
																</div>
															</a>
															<div class="row camp-p-d">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 campaign-desc"><?php echo $description;?></div>
															</div>
															<div class="row camp-p-p-t">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-price product-price" style="padding-top:11px;">
																	<img src="<?php echo base_url(); ?>images/rupee.png" alt=""> <?php echo $this->model->IND_money_format($product['amount']);?>
																</div>
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-product">
																	<div style="font-size:19px; font-weight:bold;"><?php echo $product['sell']?></div>
																	<div style="font-size:12px;">Buyers</div>
																</div>
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-time">
																	<div style="font-weight:bold;"><?php echo $numberDays;?></div>
																	<div style="font-size:12px;">days left</div>
																</div>
																
															</div>
														</div>
													</div>
												</div><!-- // end folder display and col-lg-4 -->
												<?php
											}//end else condition..
										}//end else condition //execute is campaign is not completed.
									}//end if condition for campaign is exist into database (status = 1)
								?>

								<?php
								}//end if condition (a <= 6)
								$a++;
							}//end foreach loop
						}
						//execute if there is no any product into database.. 
						else
						{
						?>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered error-msg-display">
								There is no any Product Into Database..!
							</div>
						<?php
						}

						?>
							
							

							
							
						</div><!-- //end row. -->

						<?php
						//execute if there is more than 6 campaign..
						if(isset($a))
						{
							if($a >= 7)
							{
							?>
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-6 col-xs-8 col-lg-offset-10 col-md-offset-9 col-sm-offset-3 col-xs-offset-2">
									<a href="product.php"><div class="view-more">view more</div></a>
								</div>
							</div>
							
							<?php	
							}
						}
						?>
						

					</div><!--  // end col-centered-->
				</div><!-- // end product div -->
			<?php
			}
			else
			{
				 redirect('/campaign/', 'refresh');
			}
			?>

		</div>
	</div>
	<!-- // end product section -->

