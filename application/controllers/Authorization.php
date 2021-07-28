<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('MAuthorization','Mlogin');
    }
    
	function index() {
        if ($this->session->userdata('logged') !=TRUE) {
            $this->load->view('v-login');
        } else {
            $url=base_url('dashboard');
            redirect($url);
        };
    }
    
    function auth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
                
        $validasi_email = $this->Mlogin->query_validasi_email($email);
        if ($validasi_email->num_rows() > 0) {
            $validate_ps=$this->Mlogin->query_validasi_password($email,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
                if($x['status']=='1'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('user',$email);
                    $id=$x['id'];
                    if ($x['role']=='0') { //Admin Radiologi
                        $name = $x['name'];
                        $this->session->set_userdata('access','Admin Radiologi');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('dashboard');

                    } else if ($x['role']=='1') { //Dokter Pengantar
                        $name = $x['name'];
                        $this->session->set_userdata('access','Dokter Pengantar');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('dashboard');
                    } else if ($x['role']=='2') { //Dokter Radiologi
                        $name = $x['name'];
                        $this->session->set_userdata('access','Dokter Radiologi');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('dashboard');
                    }
                } else {
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            } else {
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }

        } else {
            $url=base_url('login');
            echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>Email yang kamu masukan salah.</p>');
            redirect($url);
        }

    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }

}