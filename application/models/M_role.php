<?php

class M_role extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `user_role` ORDER BY id DESC');
  }
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    
}
