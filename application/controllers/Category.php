<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();

        $this->session_user = $this->session->userdata('logged_in');
    }

    public function index () {

        $this->load->view('admin/category');
    }

    public function category() {

        $data['title'] = 'Category';
        $this->load->model('Admin_model');
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('cat_name', 'Category name', 'trim|required|is_unique[category.cat_name]');
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data = array(
                    'cat_name' => $this->input->post('cat_name'),
                );
                $data['notif'] = $this->Admin_model->addcategory($data);
            }
        }
        $data['category'] = $this->Admin_model->getAllCategory();
        $this->load->view('admin/category',$data);
    }

    public function deleteCategory($id) {
        $this->load->model('Admin_model');
        $this->Admin_model->delete($id);
        redirect(base_url('category/category'));
        exit;
    }
    
}