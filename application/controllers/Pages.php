<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function dashboard($page ='dashboard'){

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }

        $data['posts'] = $this->posts_model->get_posts();

		$this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
	}
}
