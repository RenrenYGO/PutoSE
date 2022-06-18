<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller{
    
    public function __construct(){
	    parent::__construct();
	}

    public function postsbycat($id){
        $data['cats'] = $this->category_model->get_cats();
        $data['posts'] = $this->posts_model->get_posts_by_cat($id);

        $this->load->view('templates/header');
        $this->load->view('pages/dashboard',$data);
        $this->load->view('templates/footer');
    }
}