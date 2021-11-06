<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pariwisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pariwisata');
    }

    public function alam()
    {
        $data['title'] = 'Wisata Alam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['alam'] = $this->db->get('tbl_w_alam')->result_array();
         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/alam/alam', $data);
            $this->load->view('templates/footer');  
        } 
    }
    public function ubah()
  {
    $id = $this->input->post('id');

            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
            $deskripsi      = $this->input->post('deskripsi');

             $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['maz_size'] = '3072';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = ['foto'];
                    if ($old_image != 'default.jpg') {
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array (
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_pariwisata->ubah($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pariwisata/alam');
        }

    public function tambah_alam()
    {
        $data['title'] = 'Tambah Wisata Alam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/alam/tambah_alam', $data);
            $this->load->view('templates/footer');  
        } 
    }
    // tambah data wisata Alam
    public function tambah_data_alam()
    {
            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
            $deskripsi      = $this->input->post('deskripsi');

             $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['maz_size'] = '3072';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = ['foto'];
                    if ($old_image != 'default.jpg') {
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array (
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_w_alam', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('pariwisata/alam');
        }

         public function hapus_alam($id)
  {
    $where = array('id' => $id);
    $this->m_pariwisata->hapus_alam($where, 'tbl_w_alam');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('pariwisata/alam');
  }

        
        
    // WISATA BAHARI
    public function bahari()
    {
        $data['title'] = 'Wisata Bahari';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bahari'] = $this->db->get('tbl_w_bahari')->result_array();

         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/bahari/bahari', $data);
            $this->load->view('templates/footer');
        }
      
    }

     public function tambah_bahari()
    {
        $data['title'] = 'Tambah Wisata Bahari';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/bahari/tambah_bahari', $data);
            $this->load->view('templates/footer');  
        } 
    }

    // tambah data wisata bahari
    public function tambah_data_bahari()
    {
            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_w_bahari', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('pariwisata/bahari');
        }

         public function ubah_bahari()
    {
    $id = $this->input->post('id');

            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_pariwisata->ubah_bahari($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pariwisata/bahari');
        }

         public function hapus_bahari($id)
  {
    $where = array('id' => $id);
    $this->m_pariwisata->hapus_bahari($where, 'tbl_w_bahari');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('pariwisata/bahari');
  }

    
    public function kuliner()
    {
        $data['title'] = 'Wisata Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kuliner'] = $this->db->get('tbl_w_kuliner')->result_array();
        $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/kuliner/kuliner', $data);
            $this->load->view('templates/footer');
        }
     
    }

      public function tambah_kuliner()
    {
        $data['title'] = 'Tambah Wisata Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/kuliner/tambah_kuliner', $data);
            $this->load->view('templates/footer');  
        } 
    }

    // tambah data wisata Kuliner
    public function tambah_data_kuliner()
    {
            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
            $deskripsi      = $this->input->post('deskripsi');

             $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['maz_size'] = '2048';
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_w_kuliner', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('pariwisata/kuliner');
        }
         public function ubah_kuliner()
    {
    $id = $this->input->post('id');

            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_pariwisata->ubah_kuliner($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pariwisata/kuliner');
        }
        
            public function hapus_kuliner($id)
  {
    $where = array('id' => $id);
    $this->m_pariwisata->hapus_kuliner($where, 'tbl_w_kuliner');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('pariwisata/kuliner');
  }
        //BUDAYA
    public function budaya()
    {
        $data['title'] = 'Wisata Budaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['budaya'] = $this->db->get('tbl_w_budaya')->result_array();
          $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/budaya/budaya', $data);
            $this->load->view('templates/footer');
        }
      
    }

      public function tambah_budaya()
    {
        $data['title'] = 'Tambah Wisata Budaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/budaya/tambah_budaya', $data);
            $this->load->view('templates/footer');  
        } 
    }

    // tambah data wisata Kuliner
    public function tambah_data_budaya()
    {
            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
            $deskripsi      = $this->input->post('deskripsi');

             $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['maz_size'] = '2048';
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_w_budaya', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('pariwisata/budaya');
        }
         public function ubah_budaya()
    {
    $id = $this->input->post('id');

            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_pariwisata->ubah_budaya($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pariwisata/budaya');
        }
        
        public function hapus_budaya($id)
  {
    $where = array('id' => $id);
    $this->m_pariwisata->hapus_budaya($where, 'tbl_w_budaya');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('pariwisata/budaya');
  }

        // HOTEL
    public function hotel()
    {
        $data['title'] = 'Tempat Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['hotel'] = $this->db->get('tbl_w_hotel')->result_array();
         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();

        $this->form_validation->set_rules('nama_hotel', 'Nama Hotel', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif', 'required');
        $this->form_validation->set_rules('nohp', 'No hp', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/hotel/hotel', $data);
            $this->load->view('templates/footer');
        }
    }
      public function tambah_hotel()
    {
        $data['title'] = 'Tambah Data Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/hotel/tambah_hotel', $data);
            $this->load->view('templates/footer');  
        } 
    }

    // tambah data wisata Kuliner
    public function tambah_data_hotel()
    {
            $nama_hotel   = $this->input->post('nama_hotel');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $tarif   = $this->input->post('tarif');
            $nohp   = $this->input->post('nohp');
            $deskripsi      = $this->input->post('deskripsi');

             $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['maz_size'] = '2048';
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
            'nama_hotel'  => $nama_hotel,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'tarif'  => $tarif,
            'nohp'  => $nohp,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_w_hotel', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('pariwisata/hotel');
        }

         public function ubah_hotel()
    {
    $id = $this->input->post('id');

            $nama_hotel   = $this->input->post('nama_hotel');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $tarif          = $this->input->post('tarif');
            $nohp           = $this->input->post('nohp');
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
            'nama_hotel'  => $nama_hotel,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'tarif'  => $tarif,
            'nohp'  => $nohp,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_pariwisata->ubah_hotel($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pariwisata/hotel');
        }
              public function hapus_hotel($id)
  {
    $where = array('id' => $id);
    $this->m_pariwisata->hapus_hotel($where, 'tbl_w_hotel');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('pariwisata/hotel');
  }

    //   DETAIL............................ 
     public function detail_alam($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_alam', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pariwisata/alam/detail', $data);
        $this->load->view('templates/footer');
    }
     public function detail_bahari($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_bahari', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pariwisata/bahari/detail', $data);
        $this->load->view('templates/footer');
    }
     public function detail_kuliner($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_kuliner', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pariwisata/kuliner/detail', $data);
        $this->load->view('templates/footer');
    }
     public function detail_budaya($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_budaya', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pariwisata/budaya/detail', $data);
        $this->load->view('templates/footer');
    }
     public function detail_edukasi($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_edukasi', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pariwisata/edukasi/detail', $data);
        $this->load->view('templates/footer');
    }
     public function detail_hotel($id)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['detail'] = $this->db->get_where('tbl_w_hotel', ['id' => $id])->row_array();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pariwisata/hotel/detail', $data);
        $this->load->view('templates/footer');
    }

    // ////////////////////////////////////////EDUKASI/////////////////////////

    public function edukasi()
    {
        $data['title'] = 'Wisata Edukasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['edukasi'] = $this->db->get('tbl_w_edukasi')->result_array();
         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();

        $this->form_validation->set_rules('objek_wisata', 'Objek Wisata', 'required');
        $this->form_validation->set_rules('daerah', 'Daerah', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jarak_tempuh', 'jarak_tempuh', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/edukasi/edukasi', $data);
            $this->load->view('templates/footer');  
        } 
    }
    public function ubah_edukasi()
  {
    $id = $this->input->post('id');

            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
         $this->m_pariwisata->ubah_edukasi($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pariwisata/edukasi');
        }

    public function tambah_edukasi()
    {
        $data['title'] = 'Tambah Wisata Edukasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['kategori'] = $this->db->get('tbl_kabkota')->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pariwisata/edukasi/tambah_edukasi', $data);
            $this->load->view('templates/footer');  
        } 
    }
    // tambah data wisata Alam
    public function tambah_data_edukasi()
    {
            $objek_wisata   = $this->input->post('objek_wisata');
            $daerah         = $this->input->post('daerah');
            $lokasi         = $this->input->post('lokasi');
            $jarak_tempuh   = $this->input->post('jarak_tempuh');
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
            'objek_wisata'  => $objek_wisata,
            'daerah'  => $daerah,
            'lokasi'  => $lokasi,
            'jarak_tempuh'  => $jarak_tempuh,
            'deskripsi'  => $deskripsi,
            
        );
        
        $this->db->insert('tbl_w_edukasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan </div>');
        redirect('pariwisata/edukasi');
        }

         public function hapus_edukasi($id)
  {
    $where = array('id' => $id);
    $this->m_pariwisata->hapus_edukasi($where, 'tbl_w_edukasi');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('pariwisata/edukasi');
  }

        

   
}