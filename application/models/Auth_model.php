<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public function Authentification() {
        $notif = array();
        $email = $this->input->post('email');
        $password = Utils::hash('sha1', $this->input->post('password'), AUTH_SALT);

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($row->is_active != 1) {
                $notif['message'] = 'Your account is disabled !';
                $notif['type'] = 'warning';
            } else {
                $sess_data = array(
                    'users_id' => $row->users_id,
                    'uname' => $row->uname,
                    'email' => $row->email,
                    'role' => $row->role
                );
                if($row->role == 1){
                    $this->session->set_userdata('logged_in', $sess_data);
                    $this->update_last_login($row->users_id);
                }else if($row->role == 7){
                    $this->session->set_userdata('stafflogged_in', $sess_data);
                    $this->update_last_login($row->users_id); 
                }else{
                    $this->session->set_userdata('adminlogged_in', $sess_data);
                    $this->update_last_login($row->users_id);
                }
            }
        } else {
            $notif['message'] = 'Username or password incorrect !';
            $notif['type'] = 'danger';
        }

        return $notif;
    }

    
    private function update_last_login($users_id) {
        $sql = "UPDATE users SET last_login = NOW() WHERE users_id=" . $this->db->escape($users_id);
        $this->db->query($sql);
    }

    public function register() {
        $notif = array();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $data = array(
            'uname' => $this->input->post('uname'),
            'email' => $this->input->post('email'),
            'password' => Utils::hash('sha1', $this->input->post('password'), AUTH_SALT),
            'role' => 1,
            'createdAt' => $date,
            'is_active' => $this->input->post('is_active') ? : 0
        );
        $this->db->insert('users', $data);
        $users_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
            unset($_POST);
        } else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

    public function check_email($email) {
        $sql = "SELECT * FROM users WHERE email = " . $this->db->escape($email);
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            $row = $res->row();
            return $row;
        }
        return null;
    }

    /* Customer Profile Routes */

    public function addCustomer($data) {
        $notif = array();
        $this->db->insert('customer', $data);
        $users_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
        } else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

    public function getCustomerOne($customer_id) {
        $customer = array();
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('users_id',$customer_id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            //$customer = $row;
            $customer['first_name'] = $row->cus_first_name;
            $customer['last_name'] = $row->cus_last_name;
            $customer['gender'] = $row->cus_gender;
            $customer['address'] = $row->cus_address;
            $customer['dob'] = $row->cus_dob;
            $customer['phone'] = $row->cus_phone;
        }
        return $customer; 
    }
}
