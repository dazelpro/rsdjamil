<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAuthorization extends CI_Model{

    function query_validasi_email_admin($email){
    	$result = $this->db->query("SELECT * FROM table_admin JOIN table_account ON table_admin.id = table_account.id WHERE email='$email' LIMIT 1");
        return $result;
    }

    function query_validasi_password_admin($email,$password){
    	$result = $this->db->query("SELECT * FROM table_admin JOIN table_account ON table_admin.id = table_account.id WHERE email='$email' AND password=md5('$password') LIMIT 1");
        return $result;
    }

    function query_validasi_email_doctor($email){
    	$result = $this->db->query("SELECT * FROM table_doctor JOIN table_account ON table_doctor.id = table_account.id WHERE email='$email' LIMIT 1");
        return $result;
    }

    function query_validasi_password_doctor($email,$password){
    	$result = $this->db->query("SELECT * FROM table_doctor JOIN table_account ON table_doctor.id = table_account.id WHERE email='$email' AND password=md5('$password') LIMIT 1");
        return $result;
    }

    function query_validasi_email_radiology($email){
    	$result = $this->db->query("SELECT * FROM table_doctor_radiology JOIN table_account ON table_doctor_radiology.id = table_account.id WHERE email='$email' LIMIT 1");
        return $result;
    }

    function query_validasi_password_radiology($email,$password){
    	$result = $this->db->query("SELECT * FROM table_doctor_radiology JOIN table_account ON table_doctor_radiology.id = table_account.id WHERE email='$email' AND password=md5('$password') LIMIT 1");
        return $result;
    }

} 