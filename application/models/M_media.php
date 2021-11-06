<?php

class M_media extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_banner` ORDER BY id DESC');
  }
  public function ubah_banner($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_banner', $data);
    return TRUE;
  }
  public function ubah_about($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_about', $data);
    return TRUE;
  }
 
  public function hapus_banner($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}