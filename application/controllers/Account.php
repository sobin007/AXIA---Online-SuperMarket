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
            redirect(base_url('dashboard'));
            exit;
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


        /*
         * Load view
         */
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

    public function profile() {

        $data['title'] = 'Profile';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }

        $this->load->view('templates/headerprofile', $data);
        $this->load->view('templates/account');
        // $this->load->view('templates/footer');
    }

    public function admin() {

        $data['title'] = 'ADMIN';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }

        $this->load->view('admin/home');
        // $this->load->view('templates/footer');
    }

    /**
     *           
     */
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

        /*
         * Load view
         */
        $this->load->view('templates/header', $data);
        $this->load->view('templates/forgot_password');
        $this->load->view('templates/footer');
    }

    /*
     * Custom callback function
     */

    public function password_check($str) {
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
            return true;
        }
        return false;
    }
    
        /*
     * 
     */

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect(base_url('/'));
    }
    
}