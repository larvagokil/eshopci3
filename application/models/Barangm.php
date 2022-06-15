<?php

class Barangm extends CI_Model {


    public function buat ($data) {
        $this->db->insert('barang', $data);
        $tr = $this->db->affected_rows();
         return $tr;
    }

    public function ambil () {
        return $this->db->get('barang');
    }

    public function ubah ($id, $data) {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);

        return $this->db->affected_rows();
    }

    public function hapus ($id) {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');

        return $this->db->affected_rows();
    }

    public function uplo($file) {
             
        if ($file) {    // buat upload filenya
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 3000;
            $config['max_width']            = 4000;
            $config['max_height']           = 4000;
            $config['file_name']            = 'brg'. + uniqid();

            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('userfile')){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Mohon maaf, gambar tidak bisa diupload karena tidak sesuai dengan ketentuan</div>');
                    redirect('admin');
            }
            return $this->upload->data('file_name');
            }
        
    }
}