<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    public function index()
    {
        $data['title'] = 'Nama Kabupaten & Kota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kabKota'] = $this->db->get('tbl_kabKota')->result_array();

        $this->form_validation->set_rules('namakabKota', 'Nama Kab/Kota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tbl_kabKota', ['namakabKota' => $this->input->post('namakabKota')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kab/Kota Berhasil Ditambahkan!!</div>');
            redirect('kategori');
        }
    }

 public function edit($id)
  {
    $data['title'] = 'Edit Data Kab/Kota';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->db->get_where('tbl_kabKota', ['id' => $id])->row_array();


    if ($this->input->post('simpan')) {
      $upId = array('namakabKota' => $this->input->post('namakabKota'));
      $this->db->where('id', $id);
      $this->db->update('tbl_kabKota', $upId);
      redirect('kategori');
    }


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kategori/edit', $data);
    $this->load->view('templates/footer');
  }
  public function hapus($id)
  {
    $where = array('id' => $id);
    $this->m_kategori->hapus_data($where, 'tbl_kabKota');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('kategori');
  }
}