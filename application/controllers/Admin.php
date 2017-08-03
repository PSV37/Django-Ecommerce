<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    //function __construct() {
    //  parent::__construct();
    // if(!isset($user_id) && empty($user_id)){
    //     CustomFlash('Admin/login', 'alert-danger', 'First Login');
    //}
    //}

    /*     * ***********Display Home Page For User******** */
    public function index() {
        if (ckeckAddmin()) {
            $this->load->view('admin/header/header');
            $this->load->view('admin/css/css');
            $this->load->view('admin/topnav/topnav');
            $this->load->view('admin/sidenav/sidenav');
            $this->load->view('admin/content/index');
            $this->load->view('admin/footer/footer');
            # $this->load->view('admin/js/extra');
            $this->load->view('admin/js/js');
        } else {

            CustomFlash('Admin/login', 'alert-danger', 'First Login');
            //$this->session->set_flashdata("error","First Login");
            //redirect('Admin/login');
        }
    }

    public function next() {
        $this->load->view('admin/header/header');
        $this->load->view('admin/css/css');
        $this->load->view('admin/topnav/topnav');
        $this->load->view('admin/sidenav/sidenav');
        $this->load->view('admin/content/default');
        $this->load->view('admin/footer/footer');
        #$this->load->view('admin/js/extra');
        $this->load->view('admin/js/js');
    }

    /*     * ***********Admin Login For User******** */

    public function login() {
        $valid_user = $this->session->userdata('user_id');
        if (isset($valid_user) && $valid_user != "") {
            redirect('Admin');
        }
        $this->load->view('comman/header');
        $this->load->view('css/css');
        $this->load->view('comman/navbar');
        $this->load->view('login/comman/header');
        $this->load->view('login/login');
        $this->load->view('login/comman/footer');
        $this->load->view('comman/footer');
        $this->load->view('js/js');
    }

    /*     * ***********Login Validation For User******** */

    public function ckeckLogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('HomeModel');
        $user_data = $this->HomeModel->check_data($email, $password);

        if (isset($user_data) && !empty($user_data)) {

            $data['fname'] = $user_data->firstname;
            $data['lname'] = $user_data->lastname;
            $data['email'] = $user_data->email;
            $data['password'] = $user_data->password;
            $data['user_id'] = $user_data->id;
            $data['user_date'] = $user_data->date;
            $data['user_role'] = $user_data->role_name;
            if (isset($user_data->image) && $user_data->image != '') {
                $data['profile_img'] = $user_data->image;
            } else {
                $data['profile_img'] = base_url('assets/images/user.png');
            }

            $this->session->set_userdata($data);
            redirect('Admin');
        } else {
            CustomFlash('Admin/login', 'alert-danger', 'Invalid Username & Password');
            // $this->session->set_flashdata("login_s","Invalid Username & Password");
            //redirect('Admin/login');
        }
        //$this->load->model('HomeModel');
        //$user_id= $this->HomeModel->check_data( $email,$password);
        //print_r($user_id);
    }

    /*     * ***********AddCategory For User******** */

    public function newcategory() {

        if (ckeckAddmin()) {
            $this->load->view('admin/header/header');
            $this->load->view('admin/css/css');
            $this->load->view('admin/topnav/topnav');
            $this->load->view('admin/sidenav/sidenav');
            $this->load->view('admin/content/addcatogry');
            $this->load->view('admin/footer/footer');
            # $this->load->view('admin/js/extra');
            $this->load->view('admin/js/js');
        } else {
            CustomFlash('Admin/login', 'alert-danger', 'plz First Login');
        }
    }

    /*     * ***********Logout For User******** */

    public function logout() {
        $this->session->sess_destroy();
        redirect('Admin/login');
    }

    /*     * ***********Registration For User******** */

    public function Register() {
        //print_r($_POST);
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('pass', 'password', 'required');
        //$this->form_validation->set_rules('fname', 'Firstname', 'required');


        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('myform');
            $data['firstname'] = $this->input->post('fname');
            $data['lastname'] = $this->input->post('lastname');
            $data['email']=$this->input->post('email');
            $data['password']=$this->input->post('pass');
            
            //print_r($data);
            //exit;
            $this->load->model('RegisterModel');
            $user_data = $this->RegisterModel->insert_data($data);

            
            if(isset($user_data) && !empty($user_data))
            {
                $this->send_user_email($data['email'], $data['firstname']);
                $this->session->set_flashdata('success','Successfully Registred');
                redirect('Admin/Register');
            }
            else
            {
                $this->session->set_flashdata('Error','Error Occured');
                redirect('Admin/Register');   
            }
        }


        //$this->send_user_email('sapnapastapure@gmail.com');
        $this->load->view('comman/header');
        $this->load->view('css/css');
        $this->load->view('comman/navbar');
        $this->load->view('Register/comman/header');
        $this->load->view('Register/index');
        $this->load->view('Register/comman/footer');
        $this->load->view('comman/footer');
        $this->load->view('js/js');
    }

    
     function send_user_email($user_email,$user_name){
         
        $this->load->library(array('email'));
        $this->email->clear();
        $pasth= site_url('assets/images/user.png');
        $body='';
        $data['application_name'] = APPLICATION_NAME;
        $this->email->from(SUPPORT_EMAIL,APPLICATION_NAME);    
        $subject = 'Your account created on '.APPLICATION_NAME;
        $body = 'Thank' .$user_name.' you for registation us '
                . '<img src="'.$pasth.'">';
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->to($user_email);
        $this->email->send();
        
}
}