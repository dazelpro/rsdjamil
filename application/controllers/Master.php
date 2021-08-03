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
        $data['dataRoom']       = $this->db->query("SELECT * FROM table_room");
        $query                  = $this->db->query("SELECT MAX(id) AS newCode FROM table_room")->row_array();
        $lastID                 = $query['newCode'];
        $numb                   = substr($lastID, 1, 4);
        $newID                  = $numb + 1;
        $data['code']           = $newID;
        $data['activeMenu']     = '2';
        $this->load->view('v-room', $data);
    }

    function insertRoom() {
        $id                     = $this->input->post('code');
		$name                   = $this->input->post('name');
		$this->db->query("INSERT INTO table_room (id,name) VALUES ('$id','$name')");
		redirect('master/room');
    }

    function editRoom() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
		$this->db->query("UPDATE table_room SET NAME = '$name' WHERE id = '$id'");
		redirect('master/room');
    }

    function deleteRoom() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_room WHERE id = '$id'");
		redirect('master/room');
    }

    function pageFilmSize() {
        $data['dataRoom']       = $this->db->query("SELECT * FROM table_film");
        $query                  = $this->db->query("SELECT MAX(id) AS newCode FROM table_film")->row_array();
        $lastID                 = $query['newCode'];
        $numb                   = substr($lastID, 1, 4);
        $newID                  = $numb + 1;
        $data['code']           = $newID;
        $data['activeMenu']     = '3';
        $this->load->view('v-film-size', $data);
    }

    function insertFilmSize() {
        $id                     = $this->input->post('code');
		$size                   = $this->input->post('size');
		$stock                  = $this->input->post('stock');
		$this->db->query("INSERT INTO table_film (id,size,stock) VALUES ('$id','$size','$stock')");
		redirect('master/film-size');
    }

    function editFilmSize() {
        $id                     = $this->input->post('code');
        $size                   = $this->input->post('size');
        $stock                  = $this->input->post('stock');
		$this->db->query("UPDATE table_film SET size = '$size', stock = '$stock' WHERE id = '$id'");
		redirect('master/film-size');
    }

    function deleteFilmSize() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_film WHERE id = '$id'");
		redirect('master/film-size');
    }

}
