<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('adminlogged_in');
    }

    public function index () {
        $data['title'] = 'Staff';
        if ($this->session->userdata('adminlogged_in')) {
            $data['session_user'] = $this->session_user;
            $this->load->view('admin/staff/staff');
        }else{
            redirect('Dashboard/home');
            exit;
        }
    }
    public function home(){
        $data['title'] = 'Staff';
        if ($this->session->userdata('adminlogged_in')) {
            $data['session_user'] = $this->session_user;
            $this->load->view('admin/staff/staff');
        }else{
            redirect('Dashboard/home');
            exit;
        }
    }

    public function staff() {

        $data['title'] = 'Add Staff';
        $this->load->model('Admin_model');
        if ($this->session_user) {
            $data['session_user'] = $this->session_user;
            $data['staff'] =$this->Admin_model->getstaff();
            $this->load->view('admin/staff/staff',$data);
        }
    }

    public function staffOnHold() {
        $data['title'] = 'Staff On Hold';
        $this->load->model('Admin_model');
        if ($this->session_user) {
            $data['session_user'] = $this->session_user;
            $data['staff'] =$this->Admin_model->getstaffOnHold();
            $this->load->view('admin/staff/staffonhold',$data);
        }
    }

    public function addstaff() {

        $data['title'] = 'Add Staff';
        $this->load->model('Admin_model');
    
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('uname', 'User name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            //$this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]|min_length[6]|alpha_numeric|callback_password_check');
            
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|numeric|is_unique[staff.phone]');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data['notif'] = $this->Admin_model->addstaff_to_users();
                $user_id = $data['notif']['user_id'];
                $data = array(
                    'first_name'=> $this->input->post('first_name'),
                    'last_name'=>$this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'designation' => $this->input->post('designation'),
                    'salary' => $this->input->post('salary'),
                    'dob' => $this->input->post('dob'),
                    'gender' =>$this->input->post('gender'),
                    'user_id' =>$user_id
                );
                $data['notif'] = $this->Admin_model->addstaff_to_staff($data);
            }
        }
        $this->load->view('admin/staff/addstaff',$data);
    }

    public function deleteStaff($id) {
        if($this->session->userdata('adminlogged_in')){
            $this->load->model('Admin_model');
            $this->Admin_model->deleteStaff($id);
            redirect(base_url('Staff/staff'));
            exit;
        }
       
    }

    public function update_staff_status($id) {
        if($this->session->userdata('adminlogged_in')){
            $this->load->model('Admin_model');
            $data = array(
                'status'=> 0
            );
            $this->Admin_model->update_disable_Staff($data,$id);
            $user =$this->Admin_model->getStaffOne($id);
            $user_id = $user['user_id'];
            $data1 = array(
                'is_active'=> 0
            );
            $this->Admin_model->update_disable_User($data1,$user_id);
            redirect(base_url('Staff/staff'));
            exit;
        }
    }

    public function update_staff_status_enable($id) {
        if($this->session->userdata('adminlogged_in')){
            $this->load->model('Admin_model');
            $data = array(
                'status'=> 1
            );
            $this->Admin_model->update_disable_Staff($data,$id);
            $user =$this->Admin_model->getStaffOne($id);
            $user_id = $user['user_id'];
            $data1 = array(
                'is_active'=> 1
            );
            $this->Admin_model->update_disable_User($data1,$user_id);
            redirect(base_url('Staff/staffOnHold'));
            exit;
        }
    }

    public function editStaff($id) {

        $data['title'] = 'Edit Staff';
        $this->load->model('Admin_model');
        if ($this->session->userdata('adminlogged_in')) {
            $data['session_user'] = $this->session_user;
        }
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|numeric');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            
            
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $staffedit = array(
                    'first_name'=>$this->input->post('first_name'),
                    'last_name'=>$this->input->post('last_name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'designation' => $this->input->post('designation'),
                    'salary' => $this->input->post('salary'),
                    'gender'=> $this->input->post('gender'),
                    'dob'=>$this->input->post('dob')
                );
                $data['notif'] = $this->Admin_model->edit_staff_details($staffedit,$id);
            }
        }

        $data['staff'] =$this->Admin_model->getStaffOne($id);
        $this->load->view('admin/staff/editstaff',$data);
    }

}