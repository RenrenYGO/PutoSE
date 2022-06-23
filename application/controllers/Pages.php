<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function dashboard($page ='dashboard'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }
        $data['pagetit'] = 'Dashboard';
        $data['posts'] = $this->posts_model->get_posts();
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

		$this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
	}

    public function categories($page ='categories'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }
        $data['pagetit'] = 'Categories:';
        $data['cats'] = $this->category_model->get_cats();
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

		$this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
	}

    public function users($page ='users'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }
        $data['pagetit'] = 'Users:';
        $data['users'] = $this->profile_model->get_profiles();
        $data['pops'] = $this->posts_model->get_posts_by_popularity();

		$this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
	}
}
