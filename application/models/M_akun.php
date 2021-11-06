<?php

class M_akun extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `user` ORDER BY id DESC');
  }
 public function ubah($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('user', $data);
    return TRUE;
  }
  	public function hapus_akun($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}