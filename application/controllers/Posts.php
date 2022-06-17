<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function view($id){

        $data['post'] = $this->posts_model->get_specific_post($id);
        $data['replies'] = $this->replies_model->get_replies($id);

        $this->load->view('templates/header');
        $this->load->view('pages/showpost', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        $data['cats'] = $this->category_model->get_cats();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === false){
            $this->load->view('templates/header');
            $this->load->view('pages/create_post',$data);
            $this->load->view('templates/footer');
        }
        else{
            $postData = array(
                'user_id' => $_SESSION['user']['id'],
                'title' => $this->input->post('title'),
                'content' => $this->input->post('body'),
                'cat_id' => $this->input->post('cat_id')
            );
            $this->posts_model->create_post($postData);

            redirect('dashboard');
        }
    }
}