<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }
    
    $this->load->model('bidang_model', 'bidang');
  }

  public function hapus(){
    $postData = $this->input->post();
    $result   = $this->bidang->delete($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses menghapus data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

  public function simpan(){
    $postData = $this->input->post();
    $result   = $this->bidang->insert($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses menambahkan data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

  public function ubah(){
    $postData = $this->input->post();
    $result   = $this->bidang->edit($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses mengubah data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }
}
