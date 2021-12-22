<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function save_post_record()
    {
        $fname = (string) $this->input->post('fname');
        $mname = (string) $this->input->post('mname');
        $lname = (string) $this->input->post('lname');
        $xname = (string) $this->input->post('xname');
        $username = (string) $this->input->post('username');
        $password = (string) $this->input->post('password');
        $password = md5($password);
        
        $data = array(
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'xname' => $xname,
            'username' => $username,
            'password' => $password,
            'role' => USER_ROLE_VISITOR
        );

        $response = $this->db->insert('users', $data);

        if( $response )
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }
    }


    public function get_profile_information($id) 
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        $row = $query->row();

        if( $row )
        {
            $row->personal_information = $this->get_personal_information($id);
            $row->programming_skills = $this->get_programming_skills($id);
        }

        return $row;
    }

    public function get_personal_information($id) 
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('personal_information');
        $row = $query->row();

        if( empty($row) )
        {
            $row = array(
                'dob' => '',
                'pob' => '',
                'gender' => '',
                'cstatus' => '',
                'email' => '',
                'contact_no' => '',
                'photo' => '',
                );
        }
        return (object) $row;
    }

    public function get_programming_skills($id) 
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('programming_skills');
        $row = $query->row();

        if( empty($row) )
        {
            $row = array(
                'prog_languages' => '',
                'backend_frameworks' => '',
                'frontend_frameworks' => '',
                );
        }

        return (object) $row;
    }

}