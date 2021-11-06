<?php

class Dashboard_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
   
  }
 
   public function totalAlam()
	{
		$this->db->from('tbl_w_alam');
      return $this->db->count_all_results();
	}
   public function totalBahari()
	{
		$this->db->from('tbl_w_bahari');
      return $this->db->count_all_results();
	}
   public function totalKuliner()
	{
		$this->db->from('tbl_w_kuliner');
      return $this->db->count_all_results();
	}
   public function totalBudaya()
	{
		$this->db->from('tbl_w_budaya');
      return $this->db->count_all_results();
	}
   public function totalEdukasi()
	{
		$this->db->from('tbl_w_edukasi');
      return $this->db->count_all_results();
	}
   public function totalHotel()
	{
		$this->db->from('tbl_w_hotel');
      return $this->db->count_all_results();
	}

    
}
