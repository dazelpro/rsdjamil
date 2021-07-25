<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pageRoom() {
        $data['dataRoom']   = $this->db->query("SELECT * FROM table_room");
        $query              = $this->db->query("SELECT MAX(id) AS newCode FROM table_room")->row_array();
        $lastID             = $query['newCode'];
        $numb               = substr($lastID, 1, 4);
        $newID              = $numb + 1;
        $data['code']       = $newID;
        $this->load->view('v-room', $data);
    }

    function insertRoom() {
        $id     = $this->input->post('code');
		$name   = $this->input->post('name');
		$this->db->query("INSERT INTO table_room (id,name) VALUES ('$id','$name')");
		redirect('master/room');
    }

}
