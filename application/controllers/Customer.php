<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('logged_in');
    }


    public function home() {
        $data['title'] = 'Customer';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
            $this->load->view('templates/homeheader', $data);
            $this->load->view('templates/home');
            $this->load->view('templates/footer');
        }else{
            redirect(base_url('dashboard'));
            exit;
        }
        
    }

    public function profile() {

        $data['title'] = 'Customer';
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('dashboard'));
            exit;
        }else{
            $user = $this->session->userdata('logged_in');
            $user_id = $user['users_id'];
        }
        
        $this->load->model('auth_model');
    
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|numeric|is_unique[customer.cus_phone]');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                if ($this->session->userdata('logged_in')) {
                    $user = $this->session->userdata('logged_in');
                    $user_id = $user['users_id'];
                    $data = array(
                        'cus_first_name'=> $this->input->post('first_name'),
                        'cus_last_name'=> $this->input->post('last_name'),
                        'cus_phone' => $this->input->post('phone'),
                        'cus_address' => $this->input->post('address'),
                        'cus_dob'=> $this->input->post('dob'),
                        'cus_gender'=>$this->input->post('gender'),
                        'users_id' =>$user_id
                    );
                    $data['notif'] = $this->auth_model->addCustomer($data);
                }
            }
        }
        $data['customer'] = $this->auth_model->getCustomerOne($user_id);
        $data['user'] = $user;
        $this->load->view('templates/account',$data);
    
    }

    public function customerProfile() {

        $data['title'] = 'CustomerProfile';
       
        $this->load->view('templates/account');
    }
}