<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Replies extends CI_Controller{
	
	public function create($post_id){
		$data['post'] = $this->posts_model->get_specific_post($post_id);

		$this->form_validation->set_rules('content', 'Content', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
            $this->load->view('pages/showpost', $data);
            $this->load->view('templates/footer');
		}else{
			$this->replies_model->create_replies($post_id);
			 redirect('post/'.$post_id);
            //redirect('dashboard');
		}
	}
}