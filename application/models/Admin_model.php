<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function addstaff_to_users() {
        $notif = array();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => Utils::hash('sha1', $this->input->post('password'), AUTH_SALT),
            'role' => 7,
            'createdAt' => $date,
            'is_active' => $this->input->post('is_active') ? : 0
        );
        $this->db->insert('users', $data);
        $users_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
            $notif['user_id'] = $users_id;
        } else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

    public function addstaff_to_staff($data) {
        $notif = array();
       
        $this->db->insert('staff', $data);
        $users_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
            $notif['user_id'] = $users_id;
        } else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

    public function getstaff() {
        $notif = array();
    
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->join('users', 'users.users_id = staff.user_id'); 
        $query = $this->db->get();
        return $query; 
    }

}