<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_portal extends CI_Controller {

	public function __contruct()
	{
			parent::__contruct();

			$this->load->model('account_model');
			$is_logged_in = $this->account_model->is_user_logged();

			if( $is_logged_in )
			{
					if( $_SESSION['role'] == USER_ROLE_VISITOR)
					{
						redirect('/');	
					}
			}
			else
			{
					redirect('/');
			}
	}


	public function index()
	{
			// $this->load->view('visitor_portal/_header');
			// $this->load->view('visitor_portal/index');
			// $this->load->view('visitor_portal/_footer');

			$this->personal_information();

	}


	public function personal_information()
	{
		$this->load->model('user_model');

		$id = $_SESSION['user_id'];
		$data['profile'] = $this->user_model->get_profile_information($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/personal_information');
		$this->load->view('visitor_portal/_footer');
	}

	public function programming_skills()
	{
		$this->load->model('user_model');

		$id = $_SESSION['user_id'];
		$data['skills'] = $this->user_model->get_programming_skills($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/programming_skills');
		$this->load->view('visitor_portal/_footer');
	}

}