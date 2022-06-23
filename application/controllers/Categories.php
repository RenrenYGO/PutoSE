<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller{
    
    public function __construct(){
	    parent::__construct();
	}

    public function skeyword(){
        $key = $this->input->post('title');
        $data['pagetit'] = 'Searched: '.$key;
        $data['cats'] = $this->category_model->get_cats_by_search($key);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

        $this->load->view('templates/header');
        $this->load->view('pages/categories', $data);
        $this->load->view('templates/footer');
    }

    public function postsbycat($id){
        $data['cats'] = $this->category_model->get_cats();
        $data['posts'] = $this->posts_model->get_posts_by_cat($id);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

        $this->load->view('templates/header');
        $this->load->view('pages/dashboard',$data);
        $this->load->view('templates/footer');
    }
}