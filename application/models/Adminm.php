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
}
