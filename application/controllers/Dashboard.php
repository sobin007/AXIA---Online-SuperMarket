<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('logged_in'); 
    }

    public function index() {

        $data['title'] = 'Dashboard';
        $user = $this->session->userdata('logged_in');
        
        if (!$user) {
            $this->load->view('pages/dashboard');
        }else {
            $data['session_user'] = $this->session_user;
            if($user['role'] == 8) {
                redirect(base_url('admin/home'));
                exit;
            }else if($user['role'] == 7){
                redirect(base_url('Employees/home'));
                exit;
            }else{
                $this->load->view('templates/homeheader', $data);
                $this->load->view('templates/home');
                $this->load->view('templates/footer');
            }
        }
    }

    public function home() {
        $data['title'] = 'Dashboard';
        $user = $this->session->userdata('logged_in');
        
        if (!$user) {
            $this->load->view('pages/dashboard');
        }else {
            $data['session_user'] = $this->session_user;
            if($user['role'] == 8) {
                redirect(base_url('admin/home'));
                exit;
            }else if($user['role'] == 7){
                redirect(base_url('Employees/home'));
                exit;
            }else{
                $this->load->view('templates/homeheader', $data);
                $this->load->view('templates/home');
                $this->load->view('templates/footer');
            }
        }
    }
}
