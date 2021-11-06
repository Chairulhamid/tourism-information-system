<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_event');
    }

    public function index()
    {
       $data['title'] = 'Event Sumbar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->db->get('tbl_event')->result_array();
        $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();

        $this->form_validation->set_rules('nama_event', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('event/index', $data);
            $this->load->view('templates/footer');  
        } 
    
    }
    public function tambah_event()
    {
        $data['title'] = 'Tambah Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('event/tambah_event', $data);
            $this->load->view('templates/footer');  
        } 
    }

    public function tambah_data_event()
    {
            $nama_event   = $this->input->post('nama_event');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $tanggal     = $this->input->post('tanggal');
            $deskripsi      = $this->input->post('deskripsi');

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
            'nama_event'  => $nama_event,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'tanggal'  => $tanggal,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_event', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('event');
        }

         public function ubah()
  {
    $id = $this->input->post('id');

            $nama_event   = $this->input->post('nama_event');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $tanggal   = $this->input->post('tanggal');
            $deskripsi      = $this->input->post('deskripsi');

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
            'nama_event'  => $nama_event,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'tanggal'  => $tanggal,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_event->ubah($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('event');
        }
   

   public function hapus_event($id)
  {
    $where = array('id' => $id);
    $this->m_event->hapus_event($where, 'tbl_event');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('event');
  }
  public function detail_event($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_event', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('event/detail', $data);
        $this->load->view('templates/footer');
    }
}