<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Setting extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->model('model');


		//view dashboard and pass $data array..
		$data['page'] = "setting";
		$this->load->view('backend-template',$data);
	}
}
?>