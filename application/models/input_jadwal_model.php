<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_jadwal_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function formatDate($date){
		return date("Y-m-d", strtotime($date));
	}

  public function insert($postData){
    $data = array(
      'id_bidang'      => $postData['bidang'],
      'id_ruang'       => $postData['ruangan'],
      'tgl_pemesanan'  => date('Y-m-d'),
      'tgl_rapat'      => $this->formatDate($postData['tgl_rapat']),
      'waktu_rapat'    => $postData['waktu_rapat'],
      'nama_acara'     => $postData['nama_acara'],
      'keterangan'     => $postData['keterangan'],
    );
    $query = $this->db->insert('jadwal_rapat', $data);

    if (! $query){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function isRuanganExist($postData, $id){
    $this->db->select('waktu_rapat');
    $this->db->from('jadwal_rapat');
    $this->db->where('id_ruang', $id);
    $this->db->where('tgl_rapat', $this->formatDate($postData['tgl_rapat']));
    $this->db->where('waktu_rapat', $postData['waktu_rapat']);
    $result =$this->db->get();

    if( $result->num_rows() == 0){
      return false;
    }else{
      return true;
    }
  }



}
