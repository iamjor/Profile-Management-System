<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

    public function verify_login()
    {
        $username = (string) $this->input->post('username');
        $password = (string) $this->input->post('password');
        $password = md5($password);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('status', 'active');
        $query = $this->db->get('users');
        $row = $query->row();

        if( $row )
        { 
            $this->set_user_session($row);

            return TRUE;
        }

        return FALSE;

    }

    
    public function set_user_session($row)
    {
      $newdata = array(
        'user_id'  => $row->user_id,
        'username'  => $row->username,
        'lname'  => $row->lname,
        'fname'  => $row->fname,
        'mname'  => $row->mname,
        'xname'  => $row->xname,
        'role'  => $row->role, 
        'logged_in' => TRUE
      );

      $this->session->set_userdata($newdata);
    }


    public function is_user_logged_in()
    {
        if( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE)
        {
            return TRUE;
        }

        return FALSE;
    }


    public function logout()
    {
      session_destroy();
    }

}