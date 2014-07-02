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

			<div class="row campaign campaign-start">
				<div class="col-lg-9 col-centered">
					<div class="heading">
						<div class="heading-title">
							<span class="no-bar">Product & Services</span>
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
								$campaign_id = $product['campaign'];
								$campaign = $this->model->fetchbyid($campaign_id,'campaign');
								
								//execute if product's campaign is not deleted.. 
								//that means status is 1..
								if($campaign)
								{
									if($campaign['active'] == 'true')
									{

									
										$description = $product['sub_desc'];
										
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
										
									}


									
								}//end if condition for campaign is exist into database (status = 1)
								
								
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
				</div><!--  // end col-centered-->
			</div><!-- // end product div -->
		</div>
	</div>
	<!-- // end product section -->