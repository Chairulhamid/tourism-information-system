<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_kuliner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_kuliner');
       
    }


    function v_kuliner(){

        $data['title'] = 'Wisata Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

	    $v_kuliner=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT * FROM tbl_w_kuliner WHERE daerah LIKE '%$v_kuliner%'");
		 if($query->num_rows() > 0){
			 $data['data']=$query;
			 $data['category']=$this->db->get('tbl_kabkota');
 		
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_kuliner', $data);
             $this->load->view('templates/v_footer', $data);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>'.$v_kuliner.'</b> Tidak memiliki objek Wisata Kuliner!!! </div>');
			 redirect('v_kuliner/v_kuliner/');
		 }
        }

         function search(){
               $data['title'] = 'Wisata Kuliner';
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_f_kuliner->cari_berita($keyword);
				if($query->num_rows() > 0){
					$data['data']=$query;
					$data['category']=$this->db->get('tbl_kabkota');
  				
          $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_kuliner', $data);
             $this->load->view('templates/v_footer', $data);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">  <b>'.$keyword.'</b> Tidak dapat ditemukan!!</div>');
				 redirect('v_kuliner/v_kuliner/');
			 }
            }
        
      public function detail($id)
    {
        $data['title'] = 'Wisata Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_kuliner', ['id' => $id])->row_array();
         

       $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_detail_kuliner', $data);
             $this->load->view('templates/v_footer', $data);
    }
    
    
   
   
}