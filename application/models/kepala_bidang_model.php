<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_bidang_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function delete($postData){
    $query = $this->db->delete('data_kepala_bidang', array( 'id' => $postData['id'] ));
    
    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function edit($postData){
    $data = array(
      'jabatan'   => $postData['jabatan'],
      'nama'      => $postData['nama'],
      'nip'       => $postData['nip'],
      'pangkat'   => $postData['pangkat']
    );

    $this->db->where('id', $postData['id']);
    $query = $this->db->update('data_kepala_bidang', $data);

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function insert($postData){
    $data = array(
      'id_bidang' => $postData['bidang'],
      'jabatan'   => $postData['jabatan'],
      'nama'      => $postData['nama'],
      'nip'       => $postData['nip'],
      'pangkat'   => $postData['pangkat']
    );

    $query = $this->db->insert('data_kepala_bidang', $data);

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function isBidangExist($id){
    $query = $this->db->get_where('data_kepala_bidang', array('id_bidang' => $id));

    if ($query->num_rows() == 0){
      return false;
    }else{
      return true;
    }
  }
}
