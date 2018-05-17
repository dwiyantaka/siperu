<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }

    $this->load->model('Admin_model', 'admin');
  }

  function index(){
    $data['title'] = 'Beranda';

    $this->load->model('count');

    $data['month'] = bulan();
    $data['month_count'] = $this->count->month_count();

    $data['year'] = Date('Y');
    $data['year_count'] = $this->count->year_count($data['year']);

    $data['total_count'] = $this->count->total_count();
    $data['cancel_count'] = $this->count->cancel_count();

    $this->load->view('index', $data);
  }

  function laporan(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('admin');
    }

    $data['title'] = 'Laporan';
    $this->load->view('laporan', $data);
  }

  function input_jadwal(){
    $data['bidang'] = $this->admin->view_bidang();

    $data['title'] = 'Input Jadwal';
    $this->load->view('input_jadwal', $data);
  }

  function pembatalan_rapat(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('admin');
    }

    $data['title'] = 'Pembatalan Jadwal Rapat';
    //$data['rapat'] = $this->admin->view_rapat();

    $this->load->view('data_rapat', $data);
  }

  function data_ruangan(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('admin');
    }

    $data['title'] = 'Data Ruangan';
    $data['ruangan'] = $this->admin->view_ruangan();

    $this->load->view('data_ruangan', $data);
  }

  function data_bidang(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('admin');
    }

    $data['title'] = 'Data Bidang';
    $data['bidang']  = $this->admin->view_bidang();

    $this->load->view('data_bidang', $data);
  }

  function data_kepala_bidang(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('admin');
    }

    $this->load->model('Kepala_bidang_model', 'kepala_bidang');

    $bidang = $this->admin->view_bidang();
    $data = array(''=>'');
    foreach ($bidang as $b) {
      if ($this->kepala_bidang->isBidangExist($b->id_bidang) == false){
        $data[$b->id_bidang] = $b->nama;
      }
    }

    $data['title'] = 'Data Kepala Bidang';
    $data['form_bidang'] = form_dropdown('', $data, '', 'id="bidang" class="form-control"');
    $data['kepala_bidang'] = $this->admin->view_kepala_bidang();

    $this->load->view('data_kepala_bidang', $data);
  }

  function data_user(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('admin');
    }

    $data['title'] = 'Data User';
    $data['bidang'] = $this->admin->view_bidang();
    $data['user']   = $this->admin->view_user();

    $this->load->view('data_user', $data);
  }

  public function getJadwal(){
    $data = $this->admin->getJadwal();
    $events = array();
    foreach ($data as $d) {
      $row = array();
      $row['title']       = $d->nama_acara;
      $row['bidang']      = $d->bidang;
      if ($d->waktu_rapat == 'pagi'){
        $row['start']     = $d->tgl_rapat.'T07:00:00';
        $row['end']       = $d->tgl_rapat.'T12:00:00';
      }elseif ($d->waktu_rapat == 'siang') {
        $row['start']     = $d->tgl_rapat.'T12:00:00';
        $row['end']       = $d->tgl_rapat.'T18:00:00';
      }
      $row['description'] = $d->keterangan;
      $row['ruang']       = $d->ruang;
      $row['color']       = $d->color;

      array_push($events, $row);
    }

    echo json_encode($events);
  }

  public function profil(){
    $data['title'] = 'Profil';
    $data['user'] = $this->admin->view_user($this->session->userdata('id'));

    $this->load->view('profil', $data);
  }

  public function logout(){
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('level');
    session_destroy();
    redirect('auth');
  }

  public function options(){
    $data['opt'] = $this->admin->view_options();
    $data['title'] = 'Options';

    $this->load->view('options', $data);
  }
}
