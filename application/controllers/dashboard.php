<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent :: __construct();
	}

	function index()
	{
		
		$this->load->model('model');

		//fetch $username details from database..
		$username = $this->session->userdata('yoousername');
		$data['user_detail'] = $this->model->fetchbyfield('username',$username,'admin');

		//fetch number of campaign from database..
		$data['number_of_campaign'] = $this->model->number_of_campaign();

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		$data['product_detail'] = $this->model->fetchproduct();
	
		//view dashboard and pass $data array..
		$data['page'] = "dashboard";
		$this->load->view('backend-template',$data);
	
		
	}//end index function.
	
}

?>