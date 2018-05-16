<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function delete($postData){
    $query = $this->db->delete('data_bidang', array( 'id_bidang' => $postData['id'] ));
    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function edit($postData){
    $this->db->where('id_bidang', $postData['id']);
    $query = $this->db->update('data_bidang', array( 'nama' => $postData['nama'] ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function insert($postData){
    $query = $this->db->insert('data_bidang', array( 'nama' => $postData['nama'] ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }
}
