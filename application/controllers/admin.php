<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Admin extends CI_Controller
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
		

		// check login if session is isset or not
		//execute if session is set that means user is already login.
		if( $this->session->userdata('yoousername') )
		{
			//view dashboard and pass $data array..
			header("Location: " . site_url()."dashboard");
		}
		//execute when session is not set and click on login button
		else if( $this->input->post('submit_btn') )
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username',"Username",'required|trim');
			$this->form_validation->set_rules('password','Password','required');
			//if form is not successfully submited
			if( $this->form_validation->run() == FALSE )
			{
				$data['error'] = "Please Enter Username and Password !";
				//view dashboard and pass $data array..
				$data['page'] = "login";
				$this->load->view('template',$data);			
			}
			//execute if form is successfully submited..
			//then check login credintial..
			else
			{
				//get username and paassword from form..
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				//check login authontication..
				$check_login = $this->model->check_login($username,$password);

				//check if check_login is true..
				if($check_login)
				{
					$this->session->set_userdata('yoousername',$username);
					
					//display dashboard and pass userdetails..
					//view dashboard and pass $data array..
					 header("Location: " . site_url()."dashboard");
					
				}
				else
				{
					$data['error'] = "Enter Correct Username and Password !";
					//view dashboard and pass $data array..
					$data['page'] = "login";
					$this->load->view('template',$data);		
				}
			}
		}
		else
		{
			//view dashboard and pass $data array..
			$data['page'] = "login";
			$this->load->view('template',$data);
			
		}

		
	}//end index function.
	
}

?>