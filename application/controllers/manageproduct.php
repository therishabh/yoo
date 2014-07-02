<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Manageproduct extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent :: __construct();
	}

	function index()
	{
		$this->load->model('model');

		if($this->input->post('insert_btn'))
		{
			$code = $this->model->generateRandomString(3);

			//check if any file is selected..
			if( !empty($_FILES['image']['name']) )
			{
				//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
				$config['upload_path'] = './images/product/';

				//set logo default name..
				$config['file_name'] = $code;

				// set the filter image types
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				//load the upload library
				$this->load->library('upload', $config);

		   		$this->upload->set_allowed_types('*');
		    
				$this->upload->initialize($config);

				//if not successful, set the error message
				if ($this->upload->do_upload('image')) 
				{
					$logo_data = $this->upload->data();
				}
			
			    // *** 1) Initialise / load image
			    $resizeObj = new resize("./images/product/".$logo_data['file_name']);

			    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			    $resizeObj -> resizeImage(278,184, 'exact');

			    // *** 3) Save image
			    $resizeObj -> saveImage("./images/product/thumbnail/".$logo_data['file_name'], 1000);


			    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			    $resizeObj -> resizeImage(670,350, 'exact');

			    // *** 3) Save image
			    $resizeObj -> saveImage("./images/product/".$logo_data['file_name'], 1000);

				$data['image'] = $logo_data['file_name'];
			}
			//if there is no any file selected..
			else
			{
				$data['image'] = "default.jpg";
			}
			$campaign_id = $this->input->post('campaign');
			$data['name'] = $this->input->post('name');
			$data['code'] = $code;
			$data['code_2'] = $this->model->generateRandomString(15);
			$data['amount'] = $this->input->post('amount');
			date_default_timezone_set('Asia/Calcutta');
			$data['date'] = date('Y/m/d');
			$data['type'] = $this->input->post('type');
			$data['delivery'] = $this->input->post('delivery-time')." ".$this->input->post('delivery-mode');
			$data['campaign'] = $this->input->post('campaign');
			$data['description'] = $this->input->post('desc');
			$data['sub_desc'] = $this->input->post('sub_desc');
			$data['about_the_offer'] = $this->input->post('about_the_offer');
			$data['quantity'] = $this->input->post('quantity_type');
			$data['quantity_amount'] = $this->input->post('quantity_amount');
			
			if( $this->input->post('date_display') == "yes" )
			{
				$data['date_display'] = "1";
			}
			else
			{
				$data['date_display'] = "0";
			}

			$query = $this->model->insertdata($data,'product');
			$update_data['num_of_product'] = $this->model->countproduct($campaign_id);
			$query = $this->model->updatedata($update_data,$campaign_id,'campaign');
			if($query)
			{
				//redirect to same page 
				//because of post-request-get rule..
				//there is for Duplicate form submissions avoid..
				//start session for display message..
				$this->session->set_userdata('insert_product',"success");
				header("Location: " . site_url()."manageproduct");
				
			}

		}
		else if($this->input->post('update_btn'))
		{
			//if image is not empty
			if($this->input->post('default_image') != "")
			{
				//if image does not changed..
				if( $this->input->post('default_image') == "default")
				{
					$data['image'] = $this->input->post('old_image');
				}
				//if image changed..
				else
				{
					//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
					$config['upload_path'] = './images/product/';
					
					//set logo default name..
					$config['file_name'] = $this->input->post('code');

					// set the filter image types
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					
					//load the upload library
					$this->load->library('upload', $config);

			   		$this->upload->set_allowed_types('*');
			    
					$this->upload->initialize($config);

					//if not successful, set the error message
					if ($this->upload->do_upload('image')) 
					{
						$logo_data = $this->upload->data();

					}
					
				    // *** 1) Initialise / load image
				    $resizeObj = new resize("./images/product/".$logo_data['file_name']);

				    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
				    $resizeObj -> resizeImage(278,184, 'exact');

				    // *** 3) Save image
				    $resizeObj -> saveImage("./images/product/thumbnail/".$logo_data['file_name'], 1000);


				    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
				    $resizeObj -> resizeImage(670,350, 'exact');

				    // *** 3) Save image
				    $resizeObj -> saveImage("./images/product/".$logo_data['file_name'], 1000);

					$data['image'] = $logo_data['file_name'];
					
				}
			}
			else
			{
				$data['image'] = "default.jpg"; 
			}
			$product_id = $this->input->post('product_id');
			$campaign_id = $this->input->post('campaign');
			$old_campaign_id = $this->input->post('old_campaign_id');

			$data['name'] = $this->input->post('name');
			$data['amount'] = $this->input->post('amount');
			$data['type'] = $this->input->post('type');
			$data['delivery'] = $this->input->post('delivery-time')." ".$this->input->post('delivery-mode');
			$data['campaign'] = $this->input->post('campaign');
			$data['description'] = $this->input->post('desc');
			$data['sub_desc'] = $this->input->post('sub_desc');
			$data['about_the_offer'] = $this->input->post('about_the_offer');
			$data['quantity'] = $this->input->post('quantity_type');
			$data['quantity_amount'] = $this->input->post('quantity_amount');

			if( $this->input->post('date_display') == "yes" )
			{
				$data['date_display'] = "1";
			}
			else
			{
				$data['date_display'] = "0";
			}

			$query = $this->model->updatedata($data,$product_id,'product');
			if($old_campaign_id == $campaign_id)
			{
				$update_data['num_of_product'] = $this->model->countproduct($campaign_id);
				$query = $this->model->updatedata($update_data,$campaign_id,'campaign');
			}
			else
			{
				$update_data['num_of_product'] = $this->model->countproduct($campaign_id);
				$query = $this->model->updatedata($update_data,$campaign_id,'campaign');

				$update_old_data['num_of_product'] = $this->model->countproduct($old_campaign_id);
				$query = $this->model->updatedata($update_old_data,$old_campaign_id,'campaign');

			}
			if($query)
			{
				//redirect to same page 
				//because of post-request-get rule..
				//there is for Duplicate form submissions avoid..
				//start session for display message..
				$this->session->set_userdata('update_product',$product_id);
				header("Location: " . site_url()."manageproduct");
				
			}
		}
		else
		{
			//fetch number of campaign from database..
			$data['number_of_campaign'] = $this->model->number_of_campaign();

			//fetch all products from database..
			$data['product_detail'] = $this->model->fetchproductview();

			//fetch all campaign from database..
			$data['campaign_detail'] = $this->model->fetch_campaign_details();

			//view dashboard and pass $data array..
			$data['page'] = "manage-product";
			$this->load->view('backend-template',$data);
			
		}

		
	}//end index function.

	function view_product()
	{
		$this->load->model('model');
		$product_id = $this->input->post('product_id');
		$product_detail = $this->model->fetchbyid($product_id,'product');
		$campaign_id = $product_detail['campaign'];
		$campaign_detail = $this->model->fetchbyid($campaign_id,'campaign');

		?>
		<div class="row">
			<div class="col-lg-4">
				<div class="label-heading">Name:</div>
			</div>
			<div class="col-lg-8" style="padding-left:0px;">
				<div class="label-value"><?php echo $product_detail['name']; ?></div>
			</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-lg-4">
				<div class="label-heading">Campaign Name:</div>
			</div>
			<div class="col-lg-8" style="padding-left:0px;">
				<div class="label-value"><?php echo $campaign_detail['name']?></div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-7">
				<div class="row">
					<div class="col-lg-6">
						<div class="label-heading">Amount:</div>
					</div>
					<div class="col-lg-6">
						<div class="label-value" style="padding-left:13px;"><img src="<?php echo base_url(); ?>images/rupee.png" alt=""> <?php echo $product_detail['amount']; ?></div>
					</div>
				</div>
				<div class="row" style="margin-top:15px;">
					<div class="col-lg-6">
						<div class="label-heading">Launch Date:</div>
					</div>
					<div class="col-lg-6">
						<div class="label-value" style="padding-left:13px;"><?php echo date('M j, Y',strtotime($product_detail['date'])); ?></div>
					</div>
				</div>

				<div class="row" style="margin-top:15px;">
					<div class="col-lg-6">
						<div class="label-heading">Type:</div>
					</div>
					<div class="col-lg-6">
						<div class="label-value" style="padding-left:13px;"><?php echo $product_detail['type']; ?></div>
					</div>
				</div>
				<div class="row" style="margin-top:15px;">
					<div class="col-lg-6">
						<div class="label-heading">Delivery:</div>
					</div>
					<div class="col-lg-6">
						<div class="label-value" style="padding-left:13px;"><?php echo $product_detail['delivery'] ?></div>
					</div>
				</div>

				<div class="row" style="margin-top:15px;">
					<div class="col-lg-6">
						<div class="label-heading">Quantity:</div>
					</div>
					<div class="col-lg-6">
						<div class="label-value" style="padding-left:13px;">
						<?php 
						if($product_detail['quantity'] == "Unlimited")
						{
							echo "Unlimited";
						}
						else
						{
							echo $product_detail['quantity_amount'];
						}
						 ?>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-5 camp_images">
				<img src="<?php echo base_url() ?>images/product/thumbnail/<?php echo $product_detail['image'] ?>" alt="">
			</div>
			
		</div>
		
		<div class="row" style="margin-top:15px;">
			<div class="col-lg-4">
				<div class="label-heading">Launch Date Display:</div>
			</div>
			<div class="col-lg-8" style="padding-left:0px;">
				<div class="label-value">
				<?php
				if($product_detail['date_display'] == "1")
				{
					echo "Yes";
				}
				else
				{
					echo "No";
				}
				?>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-4">
				<div class="label-heading">Sub Description:</div>
			</div>
			<div class="col-lg-8" style="padding-left:0px;">
				<div class="label-value">
				<?php echo $product_detail['sub_desc']; ?>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-4">
				<div class="label-heading">Description:</div>
			</div>
			<div class="col-lg-8" style="padding-left:0px;">
				<div class="label-value">
				<?php echo $product_detail['description']; ?>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-lg-4">
				<div class="label-heading">About The Offer:</div>
			</div>
			<div class="col-lg-8" style="padding-left:0px;">
				<div class="label-value">
				<?php echo $product_detail['about_the_offer']; ?>
				</div>
			</div>
		</div>
		<div class="running_status" style="display:none;"><?php echo $product_detail['active']; ?></div>
		<div class="view_product_id" style="display:none;"><?php echo $product_detail['id']; ?></div>
		<div class="product_code_hidden" style="display:none;"><?php echo $product_detail['code']; ?></div>

		<?php
	}
	

	function delete_product()
	{
		if($this->input->post('product_id'))
		{
			$this->load->model('model');
			$product_id = $this->input->post('product_id');
			//get product details from product table from product table
			$product_detail = $this->model->fetchbyid($product_id,'product');
			$campaign_id = $product_detail['campaign'];

			//update status 0 into product table..
			$data['status'] = 0;
			$this->model->updatedata($data,$product_id,'product');

			//update number of product into campaign table..
			$update_data['num_of_product'] = $this->model->countproduct($campaign_id);
			$query = $this->model->updatedata($update_data,$campaign_id,'campaign');
		?>
		<div class="row">
			<div class="col-lg-5 col-centered" style="margin-top:150px;">
				<a href="<?php echo base_url(); ?>manageproduct">
				<div class="submit-btn">Add New Product</div>
				</a>
			</div>
		</div>

		<?php
		}
	}

	function edit_product()
	{
		$this->load->model('model');
		$campaign_detail = $this->model->fetch_campaign_details();

		$product_id = $this->input->post('product_id');

		//get product and campaign details of given product id..
		$product_detail = $this->model->fetchbyid($product_id,'product');
		// $campaign_id = $product_detail['campaign'];
		// $product_campaign_detail = $this->model->fetchbyid($campaign_id,'campaign');
		// 
		$delivery = explode(" ",$product_detail['delivery']);
		$delivery_time = $delivery[0];
		$delivery_mode = $delivery[1];

		?>
		<?php echo form_open_multipart('manageproduct','id="product-form"');?>
		<div class="row">
			<div class="col-lg-6">
				<div>
					<div class="label-text">Product Name</div>
					<div><input type="text" class="form-control" id="name" name="name" value="<?php echo $product_detail['name']; ?>"></div>
				</div>
				<div style="margin-top:15px;">
					<div class="label-text">Campaign</div>
					<div>
						<select class="form-control" name="campaign" id="campaign">
							<option value="">Select Campaign</option>
							<?php
							foreach($campaign_detail as $campaign)
							{
								if($product_detail['campaign'] == $campaign['id'])
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
				<div style="margin-top:15px;">
					<div class="label-text">Product Amount</div>
					<div><input type="text" class="form-control rupee-box rupee" id="amount" name="amount" value="<?php echo $product_detail['amount']; ?>" ></div>
				</div>
				
			</div>
			<div class="col-lg-6">

				<div class="row">
					<div class="col-lg-12 image" >
						<div id="uploaded-image">
							<img src="<?php echo base_url(); ?>images/product/thumbnail/<?php echo $product_detail['image'] ?>"  alt="Staff Image" class="img">
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
							<?php
							if($product_detail['type'] == "Product")
							{
								echo '<option selected value="Product">Product</option>';
							} 
							else
							{
								echo '<option value="Product">Product</option>';
							}

							if($product_detail['type'] == "Service")
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
			<div class="col-lg-6">
				<div style="margin-top:15px;">
					<div class="label-text">Delivery Time</div>
					<div>
						<div class="row">
							<div class="col-lg-6">
								<input type="text" id="delivery-time" value="<?php echo $delivery_time; ?>" name="delivery-time" class="form-control">
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
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div style="margin-top:15px;">
					<div class="label-text">Quantity</div>
					<div>
						<select name="quantity_type" id="quality-type" class="form-control">
							<?php 
							if($product_detail['quantity'] == "Unlimited")
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
			<?php
			if($product_detail['quantity'] == "Limited")
			{
			?>
			<div class="col-lg-6 q-amount">
				<div style="margin-top:35px;">
					<input type="text" class="form-control rupee" id="quantity-amount" name="quantity_amount" value="<?php echo $product_detail['quantity_amount']; ?>">
				</div>
			</div>
			<?php
			}
			else
			{
			?>
			<div class="col-lg-6 q-amount" style="display:none;">
				<div style="margin-top:35px;">
					<input type="text" class="form-control rupee" id="quantity-amount" name="quantity_amount" value="<?php echo $product_detail['quantity_amount']; ?>">
				</div>
			</div>
			<?php
			}
			?>
		</div>
		
		<div class="row">
			<div class="col-lg-6">
				<div style="margin-top:15px;">
					<div>
					<div class="label-text" style="float:left;padding-right:20px;">Launch Date Display</div>
						<?php 
						if($product_detail['date_display'] == "1")
						{
						?>
						<label>
							<input type="checkbox" checked class="checkbox" value="yes" name="date_display">
							<div class="checkbox-img"></div>
						</label>
						<?php
						}
						else
						{
						?>
						<label>
							<input type="checkbox" class="checkbox" value="yes" name="date_display">
							<div class="checkbox-img"></div>
						</label>
						<?php
						}
						?>

						
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
					<input type="text" class="form-control" id="sub_desc" value="<?php echo $product_detail['sub_desc']; ?>" name="sub_desc">
				</div>												
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
				<div class="label-text">
					Product Description
				</div>
				<div>
					<textarea class="form-control" name="desc" id="desc" rows="4"><?php echo $product_detail['description']; ?></textarea>
				</div>												
			</div>
		</div>
		
		<div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
				<div class="label-text">
					About the Offer
				</div>
				<div>
					<textarea class="form-control" name="about_the_offer" rows="4"><?php echo $product_detail['about_the_offer']; ?></textarea>
				</div>												
			</div>
		</div>
		

		<!-- save and cancle button -->
		<div class="row" style="margin-top:15px;">
			<div class="col-lg-3 col-lg-offset-3">
				<input type="hidden" name="code" value="<?php echo $product_detail['code']; ?>">
				<input type="hidden" name="default_image" id="default_image" value="default">
				<input type="hidden" name="old_image" value="<?php echo $product_detail['image']; ?>">
				<input type="hidden" name="product_id" value="<?php echo $product_detail['id']; ?>">
				<input type="hidden" name="old_campaign_id" value="<?php echo $product_detail['campaign']; ?>">
				<input type="hidden" name="update_btn" value="success">
				<div class="submit-btn form-submit-btn">Update</div>
			</div>
			<div class="col-lg-3">
				<div class="cancel-btn" id="reset">Cancle</div>
			</div>
		</div>
		<!-- //end save and cancle button -->

		<script type="text/javascript">
		if( $('.checkbox').is(":checked") )
		{
			$(".checkbox:checked").next('.checkbox-img').css({
				background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -47px 0px'
			});
		}

		<?php
		if($product_detail['image'] == "default.jpg")
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

		
		</script>
		
		<?php echo form_close(); ?>
		<?php
	}

	function search_product()
	{
		$this->load->model('model');

		$product_name = $this->input->post('product_name');
		$campaign = $this->input->post('product_campaign');
		$active_status = $this->input->post('product_status');
		
		$product_detail = $this->model->search_product($product_name,$campaign,$active_status);

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
												<div class="active"><?php echo $active_status; ?></div>
												<?php
											}
											else
											{
												?>
												<div class="inactive"><?php echo $active_status; ?></div>
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
					No Result Found..!
				</div>
			</div>
			<?php
		}
	}


	function inactive_product()
	{
		$product_id = $_POST['product_id'];
		$this->load->model('model');
		$data['active'] = "false";
		$this->model->updatedata($data,$product_id,'product');
	}
	
	function active_product()
	{
		$product_id = $_POST['product_id'];
		$this->load->model('model');
		$data['active'] = "true";
		$this->model->updatedata($data,$product_id,'product');
	}
}


