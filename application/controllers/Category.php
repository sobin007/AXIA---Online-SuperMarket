<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('logged_in');
    }

    public function handler(){
        
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('pages/dashboard');
        }else {
            $data['session_user'] = $this->session_user;
            if($user['role'] != '8') {
            redirect('Dashboard/home');
            exit;
            }
        }
    }

    public function index () {

        $this->load->view('admin/category/category');
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
        $data['subcategory'] = $this->Admin_model->getAllSubCategory();
        $this->load->view('admin/category/category',$data);
    }

    public function addCategory() {

        $data['title'] = 'Add Category';
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
        
        $this->load->view('admin/category/addcategory',$data);
    }

    public function deleteCategory($id) {
        $this->load->model('Admin_model');
        $this->Admin_model->delete($id);
        redirect(base_url('category/category'));
        exit;
    }

    public function addsubcategory(){

        $data['title'] = 'Add Category';
        $this->load->model('Admin_model');
        if (count($_POST)) {
            $this->load->helper('security');

            $this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
            $this->form_validation->set_rules('subcat_name','Sub Category', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data['notif']['message'] = validation_errors();
                $data['notif']['type'] = 'danger';
            } 
            else {
                $data = array(
                    'cat_id' => $this->input->post('cat_id'),
                    'subcat_name' => $this->input->post('subcat_name')
                );
                $data['notif'] = $this->Admin_model->addsubcategory($data);
            }
        }
        $data['category'] = $this->Admin_model->getAllCategory();
        $this->load->view('admin/category/addsubcategory',$data);
    }

    public function viewsubcategory($id) {
        $this->load->model('Admin_model');
        $data['subcategory'] = $this->Admin_model->viewsubcategory($id);
        $this->load->view('admin/category/viewsubcategory',$data);
    }

    public function deleteSubCategory($id) {
        $this->load->model('Admin_model');
        $this->Admin_model->deleteSubCategory($id);
        redirect(base_url('category/category'));
        exit;
    }
    
}