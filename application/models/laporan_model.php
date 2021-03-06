<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  var $table = 'view_jadwal';
  var $column_order = array( null, 'tgl_pemesanan', 'tgl_rapat', null, 'nama_ruang', null, null);// 'nis', 'nama', 'jenis', 'keterangan'); //set column field database for datatable orderable
	var $column_search = array('nama_bidang', 'nama_ruangan', 'nama_acara'); //set column field database for datatable searchable
	var $order = array('tgl_pemesanan' => 'asc');

  public function _get_datatables_query(){

    $postData = $this->input->post();
    if($postData){
      $this->db->where('tgl_pemesanan >=', $postData['awal']);
      $this->db->where('tgl_pemesanan <=', $postData['akhir']);
      $this->db->where('status', '1');
    }

    $this->db->from($this->table);
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])){ // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
  }

  public function get_datatables(){
	   $this->_get_datatables_query();
	   if($_POST['length'] != -1)
	   $this->db->limit($_POST['length'], $_POST['start']);
	   $query = $this->db->get();
	   return $query->result();
  }

  public function count_filtered(){
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all(){
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function view($start, $end){
    $this->db->where('tgl_pemesanan >=', $start);
    $this->db->where('tgl_pemesanan <=', $end);
    $this->db->where('status', '1');
    return $this->db->get('view_jadwal')->result();
  }
}
