<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_jadwal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }
    
    $this->load->model('input_jadwal_model', 'input_jadwal');
  }

  public function getRuangan(){
    $this->load->model('admin_model', 'admin');

    $postData = $this->input->post();
    $ruangan  = $this->admin->view_ruangan();
    foreach ($ruangan as $row) {
      if( $this->input_jadwal->isRuanganExist( $postData, $row->id_ruang ) == false ){
        echo "<option value = ".$row->id_ruang.">".$row->nama."</option>";
      }
    }
  }

  public function simpan_jadwal(){
    $postData = $this->input->post();

    $result = $this->input_jadwal->insert($postData);

    if($result == true){
      $data = "Sukses menyimpan data";
    }else{
      $data = $result['message'];
    }

    echo json_encode($data);
  }

}
