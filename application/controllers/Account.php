<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();

        // Utils::no_cache();
        // if ($this->session->userdata('logged_in')) {
        //     redirect(base_url('dashboard'));
        //     exit;
        // }
        $this->session_user = $this->session->userdata('logged_in');
    }

    public function index () {
        $this->load->view('dashboard');
    }

    public function login() {
        $data['title'] = 'Login';
        $this->load->model('auth_model');

        if (count($_POST)) {
            $this->load->helper('security');
            $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data['notif'] = $this->auth_model->Authentification();
            }
        }

        if ($this->session->userdata('logged_in')) {
            $user = $this->session->userdata('logged_in');
            if($user['role'] == 8) {
                redirect(base_url('account/admin'));
                exit;
            }else{
                redirect(base_url('dashboard'));
                exit;
            }
        }

        $this->load->view('templates/header',$data);
        $this->load->view('templates/login');
        $this->load->view('templates/footer');
    }

    public function register() {
        $data['title'] = 'Register';
        $this->load->model('auth_model');

        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]|min_length[6]|alpha_numeric|callback_password_check');
            
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data['notif'] = $this->auth_model->register();
            }
        }

        if ($this->session->userdata('logged_in')) {
            redirect(base_url('dashboard'));
            exit;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/register');
        $this->load->view('templates/footer');
    }

    public function dashboard() {

        $data['title'] = 'Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/home');
        $this->load->view('templates/footer');
    }

    public function forgot_password() {
        $data['title'] = 'Forgot password';
        $this->load->model('auth_model');

        if (count($_POST)) {
            $this->load->helper('security');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $result = $this->auth_model->check_email($this->input->post('email'));
                if($result){
                    $data['notif']['message'] = 'Implement the function to send the email';
                    $data['notif']['type'] = 'success';
                }
                else{
                    $data['notif']['message'] = 'This email does not exist on the system';
                    $data['notif']['type'] = 'danger';
                }
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/forgot_password');
        $this->load->view('templates/footer');
    }

    public function password_check($str) {
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
            return true;
        }
        return false;
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect(base_url('/'));
    }
    /* admin routes */

    public function admin() {

        $data['title'] = 'ADMIN';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }
        $this->load->view('admin/home');
    }

    public function staff() {

        $data['title'] = 'Add Staff';
        $this->load->model('auth_model');
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }

        $data['staff'] =$this->auth_model->getstaff();

        $this->load->view('admin/staff',$data);
    }

    public function addstaff() {
        $data['title'] = 'Add Staff';
        $this->load->model('auth_model');
    
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]|min_length[6]|alpha_numeric|callback_password_check');
            
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|numeric|is_unique[staff.phone]');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data['notif'] = $this->auth_model->addstaff_to_users();
                $user_id = $data['notif']['user_id'];
                $data = array(
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'gender' => $this->input->post('gender'),
                    'designation' => $this->input->post('designation'),
                    'salary' => $this->input->post('salary'),
                    'dob' => $this->input->post('dob'),
                    'gender' =>$this->input->post('gender'),
                    'user_id' =>$user_id
                );
                $data['notif'] = $this->auth_model->addstaff_to_staff($data);
            }
        }
        $this->load->view('admin/staff',$data);
    }

    public function category() {

        $data['title'] = 'Category';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }
        $this->load->view('admin/category',$data);
    }

    /* customer routes */

    public function profile() {

        $data['title'] = 'Profile';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }else{
            redirect(base_url('dashboard'));
            exit;
        }
        $this->load->model('auth_model');
    
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|numeric|is_unique[customer.cus_phone]');
            
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                if ($this->session->userdata('logged_in')) {
                    $user = $this->session->userdata('logged_in');
                    $user_id = $user['users_id'];
                
                    $data = array(
                    'cus_phone' => $this->input->post('phone'),
                    'cus_address' => $this->input->post('address'),
                    'users_id' =>$user_id
                    );
                    $data['notif'] = $this->auth_model->customerprofile($data);
                }
            }
        }
        $this->load->view('templates/account',$data);
    }

    public function customerprofile() {

        $data['title'] = 'Profile';
       
        $this->load->view('templates/account');
    }

    
}