<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_role');
        $this->load->model('m_akun');

        $this->load->model('dashboard_model', 'dashboard');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['total_alam'] = $this->dashboard->totalAlam();
        $data['total_bahari'] = $this->dashboard->totalBahari();
        $data['total_kuliner'] = $this->dashboard->totalKuliner();
        $data['total_budaya'] = $this->dashboard->totalBudaya();
        $data['total_edukasi'] = $this->dashboard->totalEdukasi();
        $data['total_hotel'] = $this->dashboard->totalHotel();
       

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function akun()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['akun'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/akun', $data);
        $this->load->view('templates/footer');
    }
  public function addAkun()
  {
    $data['title'] = 'Tambah Akun';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/addAkun', $data);
    $this->load->view('templates/footer');
  }
  public function verifikasiAkun()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
    $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');

    if ($this->form_validation->run() == false) {
      $this->addAkun();
    } else {
      // Create Data
      $dataUser = [
        'name'         => $this->input->post('nama'),
        'email'        => $this->input->post('email'),
        'image'        => 'default.jpg',
        'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        'role_id'      => $this->input->post('role'),
        'is_active'    => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $dataUser);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!!</div>');
      redirect('Admin/akun');
    }
  }
  public function ubahAkun()
  {
    $id = $this->input->post('id');

            $name   = $this->input->post('name');
            $email         = $this->input->post('email');
           

             $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png';
                $config['maz_size'] = '3072';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = ['image'];
                    if ($old_image != 'default.jpg') {
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array (
            'name'  => $name,
            'email'  => $email,
           
        );
        
         $this->m_akun->ubah($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/akun');
        }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kab/Kota Berhasil Ditambahkan!!</div>');
            redirect('admin/role');
        }
    }
    public function editRole($id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['edit'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
         if ($this->input->post('simpan')) {
      $data = array('role' => $this->input->post('role'));
      $this->db->where('id', $id);
      $this->db->update('user_role', $data);
      redirect('admin/role');
    }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editRole', $data);
        $this->load->view('templates/footer');
    }
     public function hapus($id)
  {
    $where = array('id' => $id);
    $this->m_role->hapus_data($where, 'user_role');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('admin/role');
  }
     public function hapusAkun($id)
  {
    $where = array('id' => $id);
    $this->m_akun->hapus_akun($where, 'user');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!! </div>');
    redirect('admin/akun');
  }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Diubah!</div>');
    }
}
