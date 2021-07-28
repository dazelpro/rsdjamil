<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pageHandling() {
        $data['dataHandling']   = $this->db->query("SELECT table_handling.`id`, NAME as name, amount, size FROM table_handling JOIN table_film ON table_handling.`film` = table_film.`id`");
        $data['dataFilm']  		= $this->db->query("SELECT * FROM table_film");
        $query                  = $this->db->query("SELECT MAX(id) AS newCode FROM table_handling")->row_array();
        $lastID                 = $query['newCode'];
        $numb                   = substr($lastID, 1, 4);
        $newID                  = $numb + 1;
        $data['code']           = $newID;
        $data['activeMenu']     = '5';
        $this->load->view('v-handling', $data);
    }

	function insertHandling() {
        $id                     = $this->input->post('code');
		$name                   = $this->input->post('name');
		$size                   = $this->input->post('size');
		$amount                 = $this->input->post('amount');
		$this->db->query("INSERT INTO table_handling (id,name,film,amount) VALUES ('$id','$name','$size','$amount')");
		redirect('handling');
    }

}
