<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function cek_user($postData){
    $query = $this->db->get_where('user', array('username' => $postData['username']));

    if($query->num_rows() > 0){
      $data = $query->row();
      if(password_verify($postData['password'], $data->password)){
        $sess_data['logged_in'] = 'Sudah login';
        $sess_data['id'] = $data->id_user;
        $sess_data['username'] = $data->username;
        $sess_data['level'] = $data->level;
        $sess_data['id_bidang'] = $data->id_bidang;
        $sess_data['bidang'] = $this->nama_bidang($data->id_bidang);
        $this->session->set_userdata($sess_data);
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  public function nama_bidang($id_bidang){
    $this->db->select('nama');
    $this->db->from('data_bidang');
    $this->db->where('id_bidang', $id_bidang);

    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->row()->nama;
    }else{
      return 0;
    }
  }

  public function set_session(){
    $data = $this->db->get('options')->row();
    $sess_data['nama_singkat'] = $data->nama_singkat;
    $sess_data['nama_panjang'] = $data->nama_panjang;
    $sess_data['nama_tempat'] = $data->nama_tempat;
    $sess_data['alamat'] = $data->alamat;
    $this->session->set_userdata($sess_data);
  }
}
