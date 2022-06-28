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

	public function upvoteR($id,$post_id){
		$this->replies_model->upvote_reply($id);
		$data['post'] = $this->posts_model->get_specific_post($post_id);
		$data['replies'] = $this->replies_model->get_replies($id);
		redirect('post/'.$post_id);
	}

	public function update(){
		$this->form_validation->set_rules('body', 'Body', 'required');
		if($this->form_validation->run() === TRUE){
        $data = $this->input->post();
		$this->replies_model->edit_reply($data);	
		redirect('dashboard');
	 }
	}

	public function edit($id){
		$sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();


   
		$data['data'] = $this->replies_model->row_reply($id);
		$this->load->view('templates/header', $data);
        $this->load->view('pages/edit_reply', $data);
        $this->load->view('templates/footer');
    }

	
	public function downvoteR($id,$post_id){
		$this->replies_model->downvote_reply($id);
		$data['post'] = $this->posts_model->get_specific_post($post_id);
		$data['replies'] = $this->replies_model->get_replies($id);
		redirect('post/'.$post_id);
	}

	public function delete_reply($id, $post_id){
		$this->replies_model->reply_delete($id);
		redirect('post/'.$post_id);
	}
}