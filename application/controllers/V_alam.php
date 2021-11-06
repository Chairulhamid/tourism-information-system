<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_alam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_alam');
       
    }

    function v_alam(){

        $data['title'] = 'Wisata Alam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

	    $v_alam=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT * FROM tbl_w_alam WHERE daerah LIKE '%$v_alam'");
		 if($query->num_rows() > 0){
			 $data['data']=$query;
			 $data['category']=$this->db->get('tbl_kabkota');
 		
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_alam', $data);
             $this->load->view('templates/v_footer', $data);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>'.$v_alam.'</b> Tidak memiliki objek Wisata Alam!!! </div>');
			 redirect('v_alam/v_alam/');
		 }
        }

         function search(){
               $data['title'] = 'Wisata Alam';
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_f_alam->cari_berita($keyword);
				if($query->num_rows() > 0){
					$data['data']=$query;
					$data['category']=$this->db->get('tbl_kabkota');
  				
          $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_alam', $data);
             $this->load->view('templates/v_footer', $data);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">  <b>'.$keyword.'</b> Tidak dapat ditemukan!!</div>');
				 redirect('v_alam/v_alam/');
			 }
            }
        
      public function detail($id)
    {
        $data['title'] = 'Wisata Alam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_alam', ['id' => $id])->row_array();
         

       $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_detail_alam', $data);
             $this->load->view('templates/v_footer', $data);
    }
    
    
   
   
}