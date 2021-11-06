<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_budaya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_budaya');
       
    }


    function v_budaya(){

        $data['title'] = 'Wisata Budaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

	    $v_budaya=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT * FROM tbl_w_budaya WHERE daerah LIKE '%$v_budaya%'");
		 if($query->num_rows() > 0){
			 $data['data']=$query;
			 $data['category']=$this->db->get('tbl_kabkota');
 		
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_budaya', $data);
             $this->load->view('templates/v_footer', $data);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>'.$v_budaya.'</b> Tidak memiliki objek Wisata Budaya!!! </div>');
			 redirect('v_budaya/v_budaya/');
		 }
        }

         function search(){
               $data['title'] = 'Wisata Budaya';
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_f_budaya->cari_berita($keyword);
				if($query->num_rows() > 0){
					$data['data']=$query;
					$data['category']=$this->db->get('tbl_kabkota');
  				
          $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_budaya', $data);
             $this->load->view('templates/v_footer', $data);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">  <b>'.$keyword.'</b> Tidak dapat ditemukan!!</div>');
				 redirect('v_budaya/v_budaya/');
			 }
            }
        
      public function detail($id)
    {
        $data['title'] = 'Wisata Budaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_budaya', ['id' => $id])->row_array();
         

       $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_detail_budaya', $data);
             $this->load->view('templates/v_footer', $data);
    }
    
    
   
   
}