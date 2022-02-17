<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_portal extends CI_Controller {

	protected $data;

	public function __contruct()
	{
			parent::__contruct();

			$this->load->model('account_model');
			$is_logged_in = $this->account_model->is_user_logged();

			if( $is_logged_in )
			{
					if( $_SESSION['role'] == USER_ROLE_ADMIN || $_SESSION['role'] != USER_ROLE_MANAGER )
					{
						redirect('/');	
					}
  		}
			else
			{
					redirect('/');
			}
  
			$this->load->model('user_model');
			
			$id = $_SESSION['user_id'];
			$this->data['profile'] = $this->user_model->get_profile_information($id);

	}

	public function index()
	{
			$this->users_list();
	}

	public function users_list()
	{
		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_active_users();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/users_list');
		$this->load->view('admin_portal/_footer');
	}

  public function users_list_deactivated()
	{
		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_deactivated_users();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/users_list_deactivated');
		$this->load->view('admin_portal/_footer');
	}

  public function visitors_list()
	{
		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_active_visitors();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/visitors_list');
		$this->load->view('admin_portal/_footer');
	}

  public function visitors_list_deactivated()
	{
		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_deactivated_visitors();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/visitors_list_deactivated');
		$this->load->view('admin_portal/_footer');
	}

  public function add_user()
	{
		$this->add_user_submit();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/add_user');
		$this->load->view('admin_portal/_footer');
	}

	public function add_user_submit()
  {
      if( $this->input->post('submit') )
      {   
          $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
          $this->form_validation->set_rules('mname', 'Middle Name', 'trim|required');
          $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
          $this->form_validation->set_rules('username', 'Username', 'trim|required');
          $this->form_validation->set_rules('password', 'Password', 'trim|required');
          $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password] ');
					$this->form_validation->set_rules('role', 'Role', 'trim|required');

          if ($this->form_validation->run() != FALSE)
          {
            $this->load->model('user_model');
            $response = $this->user_model->save_post_record_admin();
  
            if( $response )
            {
                $this->session->set_flashdata('submit_success', 'The data was successfully saved.');
            }
            else
            {
                $this->session->set_flashdata('submit_error', 'Sorry! An error occur the data was not saved.');
            }
  
            redirect('admin_portal/add_user');
          }
      }
  }

	public function edit_user($id = '')
	{	
		$this->load->model('user_model');
		if( !$this->user_model->is_user_exist($id) )
		{
			redirect('admin_portal/users_list');
		}

		$this->edit_user_submit();

		$this->data['user'] = $this->user_model->get_user($id);

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/edit_user');
		$this->load->view('admin_portal/_footer');
	}

	public function edit_user_submit()
  {
      if( $this->input->post('submit') )
      {   
          $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
          $this->form_validation->set_rules('mname', 'Middle Name', 'trim|required');
          $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
          $this->form_validation->set_rules('username', 'Username', 'trim|required');
					$this->form_validation->set_rules('role', 'Role', 'trim|required');

          if ($this->form_validation->run() != FALSE)
          {
            $this->load->model('user_model');
            $response = $this->user_model->update_post_record_admin();
  
            if( $response )
            {
                $this->session->set_flashdata('submit_success', 'The data was successfully updated.');
            }
            else
            {
                $this->session->set_flashdata('submit_error', 'Sorry! An error occur the data was not updated.');
            }
  
            redirect('admin_portal/users_list');
          }
      }
  }

	public function deactivate_user($id = '')
	{		
			$this->load->model('user_model');
			if( !$this->user_model->is_user_exist($id) )
			{
				redirect('admin_portal/users_list');
			}

			if( $id == $_SESSION['user_id'])
			{
				redirect('admin_portal/users_list');
			}

			$response = $this->user_model->deactivate_user($id);

			if( $response )
			{
					$this->session->set_flashdata('submit_success', 'The user was successfully deactivated.');
			}
			else
			{
					$this->session->set_flashdata('submit_error', 'Sorry! An error occur the user was not deactivated.');
			}

			redirect('admin_portal/users_list');
	}

	public function reactivate_user($id = '')
	{		
			$this->load->model('user_model');
			if( !$this->user_model->is_user_exist($id) )
			{
				redirect('admin_portal/users_list_deactivated');
			}

			$this->load->model('user_model');
			$response = $this->user_model->reactivate_user($id);

			if( $response )
			{
					$this->session->set_flashdata('submit_success', 'The user was successfully reactivated.');
			}
			else
			{
					$this->session->set_flashdata('submit_error', 'Sorry! An error occur the user was not reactivated.');
			}

			redirect('admin_portal/users_list_deactivated');
	}

	public function deactivate_visitor($id = '')
	{		
			$this->load->model('user_model');
			if( !$this->user_model->is_user_exist($id) )
			{
				redirect('admin_portal/visitors_list');
			}

			$response = $this->user_model->deactivate_visitor($id);

			if( $response )
			{
					$this->session->set_flashdata('submit_success', 'The visitor was successfully deactivated.');
			}
			else
			{
					$this->session->set_flashdata('submit_error', 'Sorry! An error occur the visitor was not deactivated.');
			}

			redirect('admin_portal/visitors_list');
	}

	public function reactivate_visitor($id = '')
	{		
			$this->load->model('user_model');
			if( !$this->user_model->is_user_exist($id) )
			{
				redirect('admin_portal/visitors_list_deactivated');
			}

			$this->load->model('user_model');
			$response = $this->user_model->reactivate_user($id);

			if( $response )
			{
					$this->session->set_flashdata('submit_success', 'The visitor was successfully reactivated.');
			}
			else
			{
					$this->session->set_flashdata('submit_error', 'Sorry! An error occur the visitor was not reactivated.');
			}

			redirect('admin_portal/visitors_list_deactivated');
	}

}
