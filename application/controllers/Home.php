<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_home');
       
    }

    public function index()
    {
       $data['title'] = 'Wisata Alam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['banners'] = $this->db->get('tbl_banner')->result_array();
        $data['alam'] = $this->m_f_home->get_wisata_alam();
        $data['bahari'] = $this->m_f_home->get_wisata_bahari();
        $data['kuliner'] = $this->m_f_home->get_wisata_kuliner();
        $data['budaya'] = $this->m_f_home->get_wisata_budaya();
        $data['edukasi'] = $this->m_f_home->get_wisata_edukasi();
        $data['hotel'] = $this->m_f_home->get_wisata_hotel();
        $data['event'] = $this->m_f_home->get_event();
        $data['about'] = $this->m_f_home->get_about();
       

       
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/v_header', $data);
            // $this->load->view('templates/sidebar', $data);
            // $this->load->view('templates/topbar', $data);
            $this->load->view('front/index', $data);
            $this->load->view('templates/v_footer', $data);
             
        } 
    
    }
   
}