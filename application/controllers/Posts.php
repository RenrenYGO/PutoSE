<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    private $user = null;

    public function __construct(){
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function skeyword(){
        $key = $this->input->post('title');

        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();
            
        $data['pagetit'] = 'Searched: '.$key;
        $data['posts'] = $this->posts_model->get_posts_by_search($key);
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard');
        $this->load->view('templates/footer');
    }
    
    public function view($id){
        
        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();

        $data['post'] = $this->posts_model->get_specific_post($id);
        $data['replies'] = $this->replies_model->get_replies($id);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/showpost');
        $this->load->view('templates/footer');
    }

    public function create(){
        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();

        $data['cats'] = $this->category_model->get_cats();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === false){
            $this->load->view('templates/header', $data);
            $this->load->view('pages/create_post');
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

    public function edit($id){
        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();

        $data['post'] = $this->posts_model->get_specific_post($id);

        if(empty($data['post'])){
            show_404();
        }

        if(!isset($this->user) && $this->user==null){
            redirect('login');
        }

        $data['cats'] = $this->category_model->get_cats();
        $data['title'] = 'Edit Post';
        $data['user'] = $this->user;
        

        $this->load->view('templates/header', $data);
        $this->load->view('pages/edit_post');
        $this->load->view('templates/footer');
    }

    public function update(){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === TRUE){
            $data = $this->input->post();
            $this->posts_model->update_post($data);
            redirect('dashboard');
        }
    }

    public function delete($id){
        $this->posts_model->delete_post($id);
        redirect('dashboard');
    }

    // Upvote for dashboard post
    public function upvote($id){
        $this->posts_model->upvote_post($id);
        redirect('dashboard');
    }
    
    // Downvote for dashboard post
    public function downvote($id){
        $this->posts_model->downvote_post($id);
        redirect('dashboard');
    }

    // Upvote for specific post
    public function upvoteR($id){
		$this->posts_model->upvote_post($id);
		$data['post'] = $this->posts_model->get_specific_post($_id);
		$data['replies'] = $this->replies_model->get_replies($id);
		redirect('post/'.$id);
	}

    // Downvote for specific post
    public function downvoteR($id){
		$this->posts_model->downvote_post($id);
		$data['post'] = $this->posts_model->get_specific_post($_id);
		$data['replies'] = $this->replies_model->get_replies($id);
		redirect('post/'.$id);
	}
}