<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAuthorization extends CI_Model{

    function query_validasi_email($email){
    	$result = $this->db->query("SELECT * FROM table_user WHERE user_email='$email' LIMIT 1");
        return $result;
    }

    function query_validasi_password($email,$password){
    	$result = $this->db->query("SELECT * FROM table_user WHERE user_email='$email' AND user_password=SHA2('$password', 224) LIMIT 1");
        return $result;
    }

} 