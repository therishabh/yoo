<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class addproduct extends CI_Controller
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
		if($this->input->post('insert_btn'))
		{
			$code = $this->model->generateRandomString(3);
			$code_2 = $this->model->generateRandomString(15);

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
			

			$userdata['name'] = $this->input->post('username');
			$userdata['phone'] = $this->input->post('mobile');
			$userdata['email'] = $this->input->post('email');
			$userdata['address'] = $this->input->post('address');
			$userdata['product'] = $code_2;

			$data['name'] = htmlspecialchars($this->input->post('name'), ENT_QUOTES);
			$data['code'] = $code;
			$data['code_2'] = $code_2;
			$data['amount'] = $this->input->post('amount');
			date_default_timezone_set('Asia/Calcutta');
			$data['date'] = date('Y/m/d');
			$data['type'] = $this->input->post('type');
			$data['delivery'] = $this->input->post('delivery-time')." ".$this->input->post('delivery-mode');
			$data['campaign'] = $this->input->post('campaign');
			$data['description'] =  htmlspecialchars($this->input->post('desc'), ENT_QUOTES);
			$data['about_the_offer'] =  htmlspecialchars($this->input->post('about_the_offer'), ENT_QUOTES);
			$data['quantity'] = $this->input->post('quantity_type');
			$data['quantity_amount'] = $this->input->post('quantity_amount');
			$data['active'] = "false";
			


			$query = $this->model->insertdata($data,'product');
			$query = $this->model->insertdata($userdata,'user_product');
			$campaign_detail = $this->model->fetchbyid($this->input->post('campaign'),"campaign");
			$campaign_name = $campaign_detail['name'];


			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$product_name = $this->input->post('name');
			$view_campaign_link = base_url()."campaign/c/".$campaign_detail['code'];
			$edit_link = base_url()."addproduct/edit/$code_2";
			$view_product = base_url()."product/p/".$code;
			$deactivate_link =  base_url()."addproduct/deactivate/$code_2";
			$activate_link =  base_url()."addproduct/activate/$code_2";
			$message = "Hello $username,\nYour Product ($product_name) has been successfully Added.But it is pending for Admin Approval.\n\nYour Product Has been listed under ($campaign_name) Campaign.\n$view_campaign_link\n\nAfter getting appproval from Admin you can view your Product Linked below. \n$view_product \n\n  If you want to Edit your Product details then click on below link \n$edit_link \n\nIf you want to Deactivate your Product/Service then click here.\n$deactivate_link";
			mail($email, "Yoo Product Management", $message);
			if($query)
			{
				//redirect to same page
				//because of post-request-get rule..
				//there is for Duplicate form submissions avoid..
				//start session for display message..
				$this->session->set_userdata('insert_product',"success");
				header("Location: " . site_url()."addproduct");
				
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
			$code_2 = $this->input->post('code_2');

			$userdata['name'] = $this->input->post('username');
			$userdata['phone'] = $this->input->post('mobile');
			$userdata['email'] = $this->input->post('email');
			$userdata['address'] = $this->input->post('address');


			$product_id = $this->input->post('product_id');
			$campaign_id = $this->input->post('campaign');
			$old_campaign_id = $this->input->post('old_campaign_id');


			$data['name'] = htmlspecialchars($this->input->post('name'), ENT_QUOTES);
			$data['amount'] = $this->input->post('amount');
			$data['type'] = $this->input->post('type');
			$data['delivery'] = $this->input->post('delivery-time')." ".$this->input->post('delivery-mode');
			$data['campaign'] = $this->input->post('campaign');
			$data['description'] =  htmlspecialchars($this->input->post('desc'), ENT_QUOTES);
			$data['about_the_offer'] =  htmlspecialchars($this->input->post('about_the_offer'), ENT_QUOTES);
			$data['quantity'] = $this->input->post('quantity_type');
			$data['quantity_amount'] = $this->input->post('quantity_amount');
			$data['active'] = "false";


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

			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$product_name = $this->input->post('name');
			$view_product = base_url()."product/p/".$this->input->post('code');
			$campaign_detail = $this->model->fetchbyid($this->input->post('campaign'),"campaign");
			$campaign_name = $campaign_detail['name'];

			$view_campaign_link = base_url()."campaign/c/".$campaign_detail['code'];
			$edit_link = base_url()."addproduct/edit/$code_2";
			$deactivate_link =  base_url()."addproduct/deactivate/$code_2";
			$activate_link =  base_url()."addproduct/activate/$code_2";

			$message = "Hello $username,\nYour Product ($product_name) has been successfully Updated.But it is pending for Admin Approval.\n\nYour Product Has been listed under ($campaign_name) Campaign.\n$view_campaign_link\n\nAfter getting appproval from Admin you can view your Product Linked below. \n$view_product \n\n  If you want to Edit your Product details then click on below link \n$edit_link \n\nIf you want to Deactivate your Product/Service then click here.\n$deactivate_link";
			mail($email, "Yoo Product Management", $message);

			if($query)
			{
				//redirect to same page 
				//because of post-request-get rule..
				//there is for Duplicate form submissions avoid..
				//start session for display message..
				$this->session->set_userdata('update_product',"success");
				header("Location: " . site_url()."addproduct");
				
			}
		}
		else
		{
			//fetch all campaign from database..
			//it is also used into footer..for display Recent Campaign..
			$data['campaign_detail'] = $this->model->fetchcampaign();

			//fetch all products from database..
			//it is also used into footer..for display Recent Products..
			$data['product_detail'] = $this->model->fetchproduct();


			//view product page and pass $data array..
			$data['page'] = "add-product";
			$this->load->view('template',$data);
		}

  
	}//end index function.



	function edit($code = "")
	{
		if($code != "")
		{
			$this->load->model('model');
			$data['product_data'] = $this->model->fetchbyfield('code_2',$code,'product');
			if($data['product_data'])
			{
				$data['user_data'] = $this->model->fetchbyfield('product',$code,'user_product');
				//fetch all campaign from database..
				//it is also used into footer..for display Recent Campaign..
				$data['campaign_detail'] = $this->model->fetchcampaign();

				//fetch all products from database..
				//it is also used into footer..for display Recent Products..
				$data['product_detail'] = $this->model->fetchproduct();
			
				//view product page and pass $data array..
				$data['page'] = "edit-product";
				$this->load->view('template',$data);
				
			}
			else
			{
	 			header("Location: " . site_url());
			}
		}
		else
		{
	 		header("Location: " . site_url());
		}
	}

	function deactivate($code = "")
	{
		if($code != "")
		{
			$this->load->model('model');
			$data['product_data'] = $this->model->fetchbyfield('code_2',$code,'product');
			if($data['product_data'])
			{
				$data['user_data'] = $this->model->fetchbyfield('product',$code,'user_product');
				
				//view product page and pass $data array.
				$this->load->view('delete-product',$data);
				
			}
			else
			{
	 			header("Location: " . site_url());
			}
		}
		else
		{
	 		header("Location: " . site_url());
		}
	}



	function deactivate_product()
	{
		$this->load->model('model');
		$product_id = $this->input->post('product_id');
		$user_name = $this->input->post('user_name');
		$email = $this->input->post('email');

		//get product details from product table from product table
		$product_detail = $this->model->fetchbyid($product_id,'product');
		$campaign_id = $product_detail['campaign'];
		$product_name = $product_detail['name'];

		//update status 0 into product table..
		$data['active'] = "false";
		$this->model->updatedata($data,$product_id,'product');

		//update number of product into campaign table..
		$update_data['num_of_product'] = $this->model->countproduct($campaign_id);
		$query = $this->model->updatedata($update_data,$campaign_id,'campaign');

		$message = "Hello $user_name,\nYour Product ($product_name) has been successfully Deactivated.";
		mail($email, "Yoo Product Management", $message);
		if($query)
		{
			//redirect to same page
			//because of post-request-get rule..
			//there is for Duplicate form submissions avoid..
			//start session for display message..
			
			header("Location: " . site_url());
			
		}
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