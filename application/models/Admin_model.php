<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function addstaff_to_users() {
        $notif = array();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $data = array(
            'uname' => $this->input->post('uname'),
            'email' => $this->input->post('email'),
            'password' => Utils::hash('sha1', $this->input->post('password'), AUTH_SALT),
            'role' => 7,
            'createdAt' => $date,
            'is_active' => $this->input->post('is_active') ? : 1
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
            unset($_POST);
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
        $this->db->where('status',1);
        $query = $this->db->get();
        return $query; 
    }

    public function getstaffOnHold() {
        $notif = array();
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('status',0);
        $query = $this->db->get();
        return $query; 
    }

    public function getStaffOne($staff_id) {
        $staffedit = array();
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('staff_id',$staff_id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $staffedit['first_name'] = $row->first_name;
            $staffedit['last_name'] = $row->last_name;
            $staffedit['address'] = $row->address;
            $staffedit['phone'] = $row->phone;
            $staffedit['designation'] = $row->designation;
            $staffedit['salary'] = $row->salary;
            $staffedit['dob'] = $row->dob;
            $staffedit['gender'] = $row->gender;
        }
        return $staffedit; 
    }

    public function edit_staff_details($data, $staff_id) {
        $this->db->where('staff_id', $staff_id);
        $this->db->update('staff',$data);
    }

    public function deleteStaff($staff_id) {
        $this->db->where('staff_id', $staff_id);
        $this->db->delete('staff');
        if($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
        }else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

    public function update_disable_Staff($data,$staff_id) {
        $this->db->where('staff_id', $staff_id);
        $this->db->update('staff',$data);
    }

    public function update_disable_User($data,$users_id) {
        $this->db->where('users_id', $users_id);
        $this->db->update('users',$data);
    }

    public function getAllCategory() {
        $notif = array();
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        return $query; 

    }

    public function addcategory($data) {
        $notif = array();
        $this->db->insert('category', $data);
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

    public function delete($cat_id) {
        $this->db->where('cat_id', $cat_id);
        $this->db->delete('category');
        if($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
        }else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

   

   


    public function addsubcategory($data) {
        $notif = array();
        $this->db->insert('subcategory', $data);
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

    public function getAllSubCategory() {
        $notif = array();
        $this->db->select('*');
        $this->db->from('subcategory');
        $query = $this->db->get();
        return $query; 

    }

    public function viewsubcategory($cat_id) {
        $notif = array();
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('cat_id', $cat_id); 
        $query = $this->db->get();
        return $query; 
    }

    public function deleteSubCategory($subcat_id) {
        $this->db->where('subcat_id', $subcat_id);
        $this->db->delete('subcategory');
        if($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
        }else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

    /* Customer models for admin */

    public function getCustomer() {
        $notif = array();
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->join('users', 'users.users_id = customer.users_id'); 
        $query = $this->db->get();
        return $query; 
    }

    /* Product models for admin */

    public function getAllProduct() {
        $notif = array();
        $this->db->select('*');
        $this->db->from('products'); 
        $query = $this->db->get();
        return $query; 
    }

    public function AddProduct($data) {
        $notif = array();
        $this->db->insert('products', $data);
        $product_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $notif['message'] = 'Saved successfully';
            $notif['type'] = 'success';
        } else {
            $notif['message'] = 'Something wrong !';
            $notif['type'] = 'danger';
        }
        return $notif;
    }

}
