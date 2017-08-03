
<?php

 function CustomFlash($url,$class,$message){
     
     $ci = & get_instance();
     $ci->load->helper('url');
     $ci->load->library('session');
     $ci->session->set_flashdata('class',$class);
     $ci->session->set_flashdata('login_s',$message);
     redirect($url);
 }
 
 function ckeckFlash()
 {
    $ci = & get_instance();
    $ci->load->library('session');
    if($ci->session->flashdata('class'))
    {
        $data['class']=$ci->session->flashdata('class');
        $data['login_s']=$ci->session->flashdata('login_s');
        $ci->load->view('errors/flashdata',$data);
    }
 }
 
 function ckeckAddmin()
 {
    $ci = & get_instance();
    $ci->load->library('session');
    if($ci->session->userdata('user_id'))
    {
        return TRUE;
    }
    else
    {
        return FALSE;   
    }
 }
 
 




?>