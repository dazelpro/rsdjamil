<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

	public function index() {
		$data['activeMenu'] = '1';
		$this->load->view('v-dashboard', $data);
	}

}
