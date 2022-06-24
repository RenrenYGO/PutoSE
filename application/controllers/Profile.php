<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    private $user = null;

    public function __construct(){
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function skeyword(){
        $key = $this->input->post('title');
        $data['pagetit'] = 'Searched: '.$key;
        $data['users'] = $this->profile_model->get_profiles_by_search($key);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

        $this->load->view('templates/header');
        $this->load->view('pages/users', $data);
        $this->load->view('templates/footer');
    }

    public function index(){
        $data['user'] = $this->profile_model->get_profile(FALSE);
        $data['posts'] = $this->posts_model->get_posts_by_user(FALSE);

        $this->load->view('templates/header',$data);
        $this->load->view('pages/profile_page');
        $this->load->view('templates/footer');
    }

    public function viewprofile($id){
        $data['user'] = $this->profile_model->get_profile($id);
        $data['posts'] = $this->posts_model->get_posts_by_user($id);
        

        $this->load->view('templates/header',$data);
        $this->load->view('pages/profile_page');
        $this->load->view('templates/footer');
    }
}