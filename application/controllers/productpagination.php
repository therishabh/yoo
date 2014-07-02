<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Productpagination extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent :: __construct();
	}

	function index()
	{
		//load model
		$this->load->model('model');

		$display_product = 9;

		if(isset($_POST['starting_index']))
		{
			$starting_index = $_POST['starting_index'] - 1;
			$starting_index = $starting_index * $display_product;
			$product_detail = $this->model->fetch_product_limit($starting_index,$display_product);

			if($product_detail)
			{
				foreach($product_detail as $product) 
				{
					$campaign_id = $product['campaign'];
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

		}

		if(isset($_POST['index']))
		{
			$number_of_product = $this->model->fetch_number_of_product();
			$pagination_num = ceil($number_of_product / $display_product);
			

			$starting_index = $_POST['index'];
			$previous = $starting_index - 1;
			if($starting_index != $pagination_num)
			{
				$next = $starting_index + 1;
			}
			elseif($starting_index == $pagination_num)
			{
				$next = $starting_index;
			}

			if($starting_index == 1 || $starting_index == 2 || $starting_index == 3 || $starting_index == 4)
			{
				if($pagination_num > 8)
				{
					if($starting_index != 1)
					{
						echo "<span class='".$previous."' ><<</span>";	
					}
					
					for($a = 1; $a <= 8; $a++)
					{
						if($a == $starting_index)
						{
							echo "<span class='".$a." span-bgclr'>$a</span>";
						}
						else
						{
							echo "<span class='".$a."'>$a</span>";
						}
						
					}
					echo "<span class='".$next."'>>></span>";
					echo "....";
					echo "<span class='".$pagination_num."'>Last</span>";
							

				}
				else
				{

					if($starting_index != 1)
					{
						echo "<span class='".$previous."' ><<</span>";	
					}
					for($a = 1; $a <= $pagination_num; $a++)
					{
						if($a == $starting_index)
						{
							echo "<span class='".$a." span-bgclr'>$a</span>";
						}
						else
						{
							echo "<span class='".$a."'>$a</span>";
						}
					}
					if($starting_index != $pagination_num)
					{
					echo "<span class='".$next."'>>></span>";	
					}	

				}	
			}
			elseif($starting_index == $pagination_num || $starting_index == ($pagination_num - 1) 
				|| $starting_index == ($pagination_num - 2) || $starting_index == ($pagination_num - 3) )
			{
				if($pagination_num > 8)
				{
					echo "<span class='1'>First</span>";
					echo "...";
					echo "<span class='".$previous."'><<</span>";
					for($a = $pagination_num - 7 ; $a <= $pagination_num; $a++)
					{
						if($a == $starting_index)
						{
							echo "<span class='".$a." span-bgclr'>$a</span>";
						}
						else
						{
							echo "<span class='".$a."'>$a</span>";
						}
					}
					if($starting_index != $pagination_num)
					{
						echo "<span class='".$next."'>>></span>";
					}
					
				}
				else
				{
					echo "<span class='".$previous."'><<</span>";
					for($a = 1; $a <= $pagination_num; $a++)
					{
						if($a == $starting_index)
						{
							echo "<span class='".$a." span-bgclr'>$a</span>";
						}
						else
						{
							echo "<span class='".$a."'>$a</span>";
						}
					}
					if($starting_index != $pagination_num)
					{
						echo "<span class='".$next."'>>></span>";
					}
					

				}	
			}
			//execute when click on center pagination number.
			else
			{
				if($pagination_num > 8)
				{
					$starting = $starting_index - 3;
					$ending = $starting_index + 3;

					echo "<span class='1'>First</span>";
					echo "...";
					echo "<span class='".$previous."'><<</span>";
					for($a = $starting; $a <= $ending; $a++)
					{
						if($a == $starting_index)
						{
							echo "<span class='".$a." span-bgclr'>$a</span>";
						}
						else
						{
							echo "<span class='".$a."'>$a</span>";
						}
						
					}
					echo "<span class='".$next."'>>></span>";
					echo "...";
					echo "<span class='".$pagination_num."'>Last</span>";
					
				}
				else
				{
					echo "<span class='".$previous."'><<</span>";
					for($a = 1; $a <= $pagination_num; $a++)
					{
						if($a == $starting_index)
						{
							echo "<span class='".$a." span-bgclr'>$a</span>";
						}
						else
						{
							echo "<span class='".$a."'>$a</span>";
						}
					}
					echo "<span class='".$next."'>>></span>";
				}
			}
		}

	}
}//end class..
?>


