<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('logged_in');
    }

    public function index () {
        $this->load->view('admin/staff');
    }

    public function home () {
        $data['title'] = 'Staff';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }
        $this->load->view('admin/staff');
    }

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