<?php

class M_f_kuliner extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_w_kuliner` ORDER BY id DESC');
  }
    
    function cari_berita($keyword){
		$hsl=$this->db->query("SELECT  * FROM tbl_w_kuliner WHERE objek_wisata LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}
  function berita(){
		$hsl=$this->db->query("SELECT * FROM tbl_w_kuliner ORDER BY id DESC");
		return $hsl;
	}
 
    
}
