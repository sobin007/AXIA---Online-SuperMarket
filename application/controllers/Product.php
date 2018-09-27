<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('adminlogged_in');
    }

    public function index () {

        $this->load->view('admin/product/product');
    }
    public function product() {

        $data['title'] = 'Product';
        $this->load->model('Admin_model');
        if ($this->session->userdata('adminlogged_in')) {
            $data['session_user'] = $this->session_user;
        }

        $data['product'] = $this->Admin_model->getAllProduct();

        $this->load->view('admin/product/product',$data);
    }

    public function addProduct() {

        $data['title'] = 'Add Product';
        $this->load->model('Admin_model');
    
        // if (count($_POST)) {
        //     $this->load->helper('security');

        //     $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        //     $this->form_validation->set_rules('uname', 'User name', 'trim|required');
        //     $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

        //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
        //     //$this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]|min_length[6]|alpha_numeric|callback_password_check');
            
        //     $this->form_validation->set_rules('address', 'Address', 'trim|required');
        //     $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|numeric|is_unique[staff.phone]');
        //     $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        //     $this->form_validation->set_rules('salary', 'Salary', 'trim|required');
        //     $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        //     $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            
        //     if ($this->form_validation->run() == false) {
        //         $data['notif']['message'] = validation_errors();
        //         $data['notif']['type'] = 'danger';
        //     } 
        //     else {
        //         $data['notif'] = $this->Admin_model->addstaff_to_users();
        //         $user_id = $data['notif']['user_id'];
        //         $data = array(
        //             'first_name'=> $this->input->post('first_name'),
        //             'last_name'=>$this->input->post('last_name'),
        //             'phone' => $this->input->post('phone'),
        //             'address' => $this->input->post('address'),
        //             'designation' => $this->input->post('designation'),
        //             'salary' => $this->input->post('salary'),
        //             'dob' => $this->input->post('dob'),
        //             'gender' =>$this->input->post('gender'),
        //             'user_id' =>$user_id
        //         );
        //         $data['notif'] = $this->Admin_model->addstaff_to_staff($data);
        //     }
        // }
        $this->load->view('admin/product/addproduct',$data);
    }

    public function do_upload(){

        $data['title'] = 'Add Product';
        $this->load->model('Admin_model');

        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload()) {
            $data = array('upload_data' => $this->upload->data());
            $image_info = $this->upload->data();

            $data1 = array(
                'name' => $this->input->post('name'),
                'short_disc' => $this->input->post('short_disc'),
                'price' => $this->input->post('price'),
                'product_img' => $image_info['file_name']
            );
            $data['notif'] = $this->Admin_model->addProduct($data1);
            $data[product] = $this->Admin_model->getAllProduct();
            $this->load->view('admin/product/product',$data);
        }
        else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/product/addproduct', $error);
        }
    }
    
}