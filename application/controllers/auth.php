<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('auth_model', 'auth');
  }

  function index(){
    $this->auth->set_session();
    $data['desc'] = 'Silahkan masuk terlebih dahulu';
    
    if($this->session->userdata('logged_in') !== null ){
      redirect('admin');
    }else{
      $this->load->view('login', $data);
    }
  }

  public function cek_login(){
    $postData = $this->input->post();
    $result = $this->auth->cek_user($postData);
    if ($result !== false){
      redirect('admin');
    }else{
      echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
    }
  }
}
