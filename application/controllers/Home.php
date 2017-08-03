<?php

class Home extends CI_Controller {

    public function index() {
        $this->send_user_email('sapnapastapure@gmail.com','sapna');
        $this->load->view('comman/header');
        $this->load->view('css/css');
        $this->load->view('comman/navbar');
        $this->load->view('home/index');
        $this->load->view('comman/footer');
        $this->load->view('js/js');
        
        
       // $ths->send_user_email('sapanapastapure@gmail.com','sapapa');
    }
   
   /** function send_user_email($user_email,$user_name){
        $this->load->library(array('email'));
        $this->email->clear();
        $body='';
        $data['application_name'] = APPLICATION_NAME;
        $this->email->from(SUPPORT_EMAIL,APPLICATION_NAME);    
        $subject = 'Your account created on '.APPLICATION_NAME;
        $body = $user_name.'Thank you for registation us ';
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->to($user_email);
        $this->email->send();
        
 echo $this->email->print_debugger();
    }
    **/
    
}
