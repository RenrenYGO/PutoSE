<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    private $user = null;

    public function __construct(){
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function skeyword(){
        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();
        $key = $this->input->post('title');
        $data['pagetit'] = 'Searched: '.$key;
        $data['users'] = $this->profile_model->get_profiles_by_search($key);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

        $this->load->view('templates/header',$data);
        $this->load->view('pages/users');
        $this->load->view('templates/footer');
    }

    public function index($id=NULL){
        $data['user'] = $this->profile_model->get_profile($id);
        $data['posts'] = $this->posts_model->get_posts_by_user($id);

        $this->load->view('templates/header2',$data);
        $this->load->view('pages/profile_page');
        $this->load->view('templates/footer');
    }

    public function viewprofile($id){
        $data['user'] = $this->profile_model->get_profile($id);
        $data['posts'] = $this->posts_model->get_posts_by_user($id);
        

        $this->load->view('templates/header2',$data);
        $this->load->view('pages/profile_page');
        $this->load->view('templates/footer');
    }
}