class resize
{
    // *** Class variables
    private $image;
    private $width;
    private $height;
    private $imageResized;

    function __construct($fileName)
    {
        // *** Open up the file
        $this->image = $this->openImage($fileName);

        // *** Get width and height
        $this->width  = imagesx($this->image);
        $this->height = imagesy($this->image);
    }

    ## --------------------------------------------------------

    private function openImage($file)
    {
        // *** Get extension
        $extension = strtolower(strrchr($file, '.'));

        switch($extension)
        {
            case '.jpg':
            case '.jpeg':
                $img = @imagecreatefromjpeg($file);
                break;
            case '.gif':
                $img = @imagecreatefromgif($file);
                break;
            case '.png':
                $img = @imagecreatefrompng($file);
                break;
            default:
                $img = false;
                break;
        }
        return $img;
    }

    ## --------------------------------------------------------

    public function resizeImage($newWidth, $newHeight, $option="auto")
    {
        // *** Get optimal width and height - based on $option
        $optionArray = $this->getDimensions($newWidth, $newHeight, $option);

        $optimalWidth  = $optionArray['optimalWidth'];
        $optimalHeight = $optionArray['optimalHeight'];


        // *** Resample - create image canvas of x, y size
        $this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
        imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);


        // *** if option is 'crop', then crop too
        if ($option == 'crop') {
            $this->crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
        }
    }

    ## --------------------------------------------------------

    private function getDimensions($newWidth, $newHeight, $option)
    {

       switch ($option)
        {
            case 'exact':
                $optimalWidth = $newWidth;
                $optimalHeight= $newHeight;
                break;
            case 'portrait':
                $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                $optimalHeight= $newHeight;
                break;
            case 'landscape':
                $optimalWidth = $newWidth;
                $optimalHeight= $this->getSizeByFixedWidth($newWidth);
                break;
            case 'auto':
                $optionArray = $this->getSizeByAuto($newWidth, $newHeight);
                $optimalWidth = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
                break;
            case 'crop':
                $optionArray = $this->getOptimalCrop($newWidth, $newHeight);
                $optimalWidth = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
                break;
        }
        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    ## --------------------------------------------------------

    private function getSizeByFixedHeight($newHeight)
    {
        $ratio = $this->width / $this->height;
        $newWidth = $newHeight * $ratio;
        return $newWidth;
    }

    private function getSizeByFixedWidth($newWidth)
    {
        $ratio = $this->height / $this->width;
        $newHeight = $newWidth * $ratio;
        return $newHeight;
    }

    private function getSizeByAuto($newWidth, $newHeight)
    {
        if ($this->height < $this->width)
        // *** Image to be resized is wider (landscape)
        {
            $optimalWidth = $newWidth;
            $optimalHeight= $this->getSizeByFixedWidth($newWidth);
        }
        elseif ($this->height > $this->width)
        // *** Image to be resized is taller (portrait)
        {
            $optimalWidth = $this->getSizeByFixedHeight($newHeight);
            $optimalHeight= $newHeight;
        }
        else
        // *** Image to be resizerd is a square
        {
            if ($newHeight < $newWidth) {
                $optimalWidth = $newWidth;
                $optimalHeight= $this->getSizeByFixedWidth($newWidth);
            } else if ($newHeight > $newWidth) {
                $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                $optimalHeight= $newHeight;
            } else {
                // *** Sqaure being resized to a square
                $optimalWidth = $newWidth;
                $optimalHeight= $newHeight;
            }
        }

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    ## --------------------------------------------------------

    private function getOptimalCrop($newWidth, $newHeight)
    {

        $heightRatio = $this->height / $newHeight;
        $widthRatio  = $this->width /  $newWidth;

        if ($heightRatio < $widthRatio) {
            $optimalRatio = $heightRatio;
        } else {
            $optimalRatio = $widthRatio;
        }

        $optimalHeight = $this->height / $optimalRatio;
        $optimalWidth  = $this->width  / $optimalRatio;

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    ## --------------------------------------------------------

    private function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)
    {
        // *** Find center - this will be used for the crop
        $cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );
        $cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );

        $crop = $this->imageResized;
        //imagedestroy($this->imageResized);

        // *** Now crop from center to exact requested size
        $this->imageResized = imagecreatetruecolor($newWidth , $newHeight);
        imagecopyresampled($this->imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);
    }

    ## --------------------------------------------------------

    public function saveImage($savePath, $imageQuality="100")
    {
        // *** Get extension
        $extension = strrchr($savePath, '.');
           $extension = strtolower($extension);

        switch($extension)
        {
            case '.jpg':
            case '.jpeg':
                if (imagetypes() & IMG_JPG) {
                    imagejpeg($this->imageResized, $savePath, $imageQuality);
                }
                break;

            case '.gif':
                if (imagetypes() & IMG_GIF) {
                    imagegif($this->imageResized, $savePath);
                }
                break;

            case '.png':
                // *** Scale quality from 0-100 to 0-9
                $scaleQuality = round(($imageQuality/100) * 9);

                // *** Invert quality setting as 0 is best, not 9
                $invertScaleQuality = 9 - $scaleQuality;

                if (imagetypes() & IMG_PNG) {
                     imagepng($this->imageResized, $savePath, $invertScaleQuality);
                }
                break;

            // ... etc

            default:
                // *** No extension - No save.
                break;
        }

        imagedestroy($this->imageResized);
    }


    ## --------------------------------------------------------

}

?>