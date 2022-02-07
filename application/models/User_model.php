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

    public function update_post_record()
    {
        $user_id = (int) $this->input->post('user_id');
        
        $fname = (string) $this->input->post('fname');
        $mname = (string) $this->input->post('mname');
        $lname = (string) $this->input->post('lname');
        $xname = (string) $this->input->post('xname');
        
        $data = array(
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'xname' => $xname,
        );
        
        $this->db->where('user_id', $user_id);
        $response = $this->db->update('users', $data);

        if( $response )
        {   
            $this->update_post_personal_information();
            return $user_id;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_post_personal_information()
    {
        $user_id = (int) $this->input->post('user_id');
        
        $dob = (string) $this->input->post('dob');
        $pob = (string) $this->input->post('pob');
        $gender = (string) $this->input->post('gender');
        $cstatus = (string) $this->input->post('cstatus');
        $email = (string) $this->input->post('email');
        $contact_no = (string) $this->input->post('contact_no');
        
        $data = array(
            'user_id' => $user_id,
            'dob' => $dob,
            'pob' => $pob,
            'gender' => $gender,
            'cstatus' => $cstatus,
            'email' => $email,
            'contact_no' => $contact_no,
        );

        if( $this->is_personal_information_exist($user_id) )
        {   
            $this->db->where('user_id', $user_id);
            $response = $this->db->update('personal_information', $data);
        
            if( $response )
            {
                return $user_id;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            $response = $this->db->insert('personal_information', $data);
        
            if( $response )
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }
        }

    }


    public function is_personal_information_exist($id) 
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('personal_information');
        $row = $query->row();

        if( $row )
        {
            return TRUE;
        }

        return FALSE;
    }

    public function update_post_programming_skills()
    {
        $user_id = (int) $this->input->post('user_id');
        
        $prog_languages = (string) $this->input->post('prog_languages');
        $backend_frameworks = (string) $this->input->post('backend_frameworks');
        $frontend_frameworks = (string) $this->input->post('frontend_frameworks');
        
        $data = array(
            'user_id' => $user_id,
            'prog_languages' => $prog_languages,
            'backend_frameworks' => $backend_frameworks,
            'frontend_frameworks' => $frontend_frameworks,
        );

        if( $this->is_programming_skills_exist($user_id) )
        {   
            $this->db->where('user_id', $user_id);
            $response = $this->db->update('programming_skills', $data);
        
            if( $response )
            {
                return $user_id;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            $response = $this->db->insert('programming_skills', $data);
        
            if( $response )
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }
        }

    }

    public function is_programming_skills_exist($id) 
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('programming_skills');
        $row = $query->row();

        if( $row )
        {
            return TRUE;
        }

        return FALSE;
    }

    public function update_post_profile_picture($file_name)
    {
        $user_id = (int) $this->input->post('user_id');  

        $data = array(
            'user_id' => $user_id,
            'photo' => $file_name,
        );

        if( $this->is_personal_information_exist($user_id) )
        {   
            $this->db->where('user_id', $user_id);
            $response = $this->db->update('personal_information', $data);
        
            if( $response )
            {
                return $user_id;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            $response = $this->db->insert('personal_information', $data);
        
            if( $response )
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }
        }

    }

}

