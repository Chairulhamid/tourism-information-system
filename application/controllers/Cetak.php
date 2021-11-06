<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak
 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pariwisata');
    }

    public function cetak_alam()
    {
        $data['title'] = 'Wisata Alam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['alam'] = $this->db->get('tbl_w_alam')->result_array();
         

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('pariwisata/alam/cetak_alam', $data);
     
        } 
    }
    public function cetak_bahari()
    {
        $data['title'] = 'Wisata bahari';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bahari'] = $this->db->get('tbl_w_bahari')->result_array();
         

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('pariwisata/bahari/cetak_bahari', $data);
     
        } 
    }
    public function cetak_budaya()
    {
        $data['title'] = 'Wisata budaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['budaya'] = $this->db->get('tbl_w_budaya')->result_array();
         

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('pariwisata/budaya/cetak_budaya', $data);
     
        } 
    }
    public function cetak_edukasi()
    {
        $data['title'] = 'Wisata edukasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['edukasi'] = $this->db->get('tbl_w_edukasi')->result_array();
         

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('pariwisata/edukasi/cetak_edukasi', $data);
     
        } 
    }
    public function cetak_hotel()
    {
        $data['title'] = 'Wisata hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['hotel'] = $this->db->get('tbl_w_hotel')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('pariwisata/hotel/cetak_hotel', $data);
     
        } 
    }
    public function cetak_kuliner()
    {
        $data['title'] = 'Wisata kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kuliner'] = $this->db->get('tbl_w_kuliner')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('pariwisata/kuliner/cetak_kuliner', $data);
     
        } 
    }
    public function cetak_event()
    {
        $data['title'] = 'Wisata event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->db->get('tbl_event')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('event/cetak_event', $data);
     
        } 
    }
  
   
}