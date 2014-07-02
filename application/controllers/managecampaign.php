<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Managecampaign extends CI_Controller
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
				$config['upload_path'] = './images/campaign/';

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
			    $resizeObj = new resize("./images/campaign/".$logo_data['file_name']);

			    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			    $resizeObj -> resizeImage(278,184, 'exact');

			    // *** 3) Save image
			    $resizeObj -> saveImage("./images/campaign/thumbnail/".$logo_data['file_name'], 1000);


			    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			    $resizeObj -> resizeImage(670,350, 'exact');

			    // *** 3) Save image
			    $resizeObj -> saveImage("./images/campaign/".$logo_data['file_name'], 1000);

				// $config_img['image_library'] = 'gd2';
				// $config_img['source_image']	= "./images/campaign/".$logo_data['file_name'];
				// $config_img['create_thumb'] = FALSE;
				// $config_img['maintain_ratio'] = TRUE;
				// $config_img['width']	 = 670;
				// $config_img['height']	= 350;
				// $this->load->library('image_lib', $config_img);

				// $this->image_lib->resize();

				$data['image'] = $logo_data['file_name'];
			}
			//if there is no any file selected..
			else
			{
				$data['image'] = "default.jpg";
			}

			$data['name'] = $this->input->post('name');
			$data['subheading'] = $this->input->post('subheading');
			$data['code'] = $code;
			$data['amount'] = $this->input->post('amount');
			date_default_timezone_set('Asia/Calcutta');
			$data['start_date'] = date('d/m/Y');
			$data['end_date'] = $this->input->post('end_date');
			$data['description'] = $this->input->post('desc');
			$data['sub_desc'] = $this->input->post('sub_desc');
			$data['about'] = $this->input->post('about');
			$data['updates'] = $this->input->post('updates');
			if( $this->input->post('running_status') == "yes" )
			{
				$data['running_status'] = "yes";
			}
			else
			{
				$data['running_status'] = "no";
			}

			$query = $this->model->insertdata($data,'campaign');
			if($query)
			{
				//redirect to same page 
				//because of post-request-get rule..
				//there is for Duplicate form submissions avoid..
				//start session for display message..
				$this->session->set_userdata('insert_campaign',"success");
				header("Location: " . site_url()."managecampaign");
				
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
					$config['upload_path'] = './images/campaign/';
					
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
				    $resizeObj = new resize("./images/campaign/".$logo_data['file_name']);

				    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
				    $resizeObj -> resizeImage(278,184, 'exact');

				    // *** 3) Save image
				    $resizeObj -> saveImage("./images/campaign/thumbnail/".$logo_data['file_name'], 1000);


				    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
				    $resizeObj -> resizeImage(670,350, 'exact');

				    // *** 3) Save image
				    $resizeObj -> saveImage("./images/campaign/".$logo_data['file_name'], 1000);

					// $config_img['image_library'] = 'gd2';
					// $config_img['source_image']	= "./images/campaign/".$logo_data['file_name'];
					// $config_img['create_thumb'] = FALSE;
					// $config_img['maintain_ratio'] = TRUE;
					// $config_img['width']	 = 670;
					// $config_img['height']	= 350;

					// $this->load->library('image_lib', $config_img);

					// $this->image_lib->resize();

					$data['image'] = $logo_data['file_name'];

					
				}
			}
			else
			{
				$data['image'] = "default.jpg"; 
			}
			$id = $this->input->post('campaign_id');
			$data['name'] = $this->input->post('name');
			$data['subheading'] = $this->input->post('subheading');
			$data['amount'] = $this->input->post('amount');
			$data['end_date'] = $this->input->post('end_date');
			$data['description'] = $this->input->post('desc');
			$data['sub_desc'] = $this->input->post('sub_desc');
			$data['about'] = $this->input->post('about');
			$data['updates'] = $this->input->post('updates');
			if( $this->input->post('running_status') == "yes" )
			{
				$data['running_status'] = "yes";
			}
			else
			{
				$data['running_status'] = "no";
			}

			$query = $this->model->updatedata($data,$id,'campaign');
			if($query)
			{
				//redirect to same page 
				//because of post-request-get rule..
				//there is for Duplicate form submissions avoid..
				//start session for display message..
				$this->session->set_userdata('update_campaign',$id);
				header("Location: " . site_url()."managecampaign");
				
			}

		}
		else
		{

			$this->load->model('model');

			$data['number_of_campaign'] = $this->model->number_of_campaign();

			//fetch all campaign from database..
			$data['campaign_detail'] = $this->model->fetch_campaign_details();

			//view dashboard and pass $data array..
			$data['page'] = "manage-campaign";
			$this->load->view('backend-template',$data);
			
		}
		
	}//end index function.

	function view_campaign()
	{
		$this->load->model('model');
		if($this->input->post('id'))
		{
			$campaign_id = $this->input->post('id');
			$campaign_detail = $this->model->fetchbyfield('id',$campaign_id,'campaign');
			$end_date_array = explode('/',$campaign_detail['end_date']);
			$end_date = $end_date_array[2]."/".$end_date_array[1]."/".$end_date_array[0];
			$end_date = date('M j, Y',strtotime($end_date));

			$start_date_array = explode('/',$campaign_detail['start_date']);
			$start_date = $start_date_array[2]."/".$start_date_array[1]."/".$start_date_array[0];
			$start_date = date('M j, Y',strtotime($start_date));

			//count complete status..
			$complete_percent = ($campaign_detail['complete_amount'] / $campaign_detail['amount']) * 100;
			$complete_percent = floor($complete_percent);

			if($complete_percent > 100)
			{
				$complete_percent = 100;
			}

			if($campaign_detail['running_status'] == "yes"){
				$running_status = "Unlimited";
			}
			else
			{
				$running_status = "Limited";
			}
		?>
		<div class="row">
			<div class="col-lg-3">
				<div class="label-heading">Name:</div>
			</div>
			<div class="col-lg-8" style="padding-left:10px;">
				<div class="label-value"><?php echo  $campaign_detail['name'] ?></div>
			</div>
		</div>

		<div class="row"  style="margin-top:15px;">
			<div class="col-lg-3">
				<div class="label-heading">Subheading:</div>
			</div>
			<div class="col-lg-8" style="padding-left:10px;">
				<div class="label-value"><?php echo  $campaign_detail['subheading'] ?></div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-7">
				<div class="row">
					<div class="col-lg-5">
						<div class="label-heading">Amount:</div>
					</div>
					<div class="col-lg-7">
						<div class="label-value"><img src="<?php echo base_url(); ?>images/rupee.png" alt=""> <?php echo $campaign_detail['amount'] ?></div>
					</div>
				</div>
				<div class="row" style="margin-top:15px;">
					<div class="col-lg-5">
						<div class="label-heading">Start Date:</div>
					</div>
					<div class="col-lg-7">
						<div class="label-value"><?php echo $start_date; ?></div>
					</div>
				</div>

				<div class="row" style="margin-top:15px;">
					<div class="col-lg-5">
						<div class="label-heading">End Date:</div>
					</div>
					<div class="col-lg-7">
						<div class="label-value"><?php echo $end_date; ?></div>
					</div>
				</div>

				<div class="row" style="margin-top:15px;">
					<div class="col-lg-5">
						<div class="label-heading">Complete:</div>
					</div>
					<div class="col-lg-7">
						<div class="label-value"><?php echo $complete_percent ?>%</div>
					</div>
				</div>
				<div class="row" style="margin-top:15px;">
					<div class="col-lg-5">
						<div class="label-heading">Type:</div>
					</div>
					<div class="col-lg-7">
						<div class="label-value"><?php echo $running_status ?></div>
					</div>
				</div>

			</div>
			<div class="col-lg-5 camp_images">
				<img src="<?php echo base_url() ?>images/campaign/thumbnail/<?php echo $campaign_detail['image'] ?>" alt="">
			</div>

			
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-3">
				<div class="label-heading">Sub Desc:</div>
			</div>
			<div class="col-lg-8" style="padding-left:10px;">
				<div class="label-value">
					<?php echo $campaign_detail['sub_desc']; ?>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-3">
				<div class="label-heading">Description:</div>
			</div>
			<div class="col-lg-8" style="padding-left:10px;">
				<div class="label-value">
					<?php echo $campaign_detail['description']; ?>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-3">
				<div class="label-heading">About:</div>
			</div>
			<div class="col-lg-8" style="padding-left:10px;">
				<div class="label-value"><?php echo $campaign_detail['about']; ?></div>
			</div>
		</div>

		<div class="row" style="margin-top:15px;">
			<div class="col-lg-3">
				<div class="label-heading">Update:</div>
			</div>
			<div class="col-lg-8" style="padding-left:10px;">
				<div class="label-value"><?php echo $campaign_detail['updates']; ?></div>
			</div>
		</div>
		<div class="campaign_active_status" style="display:none;"><?php echo $campaign_detail['active']; ?></div>
		<div class="campaign_code_hidden" style="display:none;"><?php echo $campaign_detail['code']; ?></div>
		<?php
		}
	}

	function delete_campaign()
	{
		if($this->input->post('id'))
		{
			$this->load->model('model');
			$campaign_id = $this->input->post('id');
			$data['status'] = 0;
			$this->model->updatedata($data,$campaign_id,'campaign');
		?>
		<div class="row">
			<div class="col-lg-5 col-centered" style="margin-top:150px;">
				<a href="<?php echo base_url(); ?>managecampaign">
				<div class="submit-btn form-submit-btn">Add New Campaign</div>
				</a>
			</div>
		</div>

		<?php
		}
	}

	function search_campaign()
	{
		$this->load->model('model');

		$campaign_name = $this->input->post('campaign_name');
		$campaign_amount = $this->input->post('campaign_amount');
		
		$campaign_detail = $this->model->search_campaign($campaign_name,$campaign_amount);
		//check if there is any campaign into database.
		if($campaign_detail)
		{
			$i = 1;
			foreach($campaign_detail as $campaign)
			{
				$description = character_limiter($campaign['description'],95);
			
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
				if($endTimeStamp < $startTimeStamp)
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
				Search Result Not Found !
			</div>
		</div>
		<?php
		}	
		
	}


	function edit_campaign()
	{
		//load model
		$this->load->model('model');

		$campaign_id = $this->input->post('id');
		$campaign_detail = $this->model->fetchbyid($campaign_id,'campaign');
		?>
		<?php echo form_open_multipart('managecampaign','id="campaign-form"');?>
			<div class="row">
				<div class="col-lg-6">
					<div>
						<div class="label-text">Campaign Name</div>
						<div><input type="text" class="form-control" id="name" name="name" value="<?php echo $campaign_detail['name']; ?>"></div>
					</div>

					<div style="margin-top:15px;">
						<div class="label-text">Campaign Subheading</div>
						<div><input type="text" class="form-control"  name="subheading" value="<?php echo $campaign_detail['subheading']; ?>"></div>
					</div>

					<div style="margin-top:15px;">
						<div class="label-text">Campaign Amount</div>
						<div><input type="text" class="form-control rupee-box rupee" id="amount" name="amount" value="<?php echo $campaign_detail['amount']; ?>"></div>
					</div>
					<div style="margin-top:15px;">
						<div class="label-text">Campaign End Date</div>
						<div>
							<div class="form-group">
		                        <div class='input-group date' id='datetimepicker2' data-date-format="DD/MM/YYYY">
		                            <input type='text' class="form-control campaign-date" name="end_date" id="enddate" value="<?php echo $campaign_detail['end_date']; ?>" />
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
								<img src="<?php echo base_url(); ?>images/campaign/thumbnail/<?php echo $campaign_detail['image'] ?>"  alt="Staff Image" class="img">
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
									<?php
									if($campaign_detail['running_status'] == "yes")
									{
									?>
									<label>
										<input type="checkbox" checked class="checkbox" value="yes" name="running_status">
										<div class="checkbox-img"></div>
									</label>
									<?php
									} 
									else
									{
									?>
									<label>
										<input type="checkbox" class="checkbox" value="yes" name="running_status">
										<div class="checkbox-img"></div>
									</label>
									<?php
									}
									?>
									
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
						<input type="text" class="form-control" value="<?php echo $campaign_detail['sub_desc']; ?>" name="sub_desc">
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:10px;">
				<div class="col-lg-12">
					<div class="label-text">
						Campaign Description
					</div>
					<div>
						<textarea class="form-control" name="desc" id="desc" rows="4"><?php echo $campaign_detail['description'] ?></textarea>
					</div>														
				</div>
			</div>

			<div class="row" style="margin-top:15px;">
				<div class="col-lg-12">
					<div class="label-text">
						Campaign About
					</div>
					<div>
						<textarea  class="form-control" name="about" rows="4"><?php echo $campaign_detail['about'] ?></textarea>
					</div>														
				</div>
			</div>

			<div class="row" style="margin-top:15px;">
				<div class="col-lg-12">
					<div class="label-text">
						Campaign Update
					</div>
					<div>
						<textarea class="form-control" name="updates" rows="4"><?php echo $campaign_detail['updates'] ?></textarea>
					</div>														
				</div>
			</div>

			<!-- save and cancle button -->
			<div class="row" style="margin-top:15px;">
				<div class="col-lg-3 col-lg-offset-3">
					<input type="hidden" name="code" value="<?php echo $campaign_detail['code']; ?>">
					<input type="hidden" name="default_image" id="default_image" value="default">
					<input type="hidden" name="old_image" value="<?php echo $campaign_detail['image']; ?>">
					<input type="hidden" name="campaign_id" value="<?php echo $campaign_detail['id']; ?>">
					<input type="hidden" name="update_btn" value="success">
					<div class="submit-btn form-submit-btn">Update</div>
				</div>
				<div class="col-lg-3">
					<div class="cancel-btn" id="reset">Cancle</div>
				</div>
			</div>
			<!-- //end save and cancle button -->

			<script type="text/javascript">
			var data = moment().format('MMM D, YYYY');
			$('#datetimepicker2').datetimepicker({
			    pickTime: false
			});
			$('#datetimepicker2').data("DateTimePicker").setMinDate(new Date(data));


			if( $('.checkbox').is(":checked") )
			{
				$(".checkbox:checked").next('.checkbox-img').css({
					background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -47px 0px'
				});
			}
			<?php
			if($campaign_detail['image'] == "default.jpg")
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

	function inactive_campaign()
	{
		$campaign_id = $_POST['campaign_id'];
		$this->load->model('model');
		$data['active'] = "false";
		$this->model->updatedata($data,$campaign_id,'campaign');
	}
	
	function active_campaign()
	{
		$campaign_id = $_POST['campaign_id'];
		$this->load->model('model');
		$data['active'] = "true";
		$this->model->updatedata($data,$campaign_id,'campaign');
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