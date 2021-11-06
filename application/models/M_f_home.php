<?php

class M_f_home extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_w_alam` ORDER BY id DESC');
  }
    public	function get_wisata_alam()
    {
     $query = "SELECT * FROM tbl_w_alam limit 6 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_wisata_bahari()
    {
     $query = "SELECT * FROM tbl_w_bahari limit 6 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_wisata_kuliner()
    {
     $query = "SELECT * FROM tbl_w_kuliner limit 6 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_wisata_budaya()
    {
     $query = "SELECT * FROM tbl_w_budaya limit 6 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_wisata_edukasi()
    {
     $query = "SELECT * FROM tbl_w_edukasi limit 6 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_wisata_hotel()
    {
     $query = "SELECT * FROM tbl_w_hotel limit 4 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_event()
    {
     $query = "SELECT * FROM tbl_event limit 3 ";
    return $this->db->query($query)->result_array();
    }
    public	function get_about()
    {
     $query = "SELECT * FROM tbl_about";
    return $this->db->query($query)->result_array();
    }
	

    
}
