<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        cek_login();
    }

    public function beli()
    {
        if (! $this->session->userdata('email')) {   
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
            'judul' => 'Beli barang',
            'brg' => $cek->row_array(),
            'jml' => $jml
        ];
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('beli',$data);
        $this->load->view('templates/footer');
    }
}
