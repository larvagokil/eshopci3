<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        cek_login();
    }

    public function beli()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Anda harus login dulu sebelum membeli barang</div>');
            redirect('main');
        }

        $id = $this->input->post('id');
        $jml = $this->input->post('jumlah');
        $cek = $this->barangm->detail($id);
        if ($cek->num_rows() < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Tidak Ditemukan</div>');
            redirect('main');
            exit();
        }
        $data = [
            'title' => 'Beli barang',
            'brg' => $cek->row_array(),
            'jml' => $jml
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('beli', $data);
        $this->load->view('templates/footer');
    }

    public function probeli()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Anda harus login dulu sebelum membeli barang</div>');
            redirect('main');
        }

        $waktu      = date('Y-m-d H:i:s');
        $id_trans   = "ESI-";
        $id_trans   .= date('YmdHis');
        $idb = $this->input->post('id');
        $data = [
            'id_transaksi' => $id_trans,
            'nm_lengkap' => htmlspecialchars($this->input->post('namalengkap')),
            'nm_user' => $this->session->userdata('email'),
            'no_telp' => $this->input->post('nomortelp'),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'jeniskirim' => $this->input->post('jeniskirim'),
            'jenisbayar' => $this->input->post('jenisbayar'),
            'id_barang' => $idb,
            'jml_barang' => $this->input->post('jumlah'),
            'total_harga' => $this->input->post('total'),
            'status' => 'Menunggu Konfirmasi',
            'waktu_transaksi' => $waktu,
        ];
        $this->db->insert('transaksi', $data);
        // ubah stok di database
        $ubah = $this->db->get_where('barang', ['id_barang' => $idb])->row_array()['jml_barang'];
        $ubah -= $this->input->post('jumlah');
        $this->db->update('barang', ['jml_barang' => $ubah], ['id_barang' => $idb]);
        // lempar ke hal transaksi
        if ($this->db->affected_rows() < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Transaksi Gagal</div>');
            redirect('main');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Transaksi berhasil</div>');
            redirect('user/transaksi');
        }
    }

    public function transaksi()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Anda harus login dulu sebelum membeli barang</div>');
            redirect('main');
        }
        $data = [
            'title' => 'Transaksi',
            'trx' => $this->db->get_where('transaksi', ['nm_user' => $this->session->userdata('email')])->result_array(),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->adminm->dataAdmin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->adminm->dataAdmin();


        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $imglama = $this->input->post('imglama');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $new_image = $this->adminm->upload($_FILES['image']['name']);
            } else {
                $new_image = $imglama;
            }

            $ardata = [
                'name' => $name,
                'image' => $new_image
            ];
            $que = $this->adminm->edit($email, $ardata);
            if ($que > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your Profile has been Updated</div>');
                redirect('user/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Profile anda gagal di update</div>');
                redirect('user/edit');
            }
        }
    }
}
