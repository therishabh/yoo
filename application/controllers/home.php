<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent :: __construct();
	}

	function index()
	{
		
		$this->load->model('model');

		//fetch all campaign from database..
		//it is also used into footer..for display Recent Campaign..
		$data['campaign_detail'] = $this->model->fetchcampaign();

		//fetch all products from database..
		$data['product_detail'] = $this->model->fetchproduct();

		//view dashboard and pass $data array..
		$data['page'] = "index";
		$this->load->view('template',$data);
		
	}//end index function.
	
}

?>