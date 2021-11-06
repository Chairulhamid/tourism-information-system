<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_bahari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_bahari');
       
    }


    function v_bahari(){

        $data['title'] = 'Wisata Bahari';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

	    $v_bahari=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT * FROM tbl_w_bahari WHERE daerah LIKE '%$v_bahari%'");
		 if($query->num_rows() > 0){
			 $data['data']=$query;
			 $data['category']=$this->db->get('tbl_kabkota');
 		
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_bahari', $data);
             $this->load->view('templates/v_footer', $data);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>'.$v_bahari.'</b> Tidak memiliki objek Wisata Bahari!!! </div>');
			 redirect('v_bahari/v_bahari/');
		 }
        }

         function search(){
               $data['title'] = 'Wisata Bahari';
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_f_bahari->cari_berita($keyword);
				if($query->num_rows() > 0){
					$data['data']=$query;
					$data['category']=$this->db->get('tbl_kabkota');
  				
          $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_bahari', $data);
             $this->load->view('templates/v_footer', $data);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">  <b>'.$keyword.'</b> Tidak dapat ditemukan!!</div>');
				 redirect('v_bahari/v_bahari/');
			 }
            }
        
      public function detail($id)
    {
        $data['title'] = 'Wisata Bahari';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_bahari', ['id' => $id])->row_array();
         

       $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_detail_bahari', $data);
             $this->load->view('templates/v_footer', $data);
    }
    
    
   
   
}