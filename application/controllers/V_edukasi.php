<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_edukasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_edukasi');
       
    }


    function v_edukasi(){

        $data['title'] = 'Wisata Edukasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

	    $v_edukasi=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT * FROM tbl_w_edukasi WHERE daerah LIKE '%$v_edukasi%'");
		 if($query->num_rows() > 0){
			 $data['data']=$query;
			 $data['category']=$this->db->get('tbl_kabkota');
 		
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_edukasi', $data);
             $this->load->view('templates/v_footer', $data);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>'.$v_edukasi.'</b> Tidak memiliki objek Wisata edukasi!!! </div>');
			 redirect('v_edukasi/v_edukasi/');
		 }
        }

         function search(){
               $data['title'] = 'Wisata Edukasi';
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_f_edukasi->cari_berita($keyword);
				if($query->num_rows() > 0){
					$data['data']=$query;
					$data['category']=$this->db->get('tbl_kabkota');
  				
          $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_edukasi', $data);
             $this->load->view('templates/v_footer', $data);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">  <b>'.$keyword.'</b> Tidak dapat ditemukan!!</div>');
				 redirect('v_edukasi/v_edukasi/');
			 }
            }
        
      public function detail($id)
    {
        $data['title'] = 'Wisata Edukasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_edukasi', ['id' => $id])->row_array();
         

       $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_detail_edukasi', $data);
             $this->load->view('templates/v_footer', $data);
    }
    
    
   
   
}