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
        $select = $this->input->post('select');
        
        if ($select == 0) { //Admin
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $validasi_email_admin = $this->Mlogin->query_validasi_email_admin($email);
            if ($validasi_email_admin->num_rows() > 0) {
                $validate_ps_admin=$this->Mlogin->query_validasi_password_admin($email,$password);
                if($validate_ps_admin->num_rows() > 0){
                    $x = $validate_ps_admin->row_array();
                    if($x['status']=='1'){
                        $this->session->set_userdata('logged',TRUE);
                        $this->session->set_userdata('user',$email);
                        $id=$x['id'];
                        if ($x['role']=='0') { //Admin Radiologi
                            $name = $x['name'];
                            $this->session->set_userdata('access','0');
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('name',$name);
                            redirect('dashboard');
                        }
                    } else {
                        $url=base_url('login');
                        echo $this->session->set_flashdata('msg','
                        <div class="alert alert-danger alert-dismissible show fade">
                            Account blocked
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                        redirect($url);
                    }
                } else {
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','
                    <div class="alert alert-danger alert-dismissible show fade">
                        Password wrong
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect($url);
                }

            } else {
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','
                <div class="alert alert-danger alert-dismissible show fade">
                    Email not found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect($url);
            }
        } if ($select == 1) { //Dokter
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $validasi_email_doctor = $this->Mlogin->query_validasi_email_doctor($email);
            if ($validasi_email_doctor->num_rows() > 0) {
                $validate_ps_doctor=$this->Mlogin->query_validasi_password_doctor($email,$password);
                if($validate_ps_doctor->num_rows() > 0){
                    $x = $validate_ps_doctor->row_array();
                    if($x['status']=='1'){
                        $this->session->set_userdata('logged',TRUE);
                        $this->session->set_userdata('user',$email);
                        $id=$x['id'];
                        // echo $email;
                        if ($x['role']=='1') { //Dokter Pengantar
                            $name = $x['name'];
                            $this->session->set_userdata('access','1');
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('name',$name);
                            redirect('dashboard');
                            // echo $email;
                        }
                    } else {
                        $url=base_url('login');
                        echo $this->session->set_flashdata('msg','
                        <div class="alert alert-danger alert-dismissible show fade">
                            Account blocked
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                        redirect($url);
                    }
                } else {
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','
                    <div class="alert alert-danger alert-dismissible show fade">
                        Password wrong
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect($url);
                }

            } else {
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','
                <div class="alert alert-danger alert-dismissible show fade">
                    Email not found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect($url);
            }
        } if ($select == 2) { // Radiologi
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $validasi_email_rad = $this->Mlogin->query_validasi_email_radiology($email);
            if ($validasi_email_rad->num_rows() > 0) {
                $validate_ps_rad=$this->Mlogin->query_validasi_password_radiology($email,$password);
                if($validate_ps_rad->num_rows() > 0){
                    $x = $validate_ps_rad->row_array();
                    if($x['status']=='1'){
                        $this->session->set_userdata('logged',TRUE);
                        $this->session->set_userdata('user',$email);
                        $id=$x['id'];
                        if ($x['role']=='2') { //Dokter Radiologi
                            $name = $x['name'];
                            $this->session->set_userdata('access','2');
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('name',$name);
                            redirect('dashboard');
                        }
                    } else {
                        $url=base_url('login');
                        echo $this->session->set_flashdata('msg','
                        <div class="alert alert-danger alert-dismissible show fade">
                            Account blocked
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                        redirect($url);
                    }
                } else {
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','
                    <div class="alert alert-danger alert-dismissible show fade">
                        Password wrong
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect($url);
                }

            } else {
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','
                <div class="alert alert-danger alert-dismissible show fade">
                    Email not found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect($url);
            }
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }

}