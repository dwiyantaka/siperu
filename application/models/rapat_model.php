<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function batal($postData){
    $this->db->where('id', $postData['id']);
    $query = $this->db->update('jadwal_rapat', array( 'status' => '0' ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

}
