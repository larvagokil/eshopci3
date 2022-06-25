<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Main extends CI_Controller {

        public function index() {

            $data = [
                'judul' => 'E-shopindo',
                'brg' => $this->barangm->ambil()->result()
            ];

            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('main',$data);
            $this->load->view('templates/footer');
        }

        public function detail($id) {

            // $id = $this->input->get('id');
            
            // cek apa bener ada datanya
            $cek = $this->barangm->detail($id);
            if ($cek->num_rows() < 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, Data Tidak Ditemukan</div>');
                redirect('main');
                    exit();
            }
            $data = [
                'judul' => $cek->row_array()['nm_barang'],
                'brg' => $cek->row_array(),
                'id' => $id
            ];
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('detail',$data);
            $this->load->view('templates/footer');

        }

        public function cari()
        {
            $kata = $this->input->post('cari');
            $hasil = $this->barangm->cari($kata);

            if ($hasil->num_rows() < 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Wah..., Produk dengan kata kunci tersebut Tidak Ditemukan, Coba kata kunci lain atau cek produk rekomendasi di bawah.</div>');
                redirect(base_url());
                    exit();
            }
            $data = [
                'judul' => 'Hasil dari ' . $kata,
                'brg' => $hasil->result()
            ];

            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('main',$data);
            $this->load->view('templates/footer');
        }

        public function about() {

            $data = [
                'judul' => 'about',
                'brg' => $this->barangm->ambil()->result()
            ];

            $this->load->view('templates/header',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('about',$data);
            $this->load->view('templates/footer');
        }

    }

?>