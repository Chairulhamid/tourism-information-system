<?php

class M_f_alam extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_w_bahari` ORDER BY id DESC');
  }
    public	function get_wisata_alam()
    {
     $query = "SELECT * FROM tbl_w_alam ";
    return $this->db->query($query)->result_array();
    }
    function cari_berita($keyword){
		$hsl=$this->db->query("SELECT  * FROM tbl_w_alam WHERE objek_wisata LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}
  function berita(){
		$hsl=$this->db->query("SELECT * FROM tbl_w_alam ORDER BY id DESC");
		return $hsl;
	}
 function get_alam_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_w_alam where id='$kode'");
		return $hsl;
	}
    
}
