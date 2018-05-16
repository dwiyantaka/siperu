<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'user';
  }

  public function delete($postData){
    $query = $this->db->delete($this->table, array( 'id_user' => $postData['id'] ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function edit($postData){
    $this->db->where('id_user', $this->session->userdata('id'));

    if (isset($postData['username'])){
      $query = $this->db->update($this->table, array( 'username' => $postData['username'] ));
      if( ! $query ){
        return $this->db->error();
      }else{
        return true;
      }

    }elseif (isset($postData['pwd_lama'])){
      $query = $this->db->get('user');
      if ($query->num_rows() > 0){
        $data = $query->row();
        if (password_verify($postData['pwd_lama'], $data->password) ){
          $this->db->where('id_user', $this->session->userdata('id'));
          $q = $this->db->update('user', array('password' => password_hash($postData['pwd_baru'], PASSWORD_DEFAULT)));

          if(! $q){
    				return $this->db->error();
    			}else{
    				return true; //0  berarti data sukses diupdate
    			}
  			}else{
  				return $error['message'] = 'Password yang Anda masukkan salah'; //1 berarti password salah
  			}
  		}else{
  			return $error['Akun tidak ditemukan']; //2 berarti data tidak ditemukan di db
  		}
    }
  }

  public function insert($postData){
    $data = array(
      'username'  => $postData['username'],
      'password'  => password_hash($postData['password'], PASSWORD_DEFAULT),
      'level'     => $postData['level'],
      'id_bidang' => $postData['bidang'],
    );
    $query = $this->db->insert($this->table, $data);

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function reset_password($postData){
    $this->db->where('id_user', $postData['id']);
    $query = $this->db->update('user', array( 'password' => password_hash('1234', PASSWORD_DEFAULT) ));

    if( ! $query ){
      return $this->db->error();
    }else{
      return true;
    }
  }
}
