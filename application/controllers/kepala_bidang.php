<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_bidang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }
    
    $this->load->model('Kepala_bidang_model', 'kepala_bidang');
  }

  public function getBidang(){
    $this->load->model('admin_model', 'admin');

    $bidang = $this->admin->view_bidang();
    $data = array();
    foreach ($bidang as $b) {
      $data[''] = '';
      if ($this->kepala_bidang->isBidangExist($b->id_bidang) == false){
        $data[$b->id_bidang] = $b->nama;
      }
    }

    print_r($data);
  }

  public function hapus(){
    $postData = $this->input->post();
    $result   = $this->kepala_bidang->delete($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses menghapus data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

  public function simpan(){
    $postData = $this->input->post();
    $result   = $this->kepala_bidang->insert($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses menambahkan data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

  public function ubah(){
    $postData = $this->input->post();
    $result   = $this->kepala_bidang->edit($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses mengubah data';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

}
