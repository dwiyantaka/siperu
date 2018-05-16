<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function update($postData){
    $data = array(
      'nama_singkat' => $postData['nama_singkat'],
      'nama_panjang' => $postData['nama_panjang'],
      'nama_tempat' => $postData['nama_tempat'],
      'alamat' => $postData['alamat'],
    );

    $this->db->where('id', 1);
    $query = $this->db->update('options', $data);

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }
}
