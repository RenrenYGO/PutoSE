<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller{
    
    public function __construct(){
	    parent::__construct();
	}

    public function skeyword(){
        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();
        $key = $this->input->post('title');
        $data['pagetit'] = 'Searched: '.$key;
        $data['cats'] = $this->category_model->get_cats_by_search($key);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

        $this->load->view('templates/header',$data);
        $this->load->view('pages/categories');
        $this->load->view('templates/footer');
    }

    public function postsbycat($id){
        $data['cats'] = $this->category_model->get_cats();
        $data['posts'] = $this->posts_model->get_posts_by_cat($id);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();
        
        $data['pagetit'] = 'Posts in: '. $data['posts'][0]['catname'];

        $this->load->view('templates/header',$data);
        $this->load->view('pages/dashboard');
        $this->load->view('templates/footer');
    }
}