<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}

    function pageAdmin() {
        $data['dataAdmin']      = $this->db->query("SELECT * FROM table_account WHERE role = '0'");
        $data['activeMenu']     = '8';
        $this->load->view('v-admin', $data);
    }

    function insertAdmin() {
		$name                   = $this->input->post('name');
		$email                  = $this->input->post('email');
		$phone                  = $this->input->post('phone');
		$address                = $this->input->post('address');
		$password               = $this->input->post('password');
		$role                   = '0';
		$this->db->query("INSERT INTO table_account (name,phone,address,email,password,role) VALUES ('$name','$phone','$address','$email',md5('$password'),'$role')");
		redirect('account/admin');
    }

    function editAdmin() {
        $id                     = $this->input->post('code');
        $name                   = $this->input->post('name');
        $email                  = $this->input->post('email');
        $phone                  = $this->input->post('phone');
        $address                = $this->input->post('address');
        $status                 = $this->input->post('status');
		$this->db->query("UPDATE table_account SET name = '$name', email = '$email', phone = '$phone', address = '$address', status = '$status'  WHERE id = '$id'");
		redirect('account/admin');
    }

    function deleteAdmin() {
        $id                     = $this->input->post('code');
		$this->db->query("DELETE FROM table_account WHERE id = '$id'");
		redirect('account/admin');
    }

    function pageFilmSize() {
        $data['dataRoom']   = $this->db->query("SELECT * FROM table_film");
        $query              = $this->db->query("SELECT MAX(id) AS newCode FROM table_film")->row_array();
        $lastID             = $query['newCode'];
        $numb               = substr($lastID, 1, 4);
        $newID              = $numb + 1;
        $data['code']       = $newID;
        $this->load->view('v-film-size', $data);
    }

    function insertFilmSize() {
        $id     = $this->input->post('code');
		$size   = $this->input->post('size');
		$this->db->query("INSERT INTO table_film (id,size) VALUES ('$id','$size')");
		redirect('master/film-size');
    }

    function editFilmSize() {
        $id       = $this->input->post('code');
        $size       = $this->input->post('size');
		$this->db->query("UPDATE table_film SET size = '$size' WHERE id = '$id'");
		redirect('master/film-size');
    }

    function deleteFilmSize() {
        $id     = $this->input->post('code');
		$this->db->query("DELETE FROM table_film WHERE id = '$id'");
		redirect('master/film-size');
    }

}
