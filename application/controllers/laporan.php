<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') == null) {
      redirect('auth');
    }

    $this->load->model('laporan_model', 'laporan');
    $this->username = 'Sistem Booking';
  }

  public function ambil_data(){
    $lists = $this->laporan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($lists as $list) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $list->tgl_pemesanan;
      $row[] = $list->tgl_rapat;
      $row[] = $list->nama_bidang;
      $row[] = $list->nama_ruang;
      $row[] = $list->waktu_rapat;
      $row[] = $list->nama_acara;
      $row[] = $list->keterangan;

      $data[] = $row;
    }

    $output = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->laporan->count_all(),
      'recordsFiltered' => $this->laporan->count_filtered(),
      'data' => $data,
    );

    echo json_encode($output);
  }

  public function export(){
    if($this->input->post('pdf')){
      $this->pdf();
    }elseif ($this->input->post('excel')) {
      $this->excel();
    }else{
      print_r($this->input->post());
    }
  }

  public function excel(){
    $tanggal = $this->explode_date($this->input->post('date_range'));
    $awal = $tanggal[0]; $start = $this->format_date_us($awal);
    $akhir = $tanggal[1]; $end = $this->format_date_us($akhir);

    if($awal == $akhir){
      $filename = "Laporan_Pemesanan_Jadwal_Rapat_Tanggal_".str_replace('/', '-', $awal);
    }else{
      $awal = str_replace('/', '-', $awal); $akhir = str_replace('/', '-', $akhir);
      $filename = "Laporan_Pemesanan_Jadwal_Rapat_Tanggal_".$awal."_-_".$akhir;
    }

    // Panggil class PhpSpreadsheet-nya
    $excel = new Spreadsheet();
    // Settingan awal file excel
    $excel->getProperties()->setCreator($this->username)
                 ->setLastModifiedBy($this->username)
                 ->setTitle("Laporan Pemesanan Jadwal Rapat")
                 ->setSubject("Pemesanan Jadwal Rapat")
                 ->setDescription("Laporan Pemesanan Jadwal Rapat Tanggal ".$awal." sampai ".$akhir)
                 ->setKeywords("Laporan Pemesanan Jadwal Rapat");

    if($awal == $akhir){
      $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Pemesanan Jadwal Rapat Tanggal ".$this->format_date_id($this->format_date_us($awal)));
    }else{
      $awal = $this->format_date_id($this->format_date_us($awal));
      $akhir = $this->format_date_id($this->format_date_us($akhir));
      $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Pemesanan Jadwal Rapat Tanggal ".$awal." - ".$akhir); // Set kolom A1 dengan tulisan "DATA SISWA"
    }

    $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL PEMESANAN");
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "TANGGAL RAPAT");
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "BIDANG");
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "RUANGAN");
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "WAKTU RAPAT");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "NAMA ACARA");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "KETERANGAN");

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->laporan->view($start, $end);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tgl_pemesanan);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tgl_rapat);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_bidang);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_ruang);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->waktu_rapat);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama_acara);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->keterangan);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(21);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(21);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(40);


    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Pemesanan Jadwal Rapat");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
  }

  public function explode_date($date){
      return explode(" - ", $date);
  }

  public function format_date_id($date){
      return date("d ", strtotime($date)).namabulan(date("m", strtotime($date))).date(" Y", strtotime($date));
  }

  public function format_date_us($date){
    $date = str_replace('/', '-', $date);
    return date("Y-m-d", strtotime($date));
  }
}
