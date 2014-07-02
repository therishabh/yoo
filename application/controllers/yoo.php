<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Yoo extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();


		//view dashboard and pass $data array..
		$data['page'] = "how-it-works";
		$this->load->view('template',$data);
	}

	function terms()
	{
		
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();


		//view dashboard and pass $data array..
		$data['page'] = "terms-conditions";
		$this->load->view('template',$data);
	}

	function aboutus()
	{
		
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();


		//view dashboard and pass $data array..
		$data['page'] = "about-us";
		$this->load->view('template',$data);
	}

	function refundpolicy()
	{
		
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();


		//view dashboard and pass $data array..
		$data['page'] = "refund-policy";
		$this->load->view('template',$data);
	}

	function contactus()
	{
		
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		//it is also used into footer..for display Recent Products..
		$data['product_detail'] = $this->model->fetchproduct();


		//view dashboard and pass $data array..
		$data['page'] = "contact-us";
		$this->load->view('template',$data);
	}
}
?>