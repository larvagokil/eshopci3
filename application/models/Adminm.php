<?php

class Adminm extends CI_Model
{

    public function dataAdmin()
    {
        return $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function dataUser()
    {
        return $this->db->get_where('users', ['role_id' => 2])->result_array();
    }

    public function trans()
    {
        return $this->db->get('transaksi');
    }

    public function edit($name, $email, $new_image)
    {
        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('users', $new_image);
    }

    public function upload($upload_image)
    {
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
    }
}
