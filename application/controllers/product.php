<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Product extends CI_Controller
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

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..

		$number_of_product = $this->model->fetch_number_of_product();
		$display_product = 9;
		$pagination_num = ceil($number_of_product / $display_product);
		$data['pagination_num'] = $pagination_num;

		$data['total_product'] = $number_of_product;
		$data['display_product'] = $display_product;

		$data['product_detail'] = $this->model->fetch_product_with_limit($display_product);
		
		//view product page and pass $data array..
		$data['page'] = "product";
		$this->load->view('template',$data);
  
	}//end index function.

	//function for view individual product..
	function p($code = "")
	{
		//load model..
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();

		//if code is not empty then display individual product according to code..
		if($code != "")
		{
			$data['product_view'] = $this->model->fetchbyfield('code',$code,'product');
			$campaign_id = $data['product_view']['campaign'];
			$data['campaign_view'] =  $this->model->fetchbyid($campaign_id,'campaign');
			
			if($data['product_view'])
			{
				//view product page and pass $data array..
				$data['page'] = "product-view";
				$this->load->view('template',$data);
			}
			else
			{
				header("Location: " . site_url()."product");
			}
		}
		//if code is empty then display all products..
		else
		{
			header("Location: " . site_url()."product");
		}
	}

	//function for view individual product..
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

		//if code is not empty then display campaign products according to campaign code..
		if($code != "")
		{
			$data['campaign_view'] = $this->model->fetchbyfield('code',$code,'campaign');
			$campaign_id = $data['campaign_view']['id'];
			$data['campaign_product'] =  $this->model->fetchcampaignproduct($campaign_id);

			if($data['campaign_view'])
			{
				//view product page and pass $data array..
				$data['page'] = "campaign-product";
				$this->load->view('template',$data);
			}
			else
			{
				header("Location: " . site_url()."product");
			}
		}
		//if code is empty then display all products..
		else
		{
			header("Location: " . site_url()."product");
		}
	}
	
}

?>