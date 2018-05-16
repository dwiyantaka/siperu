<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function view_rapat(){
    return $this->db->query('CALL `jadwal_rapat`();')->result();
    //return $this->db->get()->free_result();
  }

  public function view_ruangan(){
    return $this->db->get('data_ruangan')->result();
  }

  public function view_bidang(){
    return $this->db->get('data_bidang')->result();
  }

  public function view_kepala_bidang(){
    $this->db->select('data_kepala_bidang.id, data_bidang.nama AS nama_bidang, data_kepala_bidang.jabatan, data_kepala_bidang.nama, data_kepala_bidang.nip, data_kepala_bidang.pangkat');
    $this->db->from('data_kepala_bidang');
    $this->db->join('data_bidang', 'data_kepala_bidang.id_bidang = data_bidang.id_bidang');

    return $this->db->get()->result();
  }

  public function view_user($id = null){
    $this->db->select('user.id_user, user.username, user.level, data_bidang.nama');
    $this->db->from('user');
    $this->db->join('data_bidang', 'user.id_bidang = data_bidang.id_bidang', 'left');

    if ($id == null){
      return $this->db->get()->result();
    }else{
      $this->db->where('id_user', $id);
      return $this->db->get()->row();
    }
  }

  public function view_user_by_id($id){
    $this->db->select('user.id_user, user.username, user.level, data_bidang.nama');
    $this->db->from('user');
    $this->db->join('data_bidang', 'user.id_bidang = data_bidang.id_bidang', 'left');

    return $this->db->get()->result();
  }

  public function getJadwal(){
    $this->db->select('data_bidang.nama AS `bidang`, data_ruangan.nama AS `ruang`, jadwal_rapat.tgl_rapat, jadwal_rapat.waktu_rapat,  jadwal_rapat.nama_acara, jadwal_rapat.keterangan, data_bidang.color');
    $this->db->from('jadwal_rapat');
    $this->db->join('data_bidang', 'jadwal_rapat.id_bidang = data_bidang.id_bidang');
    $this->db->join('data_ruangan', 'jadwal_rapat.id_ruang = data_ruangan.id_ruang');
    $this->db->where('status', '1');

    return $this->db->get()->result();
  }

  public function view_options(){
    return $this->db->get('options')->row();
  }

}
