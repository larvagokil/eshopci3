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
        $data['user'] = $this->adminm->dataAdmin();
        $data['org'] = $this->adminm->dataUser();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function barang()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->adminm->dataAdmin();
        $data['barg'] = $this->barangm->ambil()->result_array();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/barang', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->adminm->dataAdmin();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->adminm->dataAdmin();


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
            $imglama = $this->input->post('imglama');
                
            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $new_image = $this->adminm->upload($_FILES['image']['name']);
            }else {
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
                redirect('admin/profile');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Profile anda gagal di update</div>');
                redirect('admin/edit');
            }
        }
    }

    public function transaksi()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->adminm->dataAdmin();
        $data['trans'] = $this->adminm->trans()->result_array();

        $this->load->view('templogin/dash_header', $data);
        $this->load->view('templogin/dash_sidebar', $data);
        $this->load->view('templogin/dash_topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templogin/dash_footer');
    }

    public function protrans($id,$status)
    {
        // ambil data barang
        $idb = $this->db->get_where('transaksi',['id_transaksi' => $id])->row_array()['id_barang'];
        $jml = $this->db->get_where('transaksi',['id_transaksi' => $id])->row_array()['jml_barang'];

        switch ($status) {
            case 'tolak':
                $ubah = $this->barangm->detail($idb)->row_array()['jml_barang'];
                // ubah stok barang kembali
                $ubah += $jml;
                $data['jml_barang'] = $ubah;
                $this->barangm->ubah($idb,$data);
                // memberi status ditolak
                // template update $this->db->update($tabel,$yang mau diubah, $uniqid)
                $this->db->update('transaksi',['status' => 'Gagal'],['id_transaksi' => $id]);
                break;
            
            case 'proses':
                $this->db->update('transaksi',['status' => 'Diproses'],['id_transaksi' => $id]);
                break;

            case 'selesai':
                $this->db->update('transaksi',['status' => 'Selesai'],['id_transaksi' => $id]);
                break;
            default:
                # code...
                break;
        }
        // lempar ke hal transaksi
        if ($this->db->affected_rows() < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Status Transaksi Gagal Diubah</div>');
            redirect('admin/transaksi');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Status Transaksi berhasil Diubah</div>');
            redirect('admin/transaksi');
        }
    }

    public function edit_brg()
    {
        $id = $this->input->post('id');
        $gbrlama = $this->input->post('gbr');

        if (!$_FILES['userfile']['name']) {
            $gbr = $gbrlama;
        } else {
            // buat upload filenya
            $gbr = $this->barangm->uplo($_FILES['userfile']['name']);
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

    public function hapus_brg($id)
    {
        // $id = $this->input->get('id');
        $cek = $this->barangm->hapus($id);
        if ($cek < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Gagal Dihapus</div>');
            redirect('admin/barang');
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data Berhasil dihapus</div>');
        redirect('admin/barang');
    }

    public function tambah_brg()
    {
        $gbr = $this->barangm->uplo($_FILES['userfile']['name']);
        $data = [
            'nm_barang' => $this->input->post('nm'),
            'gbr_barang' => $gbr,
            'dkr_barang' => $this->input->post('dkr'),
            'hrg_barang' => $this->input->post('hrg'),
            'jml_barang' => $this->input->post('jml'),
        ];

        if ($this->barangm->buat($data) < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Gagal Ditambah</div>');
            redirect('admin/barang');
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data Berhasil ditambah</div>');
        redirect('admin/barang');
    }

    public function delete_user($id)
    {
         // $id = $this->input->get('id');
         $cek = $this->adminm->hapus($id);
         if ($cek < 1) {
             $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Gagal Dihapus</div>');
             redirect('admin');
         }
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data Berhasil dihapus</div>');
         redirect('admin');
    }
}
