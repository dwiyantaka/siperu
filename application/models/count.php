<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function year_count($year){
    $this->db->select('tgl_rapat');
    $this->db->from('jadwal_rapat');
    $this->db->like('tgl_rapat', $year);
    $this->db->where('status', '1');

    return $this->db->get()->num_rows();
  }

  public function month_count(){
    $month = Date('Y-m');
    $this->db->select('tgl_rapat');
    $this->db->from('jadwal_rapat');
    $this->db->like('tgl_rapat', $month);
    $this->db->where('status', '1');

    return $this->db->get()->num_rows();
  }

  public function total_count(){
    $this->db->select('id');
    $this->db->from('jadwal_rapat');
    $this->db->where('status', '1');

    return $this->db->get()->num_rows();
  }

  public function cancel_count(){
    $this->db->select('id');
    $this->db->from('jadwal_rapat');
    $this->db->where('status', '0');

    return $this->db->get()->num_rows();
  }

}
