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

    public function probeli()
    {
        if (! $this->session->userdata('email')) {   
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
        $ubah = $this->db->get_where('barang',['id_barang' => $idb])->row_array()['jml_barang'];
        $ubah -= $this->input->post('jumlah');
        $this->db->update('barang',['jml_barang' => $ubah],['id_barang' => $idb]);
        // lempar ke hal transaksi
        if ($this->db->affected_rows() < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Transaksi Gagal</div>');
            redirect('main');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Transaksi berhasil</div>');
            redirect('main/transaksi');
        }

    }
}
