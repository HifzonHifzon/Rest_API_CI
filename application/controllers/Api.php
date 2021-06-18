<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function biodata_get()
    {

        $id = $this->uri->segment(3);

        if ($id === null) {
            $data  = $this->db->get('tb_biodata');

            $this->response([
                'status' => true,
                'message' => 'all data biodata',
                'rows' => $data->num_rows(),
                'data' => $data->result(),
            ], 200);

        } else {
        
            $this->db->where('id',$id);
            $data  = $this->db->get('tb_biodata');

            $this->response([
                'status' => true,
                'message' => 'all data biodata',
                'rows' => $data->num_rows(),
                'data' => $data->result(),
            ], 200);

        }
    }

    function biodata_post(){
        $nama = $this->input->post('nama');
        $usia = $this->input->post('usia');
        $alamat = $this->input->post('alamat');
        $sekolah = $this->input->post('sekolah');


        $data = array(
            "nama" => $nama,
            "usia" => $usia,
            "alamat" => $alamat, 
            "sekolah" => $sekolah,
        );
       
        $exec = $this->db->insert('tb_biodata', $data);

        print_r($exec);
    }
}