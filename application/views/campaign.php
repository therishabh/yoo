<!-- start campaign section -->
	<div class="row campaign-section">
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
							<span class="no-bar">Campaign</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row campaign">
				<div class="col-lg-9 col-md-9 col-sm-10 col-xs-10 col-centered">
					
					
					<div class="row display-campaign">
						

						<?php
						//execute if there is any campaign into database..
						if($campaign_detail)
						{
							foreach($campaign_detail as $campaign) 
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
									?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display blur">
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
										?>
										
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display blur">
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
									?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 folder-display">
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
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-centered pagination-div">
									<?php 
									if($pagination_num > 0 && $display_campaign < $total_campaign)
									{
										echo "<div class='pagination_bar'>";
										if($pagination_num > 9)
										{
											for($a = 1; $a <= 8; $a++)
											{
												if($a == 1)
												{
													echo "<span class='".$a." span-bgclr'>$a</span>";
												}
												else
												{
													echo "<span class='".$a."'>$a</span>";
												}
											}
											echo "<span class='2'>>></span>";
											echo "....";
											echo "<span class='".$pagination_num."'>Last</span>";
										}
										else
										{
											for($a = 1; $a <= $pagination_num; $a++)
											{
												if($a == 1)
												{
													echo "<span class='".$a." span-bgclr'>$a</span>";
												}
												else
												{
													echo "<span class='".$a."'>$a</span>";
												}
											}
											echo "<span class='2'>>></span>";
										}
										echo "</div>";
									}
									?>
									
								</div>
							</div>

				</div><!--  // end col-centered-->
			</div><!-- // end campaign div -->
		</div>
	</div>
	<!-- // end campaign section -->



<script type="text/javascript">
<?php
for($a = 1; $a <= $pagination_num; $a++)
{
?>
	$(".pagination_bar").on('click','.<?php echo $a;?>', function () {
		var starting_index = "<?php echo $a; ?>";
		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>index.php/campaignpagination",
			data: { starting_index:starting_index }
		}).success(function(result){
			$('.display-campaign').html(result);
			$('html, body').animate({scrollTop:0}, 'slow');
		});
	});

	$(".pagination_bar").on('click','.<?php echo $a;?>', function () {
		var starting_index = "<?php echo $a; ?>";
		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>index.php/campaignpagination",
			data: { index:starting_index }
		}).success(function(result){
			$('.pagination_bar').html(result);
		});
	});

<?php
}
?>
</script>