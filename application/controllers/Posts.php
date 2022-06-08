<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function view($id){
        
        $data['post'] = $this->posts_model->get_specific_post($id);

        $this->load->view('templates/header');
        $this->load->view('pages/showpost', $data);
        $this->load->view('templates/footer');
    }
}