<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Main extends CI_Controller {

        public function index() {

            $data = [
                'judul' => 'E-shopindo',
                'brg' => $this->barangm->ambil()->result()
            ];

            $this->load->view('main.php',$data);
        }

    }

?>