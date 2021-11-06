<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_about extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
       
    }
    function v_about(){

        $data['title'] = 'About';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['about'] = $this->db->get('tbl_about')->result_array();
  

        $this->form_validation->set_rules('judul', 'Jududul', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_about', $data);
             $this->load->view('templates/v_footer', $data);
		 
        }

        
}