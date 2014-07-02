

	<!-- slider or image and quotes -->
	<div class="row">
		<div class="col-lg-12 slider">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 col-centered slider-center">
					<div class="main-heading">Crowdfunding for Everyone!</div>
					<div class="heading-2"><span class="hph2">The World’s #1 Personal Fundraising Websites.</span></div>
				</div>
			</div>
		</div>
	</div>
	<!-- // end slider or image and quotes -->

	<!-- ABOUT -->
	<div class="row">
		<div class="col-lg-12">
			<div class="row about">
				<div class="col-lg-9 col-centered">
					<div class="heading">
						<div class="heading-title">
							<span class="no-bar">About</span>
						</div>
					</div>
					<div class="about-desc">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate egestas sem, eu cursus ligula ullamcorper non. Curabitur tristique velit eu mauris venenatis egestas. Phasellus bibendum placerat metus, sed molestie magna semper eget. Sed sit amet dui felis, tempus porttitor justo.
					</div>
					<div class="row folder-display">
						<div class="col-lg-4 col-sm-4 col-xs-12">
							<div class="about-box">
								<div class="folder">
									<div class="folder-1"></div>
									<div class="folder-curve"></div>

								</div>
								<div class="folder">
									<div class="step">Step 1 :</div>
								</div>
								<div class="folder">
									<div class="step-desc">Chose a Project</div>
								</div>
							</div>
							<div class="about-curve"></div>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-12">
							<div class="about-box">
								<div class="folder">
									<div class="folder-2"></div>
									<div class="folder-curve"></div>

								</div>
								<div class="folder">
									<div class="step">Step 2 :</div>
								</div>
								<div class="folder">
									<div class="step-desc">Back a Project</div>
								</div>
							</div>
							<div class="about-curve"></div>

						</div>
						<div class="col-lg-4 col-sm-4 col-xs-12">
							<div class="about-box">
								<div class="folder">
									<div class="folder-3"></div>
									<div class="folder-curve"></div>
								</div>
								<div class="folder">
									<div class="step">Step 3 :</div>
								</div>
								<div class="folder">
									<div class="step-desc">Receive a gift</div>
								</div>
							</div>
							<div class="about-curve"></div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // end about -->
	
	<!-- start campaign section -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">

			<div class="row campaign campaign-start">
				<div class="col-lg-9 col-centered">
					<div class="heading">
						<div class="heading-title">
							<span class="no-bar">Campaigns</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row campaign">
				<div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 col-centered">
					
					
					<div class="row">

					<?php
					$i = 0;
					//execute if there is any campaign into database..
					if($campaign_detail)
					{
						foreach($campaign_detail as $campaign) 
						{

							//only display 6 campaign..
							if( $i < 6 )
							{
								$description = $campaign['sub_desc'];
								
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
								$campaign_name = character_limiter($campaign['name'],27);

								


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
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display blur" id="<?php echo $i;?>">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-centered campaign-box">
													<div class="row">
														<a href="<?php echo base_url();?>campaign/c/<?php echo $campaign['code'];?>" style="color:#000">
														<div class="col-lg-12 col-md-12 campaign-name" title="<?php echo $campaign['name']?>"><?php echo $campaign_name?></div>
														</a>
													</div>
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 campaign-subname" title="<?php echo $campaign['subheading']; ?>"><?php echo character_limiter($campaign['subheading'],33); ?></div>
													</div>
													<a href="<?php echo base_url();?>campaign/c/<?php echo $campaign['code'];?>">
														<div class="row">
															<div class="col-lg-12 campaign-image">
																<img src="<?php echo base_url();?>images/campaign/thumbnail/<?php echo $campaign['image']; ?>" alt="">
															</div>
														</div>
													</a>
													<div class="row camp-p-d">
														<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 campaign-percent">
															<div class="percent-camp"><?php echo $complete_percent;?>%</div>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 campaign-desc"><?php echo $description;?></div>
													</div>
													<div class="row camp-p-p-t">
														<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 campaign-price">
															<img src="<?php echo base_url();?>images/rupee.png" alt=""> <?php echo $this->model->IND_money_format($campaign['amount']);?>
															<div class="campaign-voda">funding needed</div>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-product">
															<a href="<?php echo base_url()?>product/c/<?php echo $campaign['code']?>" style="color:#000;">
																<div style="font-size:19px;font-weight:bold;"><?php echo $campaign['num_of_product']?></div>
																<div class="campaign-voda">products & services</div>
															</a>
														</div>
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 campaign-time">
															<div style="font-weight:bold;"><?php echo $numberDays;?></div>
															<div class="campaign-voda">days left</div>
														</div>
													</div>
												</div>
											</div>
										</div><!-- // end folder display and col-lg-4 -->
									<?php
									}//end if condition if($campaign['running_status'] == 'yes')
								}
								//execute is campaign is not completed..
								else
								{
									//execute if campaign is expaired...
									if($endTimeStamp < $startTimeStamp )
									{
										$i++;
										?>
										
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display blur" id="<?php echo $i;?>">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-centered campaign-box">
													<div class="row">
														<a href="<?php echo base_url();?>campaign/c/<?php echo $campaign['code'];?>" style="color:#000">
														<div class="col-lg-12 col-md-12 campaign-name" title="<?php echo $campaign['name']?>"><?php echo $campaign_name; ?></div>
														</a>
													</div>
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 campaign-subname" title="<?php echo $campaign['subheading']; ?>"><?php echo character_limiter($campaign['subheading'],33); ?></div>
													</div>
													<a href="<?php echo base_url();?>campaign/c/<?php echo $campaign['code'];?>">
														<div class="row">
															<div class="col-lg-12 campaign-image">
																<img src="<?php echo base_url();?>images/campaign/thumbnail/<?php echo $campaign['image']; ?>" alt="">
															</div>
														</div>
													</a>
													<div class="row camp-p-d">
														<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 campaign-percent">
															<div class="percent-camp"><?php echo $complete_percent;?>%</div>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 campaign-desc"><?php echo $description;?></div>
													</div>
													<div class="row camp-p-p-t">
														<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 campaign-price">
															<img src="<?php echo base_url();?>images/rupee.png" alt=""> <?php echo $this->model->IND_money_format($campaign['amount']);?>
															<div class="campaign-voda">funding needed</div>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-product">
															<a href="<?php echo base_url()?>product/c/<?php echo $campaign['code']?>" style="color:#000;">
																<div style="font-size:19px;font-weight:bold;"><?php echo $campaign['num_of_product']?></div>
																<div class="campaign-voda">products & services</div>
															</a>
														</div>
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 campaign-time">
															<div style="font-weight:bold;"><?php echo $numberDays;?></div>
															<div class="campaign-voda">days left</div>
														</div>
													</div>
												</div>
											</div>
										</div><!-- // end folder display and col-lg-4 -->
										<?php
									}
									else
									{
										$i++;
									?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display" id="<?php echo $i;?>">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-centered campaign-box">
													<div class="row">
														<a href="<?php echo base_url();?>campaign/c/<?php echo $campaign['code'];?>" style="color:#000">
														<div class="col-lg-12 col-md-12 campaign-name" title="<?php echo $campaign['name']?>"><?php echo $campaign_name; ?></div>
														</a>
													</div>
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 campaign-subname" title="<?php echo $campaign['subheading']; ?>"><?php echo character_limiter($campaign['subheading'],33); ?></div>
													</div>
													<a href="<?php echo base_url();?>campaign/c/<?php echo $campaign['code'];?>">
														<div class="row">
															<div class="col-lg-12 campaign-image">
																<img src="<?php echo base_url();?>images/campaign/thumbnail/<?php echo $campaign['image']; ?>" alt="">
															</div>
														</div>
													</a>
													<div class="row camp-p-d">
														<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 campaign-percent">
															<div class="percent-camp"><?php echo $complete_percent;?>%</div>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 campaign-desc"><?php echo $description;?></div>
													</div>
													<div class="row camp-p-p-t">
														<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 campaign-price">
															<img src="<?php echo base_url();?>images/rupee.png" alt=""> <?php echo $this->model->IND_money_format($campaign['amount']);?>
															<div class="campaign-voda">funding needed</div>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 campaign-product">
															<a href="<?php echo base_url()?>product/c/<?php echo $campaign['code']?>" style="color:#000;">
																<div style="font-size:19px;font-weight:bold;"><?php echo $campaign['num_of_product']?></div>
																<div class="campaign-voda">products & services</div>
															</a>
														</div>
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 campaign-time">
															<div style="font-weight:bold;"><?php echo $numberDays;?></div>
															<div class="campaign-voda">days left</div>
														</div>
													</div>
												</div>
											</div>
										</div><!-- // end folder display and col-lg-4 -->
									<?php
									}
								}//end else condition //execute is campaign is not completed..			
							}//end if condition.. ($i <= 6)
							
						}//end foreach loop..
					}
					//execute if there is no any campaign into database then display error msg....
					else
					{
					?>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-centered error-msg-display">
							There is no any Campaign Into Database..!
						</div>
					<?php
					}

					?>
						


					</div><!-- //end row. -->
					
					<?php
					//execute if there is more than 6 campaign..
					if(isset($i))
					{
						if($i >= 6)
						{
						?>
						<div class="row">
							<div class="col-lg-2 col-md-3 col-sm-6 col-xs-8 col-lg-offset-10 col-md-offset-9 col-sm-offset-3 col-xs-offset-2">
								<a href="<?php echo base_url(); ?>campaign"><div class="view-more">view all</div></a>
							</div>
						</div>
						<?php	
						}
					}
					?>

				</div><!--  // end col-centered-->
			</div><!-- // end campaign div -->
		</div>
	</div>
	<!-- // end campaign section -->



	<!-- start product section -->
	<div class="row product-section">
		<div class="col-lg-12 col-md-12 col-sm-12">

			<div class="row campaign campaign-start">
				<div class="col-lg-9 col-centered">
					<div class="heading">
						<div class="heading-title">
							<span class="no-bar">Products & Services</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row campaign">
				<div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 col-centered">
					
					
					<div class="row">

					
					<?php 

					if($product_detail)
					{
						$a = 0;
						foreach($product_detail as $product) 
						{
							//only display 6 campaign..
							if( $a < 6 )
							{
								$campaign_id = $product['campaign'];
								$campaign = $this->model->fetchbyid($campaign_id,'campaign');
								
								//execute if product's campaign is not deleted.. 
								//that means status is 1..
								if($campaign)
								{

									if($campaign['active'] == "true")
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
												$a++;
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
												$a++;
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
												$a++;
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
									
									} //end if condition for campaign is active  if($campaign['active'] == "true")

								}//end if condition for campaign is exist into database (status = 1)
							?>

							<?php
							}//end if condition (a <= 6)
							
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
						if($a >= 6)
						{
						?>
						<div class="row">
							<div class="col-lg-2 col-md-3 col-sm-6 col-xs-8 col-lg-offset-10 col-md-offset-9 col-sm-offset-3 col-xs-offset-2">
								<a href="<?php echo base_url() ?>product"><div class="view-more">view all</div></a>
							</div>
						</div>
						
						<?php	
						}
					}
					?>
					
					

				</div><!--  // end col-centered-->
			</div><!-- // end product div -->
		</div>
	</div>
	<!-- // end product section -->

<script type="text/javascript">
jQuery(document).ready(function($) {
	var hello = $(".campaign-name").height();

});
</script>
