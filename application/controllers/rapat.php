<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }

    $this->load->model('rapat_model', 'rapat');
  }

  public function ambil_data(){
        $table = "view_jadwal";

        $draw=$_REQUEST['draw'];

        /*Jumlah baris yang akan ditampilkan pada setiap page*/
        $length=$_REQUEST['length'];

        /*Offset yang akan digunakan untuk memberitahu database
        dari baris mana data yang harus ditampilkan untuk masing masing page
        */
        $start=$_REQUEST['start'];

        /*Keyword yang diketikan oleh user pada field pencarian*/
        $search=$_REQUEST['search']["value"];
        //$bulan=$_REQUEST['bulan']["value"];


        /*Menghitung total data didalam database*/
        $total=$this->db->count_all_results($table);

        /*Mempersiapkan array tempat kita akan menampung semua data
        yang nantinya akan server kirimkan ke client*/
        $output=array();

        /*Token yang dikrimkan client, akan dikirim balik ke client*/
        $output['draw']=$draw;

        /*
        $output['recordsTotal'] adalah total data sebelum difilter
        $output['recordsFiltered'] adalah total data ketika difilter
        Biasanya kedua duanya bernilai sama, maka kita assignment
        keduaduanya dengan nilai dari $total
        */
        $output['recordsTotal']=$output['recordsFiltered']=$total;

        /*disini nantinya akan memuat data yang akan kita tampilkan
        pada table client*/
        $output['data']=array();

        /*Jika $search mengandung nilai, berarti user sedang telah
        memasukan keyword didalam filed pencarian*/
        if($search!=""){
            $this->db->like("nama_bidang",$search);
            $this->db->or_like("nama_ruang",$search);
        }

        /*Lanjutkan pencarian ke database*/
        $this->db->limit($length,$start);
        /*Urutkan dari alphabet paling terkahir*/
        $this->db->order_by('id','DESC');
        $query=$this->db->get($table);


        /*Ketika dalam mode pencarian, berarti kita harus
        'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
        yang mengandung keyword tertentu
        */
        if($search!=""){
        $this->db->like("nama_bidang",$search);
        $this->db->or_like("nama_ruang",$search);
        $jum=$this->db->get($table);
        $output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
        }

        $no = 1;
        foreach ($query->result_array() as $data) {
            $output['data'][]=array(
                $no,
                $data['id'],
                $data['tgl_pemesanan'],
                $data['tgl_rapat'],
                $data['nama_bidang'],
                $data['nama_ruang'],
                $data['waktu_rapat'],
                $data['nama_acara'],
                $data['status'],
            );
            $no++;
        }

        echo json_encode($output);
    }

  public function batalkan(){
    $postData = $this->input->post();
    $result   = $this->rapat->batal($postData);

    if ($result == true){
      $data['sukses'] = 'Sukses';
    }else{
      $data['error'] = $result['message'];
    }

    echo json_encode($data);
  }

}
