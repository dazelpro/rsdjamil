<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAuthorization extends CI_Model{

    function query_validasi_email($email){
    	$result = $this->db->query("SELECT * FROM table_account WHERE email='$email' LIMIT 1");
        return $result;
    }

    function query_validasi_password($email,$password){
    	$result = $this->db->query("SELECT * FROM table_account WHERE email='$email' AND password=md5('$password') LIMIT 1");
        return $result;
    }

} 