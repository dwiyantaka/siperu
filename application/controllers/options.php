<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }

    $this->load->model('options_model', 'options');
  }

  public function update(){
    $postData = $this->input->post();
    $result   = $this->options->update($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses mengubah data';

      $this->load->model('Auth_model', 'auth');
      $this->auth->set_session();
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }
}
