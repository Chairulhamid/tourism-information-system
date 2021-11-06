<?php
defined('BASEPATH') or exit('No direct script access allowed');

class V_hotel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_f_hotel');
       
    }


    function v_hotel(){

        $data['title'] = 'Hotel & Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

	    $v_hotel=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT * FROM tbl_w_hotel WHERE daerah LIKE '%$v_hotel%'");
		 if($query->num_rows() > 0){
			 $data['data']=$query;
			 $data['category']=$this->db->get('tbl_kabkota');
 		
            $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_hotel', $data);
             $this->load->view('templates/v_footer', $data);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>'.$v_hotel.'</b> Tidak ada Penginapan!!! </div>');
			 redirect('v_hotel/v_hotel/');
		 }
        }

         function search(){
               $data['title'] = 'Hotel & Penginapan';
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_f_hotel->cari_berita($keyword);
				if($query->num_rows() > 0){
					$data['data']=$query;
					$data['category']=$this->db->get('tbl_kabkota');
  				
          $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_hotel', $data);
             $this->load->view('templates/v_footer', $data);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">  <b>'.$keyword.'</b> Tidak dapat ditemukan!!</div>');
				 redirect('v_hotel/v_hotel/');
			 }
            }
        
      public function detail($id)
    {
        $data['title'] = 'Hotel & Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_hotel', ['id' => $id])->row_array();
         

       $this->load->view('templates/v_header', $data);
			$this->load->view('front/v_detail_hotel', $data);
             $this->load->view('templates/v_footer', $data);
    }
    
    
   
   
}