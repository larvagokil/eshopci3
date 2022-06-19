<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        cek_login();
    }
    public function index()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['org'] = $this->db->get('users')->result_array();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function barang()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['barg'] = $this->db->get('barang')->result_array();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/barang', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templogin/dash_header', $data);
            $this->load->view('templogin/dash_sidebar', $data);
            $this->load->view('templogin/dash_topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templogin/dash_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'svg|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your Profile has been Updated</div>');
            redirect('admin/profile');
        }
    }

    public function transaksi()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['trans'] = $this->db->get('transaksi')->result_array();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function edit_brg()
    {               
        $id = $this->input->post('id');
        $gbrlama = $this->input->post('gbr');

        if (! $_FILES['userfile']['name']) {
            $gbr = $gbrlama;
        }else {
            // buat upload filenya
            $gbr = $this->barangm->uplo($_FILES['userfile']['name']);;
        }
        $data = [
            'nm_barang' => $this->input->post('nm'),
            'dkr_barang' => $this->input->post('dkr'),
            'hrg_barang' => $this->input->post('hrg'),
            'jml_barang' => $this->input->post('jml'),
            'gbr_barang' => $gbr
        ];

        $kue = $this->barangm->ubah($id, $data);
            if ($kue < 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Gagal Diubah</div>');
                redirect('admin/barang');
            } 
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data Berhasil diubah</div>');
                redirect('admin/barang');
    }

    public function hapus_brg($id) {
        // $id = $this->input->get('id');
        $cek = $this->barangm->hapus($id);
        if ($cek < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Gagal Dihapus</div>');
            redirect('admin/barang');
        } 
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data Berhasil dihapus</div>');
            redirect('admin/barang');
    }
}
