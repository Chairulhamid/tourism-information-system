<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_media');
    }

    public function banner()
    {
        $data['title'] = 'Data Banner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['banner'] = $this->db->get('tbl_banner')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('rext', 'rext', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('media/banner/banner', $data);
            $this->load->view('templates/footer');  
        } 
    }
     public function ubah_banner()
    {
    $id = $this->input->post('id');

            $judul   = $this->input->post('judul');
            $text         = $this->input->post('text');
            

             $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['maz_size'] = '3072';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = ['gambar'];
                    if ($old_image != 'default.jpg') {
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array (
            'judul'  => $judul,
            'text'  => $text,

        );
        
         $this->m_media->ubah_banner($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('media/banner');
        }
        public function tambah_banner()
    {
        $data['title'] = 'Tambah Data Banner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['banner'] = $this->db->get('tbl_banner')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('media/banner/tambah_banner', $data);
            $this->load->view('templates/footer');  
        } 
    }
    // tambah data wisata Alam
    public function tambah_data_banner()
    {
            $judul   = $this->input->post('judul');
            $text         = $this->input->post('text');
           
             $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['maz_size'] = '3072';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = ['gambar'];
                    if ($old_image != 'default.jpg') {
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array (
            'judul'  => $judul,
            'text'  => $text,
        );
        
        $this->db->insert('tbl_banner', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('media/banner');
        }

         public function hapus_banner($id)
  {
    $where = array('id' => $id);
    $this->m_media->hapus_banner($where, 'tbl_banner');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('media/banner');
  }
    public function detail_banner($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_banner', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('media/banner/detail', $data);
        $this->load->view('templates/footer');
    }
    public function about()
    {
        $data['title'] = 'Data About';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['about'] = $this->db->get('tbl_about')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('desktipsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('media/about/about', $data);
            $this->load->view('templates/footer');  
        } 
    }
          public function ubah_about()
    {
    $id = $this->input->post('id');

            $judul   = $this->input->post('judul');
            $deskripsi         = $this->input->post('deskripsi');
            

             $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['maz_size'] = '3072';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = ['gambar'];
                    if ($old_image != 'default.jpg') {
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array (
            'judul'  => $judul,
            'deskripsi'  => $deskripsi,

        );
        
         $this->m_media->ubah_about($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('media/about');
        }
        public function detail_about($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_about', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('media/about/detail_about', $data);
        $this->load->view('templates/footer');
    }
    

}