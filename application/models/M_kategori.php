<?php

class M_kategori extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_kabkota` ORDER BY id DESC');
  }
  public function ubah($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_kabkota', $data);
		return TRUE;
	}
	
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    
}
