<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')) {
            $this->session_user = $this->session->userdata('logged_in');
        }else{
            redirect(base_url('Dashboard'));
            exit;
        }
    }

    public function home () {
        $data['title'] = 'Employee';
        if ($this->session->userdata('logged_in')) {
            if(!$this->session_user['role'] == 1){
                $data['session_user'] = $this->session_user;
                $this->load->view('employee/home');
            }else{
                redirect(base_url('Dashboard'));
                exit; 
            }
        }else{
            redirect(base_url('Dashboard'));
            exit;
        }
    }
}