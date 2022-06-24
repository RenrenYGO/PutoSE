<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_Profile extends CI_Controller{

    private $user = null;

    public function __construct(){
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function index(){
        $data['user'] = $this->profile_model->get_profile();

        $this->load->view('templates/header');
        $this->load->view('pages/edit_profile',$data);
        $this->load->view('templates/footer');
    }

    public function profile_edit(){
        $data = $this->input->post();

        $this->user_model->update_profile($data);
        redirect('profile');
    }

    public function edit_cover(){
        $data = $this->input->post();

        $config['upload_path'] = APPPATH.'../assets/images/cover_photo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '50000';
        $config['max_width'] = '50000';
        $config['max_height'] = '50000';
        $config['file_name'] = $this->session->userdata('user')['id']. '_'. $_FILES['cover_photo']['name'];
        $config['remove_spaces'] = FALSE;
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('cover_photo')){
            redirect('profile');
        }else{
            $data = array(
                'cover_photo' => $config['file_name']
            );
        }

        $this->user_model->update_profile($data);
        redirect('profile');
    }
    public function edit_profile_photo(){
        $data = $this->input->post();

        $config['upload_path'] = APPPATH.'../assets/images/profile_picture/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '50000';
        $config['max_width'] = '50000';
        $config['max_height'] = '50000';
        $config['file_name'] = $this->session->userdata('user')['id']. '_'. $_FILES['profile_picture']['name'];
        $config['remove_spaces'] = FALSE;
        $this->load->library('upload',$config);

        // Check if there is an input
        if(!$this->upload->do_upload('profile_picture')){
            redirect('profile');
        }else{
            $data = array(
                'profile_picture' => $config['file_name']
            );
        }
        
        $this->user_model->update_profile($data);
        redirect('profile');
    }

    public function delete_photo($pic){
        $data = array(
            $pic => 'noimage.jpg'
        );

        $this->user_model->update_profile($data);
        redirect('profile');
    }

}