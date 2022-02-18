<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$this->load->view('account/_header');
    $this->load->view('account/index');
    $this->load->view('account/_footer');
	}

  public function registration()
	{
    $this->_registration_submit();

    $this->load->view('account/_header');
    $this->load->view('account/registration');
    $this->load->view('account/_footer');
	}


  public function _registration_submit()
  {
      if( $this->input->post('submit') )
      {   
          $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
          $this->form_validation->set_rules('mname', 'Middle Name', 'trim|required');
          $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
          $this->form_validation->set_rules('username', 'Username', 'trim|required');
          $this->form_validation->set_rules('password', 'Password', 'trim|required');
          $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password] ');

          if ($this->form_validation->run() != FALSE)
          {
            $this->load->model('user_model');
            $response = $this->user_model->save_post_record();
  
            if( $response )
            {
                $this->session->set_flashdata('submit_success', 'The data was successfully saved.');
            }
            else
            {
                $this->session->set_flashdata('submit_error', 'Sorry! An error occur the data was not saved.');
            }
  
            redirect('account/registration');
          }
      }
  }

  public function login()
	{
    $this->_login_submit();

    $this->load->view('account/_header');
    $this->load->view('account/login');
    $this->load->view('account/_footer');
	}

  public function _login_submit()
  {
      if( $this->input->post('submit') )
      {   
          $this->form_validation->set_rules('username', 'Username', 'trim|required');
          $this->form_validation->set_rules('password', 'Password', 'trim|required');

          if ($this->form_validation->run() != FALSE)
          {
            $this->load->model('account_model');
            $response = $this->account_model->verify_login();
  
            if( $response )
            {
                if( isset($_SESSION['role']) && ($_SESSION['role'] == USER_ROLE_ADMIN || $_SESSION['role'] == USER_ROLE_MANAGER ))
                {
                    redirect('admin_portal');
                }
                else
                {
                    redirect('visitor_portal');
                }  
            }
            else
            {
                $this->session->set_flashdata('submit_error', 'Sorry! Unknown Account.');
                redirect('account/login');
            }
  
          }
      }
  }

  public function logout()
	{   
        $this->load->model('account_model');
        $response = $this->account_model->logout();
        
        redirect('/');
	}

}
