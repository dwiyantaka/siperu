<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function delete($postData){
    $query = $this->db->delete('data_ruangan', array( 'id_ruang' => $postData['id'] ));
    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function edit($postData){
    $this->db->where('id_ruang', $postData['id']);
    $query = $this->db->update('data_ruangan', array( 'nama' => $postData['nama'] ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function insert($postData){
    $query = $this->db->insert('data_ruangan', array( 'nama' => $postData['nama'] ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }
}
