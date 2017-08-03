<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
     public function index()
    {
      if (ckeckAddmin()) {
                  $this->load->model('ProfileModel');
            $user_id = $this->session->userdata('user_id');
            $user_data['userdata'] = $this->ProfileModel->check_data($user_id); 
            $this->load->view('admin/header/header');
            $this->load->view('admin/css/css');
            $this->load->view('admin/topnav/topnav');
            $this->load->view('admin/sidenav/sidenav');
            $this->load->view('profile/comman/header');
            $this->load->view('profile/profile',$user_data);
            $this->load->view('profile/comman/footer');
            $this->load->view('admin/footer/footer');
            # $this->load->view('admin/js/extra');
            $this->load->view('admin/js/js');
        }
        else
        {
            CustomFlash('Admin/login', 'alert-danger', 'plz First Login');
        }  
    }
    
    
    public function profile_picture(){
        
        $user_id = $this->session->userdata('user_id');
        if($user_id!=''){
            $crop['src'] = isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null;
            $crop['data'] = isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null;
            $crop['file'] = isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null;

            $this->load->library('crop_avatar', $crop);
            $src = $this->crop_avatar->getResult();
            $msg = $this->crop_avatar->getMsg();
             $this->load->model('ProfileModel');
            if($msg =='' || $msg == null){
                if(!$this->ProfileModel->update_profile($user_id, $src)){
                    $src = '';
                    $msg = 'Error: Unable to update profile picture.Please try again';
                    
                }
                else{
                    $this->session->set_userdata('profile_img', $src);
                }
            }
            
            $response = array(
                        'state'  => 200,
                        'message' => $msg,
                        'result' => $src
                );
        }    
        else{
            $response = array(
                    'state'  => 200,
                    'message' => "Your session in Invalid",
                    'result' => ''
            );
        }     
        echo json_encode($response);
        
    }
    
    
    public function update_data()
    {
        $user_id=$this->session->userdata('user_id');
        $this->load->model('ProfileModel');
        $data = array(
            'firstname'=>$this->input->post('fname'),
            'email'=>$this->input->post('email'));
         $updat_result=$this->ProfileModel->update_user_data($user_id,$data);  
       if($updat_result){
         $user_data['userdata'] = $this->ProfileModel->check_data($user_id);  
         $data['fname']=$user_data['userdata']->firstname;
         $data['email']=$user_data['userdata']->email;
         $this->session->set_userdata($data);  
         $this->session->set_flashdata('success','Updated Successfully');
       }else{
         $this->session->set_flashdata('Error','Updated Successfully');  
       }

       // CustomFlash('Profile', 'alert-danger', 'Updated Successfully');
        
        redirect('Profile');
    }
}