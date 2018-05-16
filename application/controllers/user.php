<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }

    $this->load->model('User_model', 'user');
  }

  public function hapus(){
    $postData = $this->input->post();
    $result   = $this->user->delete($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses menghapus data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

  public function simpan(){
    $postData = $this->input->post();
    $result   = $this->user->insert($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses menambahkan data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

  public function ubah(){
    $postData = $this->input->post();
    $result   = $this->user->edit($postData);

    if ($result === true){
      $data['sukses'] = 'Sukses mengubah data';
    }else{
      //$data['error'] = $result['message'];
      $data['error'] = $result;
    }

    echo json_encode($data);
  }

  public function reset_password(){
    $postData = $this->input->post();
    $result   = $this->user->reset_password($postData);

    if ($result === true){
      $data['sukses'] = 'Sukses mereset password';
    }else{
      //$data['error'] = $result['message'];
      $data['error'] = $result;
    }

    echo json_encode($data);
  }

  function edit(){
    $postData = $this->input->post();
    if($postData['username']){
      echo "username";
    }
  }
}
