<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Campaign extends CI_Controller
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

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();



		$number_of_campaign = $this->model->fetch_number_of_campaign();
		$display_campaign = 9;
		$pagination_num = ceil($number_of_campaign / $display_campaign);
		$data['pagination_num'] = $pagination_num;

		$data['total_campaign'] = $number_of_campaign;
		$data['display_campaign'] = $display_campaign;

		$data['campaign_detail'] = $this->model->fetch_campaign_with_limit($display_campaign);


		//view product page and pass $data array..
		$data['page'] = "campaign";
		$this->load->view('template',$data);	
  
	}//end index function.

	//function for view individual campaign..
	function c($code = "")
	{
		//load model
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();

		//if code is not empty then display individual campaign according to code..
		if($code != "")
		{
			$data['campaign_view'] = $this->model->fetchbyfield('code',$code,'campaign');
			$campaign_id = $data['campaign_view']['id'];
			$data['campaign_product'] =  $this->model->fetchcampaignproduct($campaign_id);

			if($data['campaign_view'])
			{
				//view product page and pass $data array..
				$data['page'] = "campaign-view";
				$this->load->view('template',$data);
			}
			else
			{
				header("Location: " . site_url()."campaign");
			}

		}
		//if code is empty then display all campaigns..
		else
		{
			header("Location: " . site_url()."campaign");		
		}
	}

}

?>