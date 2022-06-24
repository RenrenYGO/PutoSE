<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function dashboard($page ='dashboard'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }
        
        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();
            
        $data['pagetit'] = 'Dashboard';
        $data['posts'] = $this->posts_model->get_posts();
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
	}

    public function categories($page ='categories'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }

        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();

        $data['pagetit'] = 'Categories:';
        $data['cats'] = $this->category_model->get_cats();
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
	}

    public function users($page ='users'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }

        $sess_user = $this->session->userdata('user');
        if(isset($sess_user) && $sess_user!=null)
            $data['user'] = $this->profile_model->get_profile();

        $data['pagetit'] = 'Users:';
        $data['users'] = $this->profile_model->get_profiles();
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
	}
}
