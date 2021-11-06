<?php

class M_pariwisata extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    return $this->db->query('SELECT *
        FROM  `tbl_w_alam` ORDER BY id DESC');
  }
 public function ubah($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_w_alam', $data);
    return TRUE;
  }
 public function ubah_edukasi($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_w_edukasi', $data);
    return TRUE;
  }
 public function ubah_media($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_banner', $data);
    return TRUE;
  }
 public function ubah_bahari($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_w_bahari', $data);
    return TRUE;
  }
 public function ubah_budaya($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_w_budaya', $data);
    return TRUE;
  }
 
 public function ubah_kuliner($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_w_kuliner', $data);
    return TRUE;
  }
 public function ubah_hotel($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_w_hotel', $data);
    return TRUE;
  }
 
public function hapus_alam($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
public function hapus_edukasi($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
public function hapus_bahari($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
public function hapus_kuliner($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
public function hapus_budaya($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
public function hapus_hotel($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    
}
