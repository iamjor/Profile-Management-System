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

	public function personal_information_edit()
	{
		$this->_personal_information_edit_submit();
		
		$this->load->model('user_model');

		$id = $_SESSION['user_id'];
		$data['profile'] = $this->user_model->get_profile_information($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/personal_information_edit');
		$this->load->view('visitor_portal/_footer');
	}

	public function _personal_information_edit_submit()
  {
      if( $this->input->post('submit') )
      {   
          $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
          $this->form_validation->set_rules('mname', 'Middle Name', 'trim|required');
          $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');


          if ($this->form_validation->run() != FALSE)
          {
            $this->load->model('user_model');
            $response = $this->user_model->update_post_record();
  
            if( $response )
            {
                $this->session->set_flashdata('submit_success', 'The data was successfully updated.');

								redirect('visitor_portal/personal_information');
            }
            else
            {
                $this->session->set_flashdata('submit_error', 'Sorry! An error occur the data was not updated.');

								redirect('visitor_portal/personal_information_edit');
            }
					}
      }
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

	public function programming_skills_edit()
	{
		$this->_programming_skills_edit_submit();
		
		$this->load->model('user_model');

		$id = $_SESSION['user_id'];
		$data['skills'] = $this->user_model->get_programming_skills($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/programming_skills_edit');
		$this->load->view('visitor_portal/_footer');
	}

	public function _programming_skills_edit_submit()
  {
      if( $this->input->post('submit') )
      {   
          $this->form_validation->set_rules('prog_languages', 'Programming Languages', 'trim|required');

          if ($this->form_validation->run() != FALSE)
          {
            $this->load->model('user_model');
            $response = $this->user_model->update_post_programming_skills();
  
            if( $response )
            {
                $this->session->set_flashdata('submit_success', 'The data was successfully updated.');

								redirect('visitor_portal/programming_skills');
            }
            else
            {
                $this->session->set_flashdata('submit_error', 'Sorry! An error occur the data was not updated.');

								redirect('visitor_portal/programming_skills_edit');
            }
					}
      }
  }

}