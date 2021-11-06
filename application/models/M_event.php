<?php

class M_event extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_event` ORDER BY id DESC');
  }
  public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_event', $data);
		return TRUE;
	}
	
	public function hapus_event($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    
}
