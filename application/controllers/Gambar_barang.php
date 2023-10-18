<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gambar_barang');
        $this->load->model('M_barang');
    }
    public function index()
    {
        $data = array(
            'title' => 'Kelola Gambar Barang',
            'gambarbarang' => $this->M_gambar_barang->get_all_data(),
            'isi' => 'gambar_barang/index'
        );
        $this->load->view('templates/v_wrapper_backend', $data, false);
    }

    public function add($id_barang)
    {

        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|trim',
            array('required' => '%s Harus Diisi')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar_barang/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Gambar Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'barang' => $this->M_barang->get_data($id_barang),
                    'gambar' => $this->M_gambar_barang->get_gambar($id_barang),
                    'isi' => 'gambar_barang/add'
                );
                $this->load->view('templates/v_wrapper_backend', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar_barang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_barang' => $id_barang,
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->M_gambar_barang->add($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan');
                redirect('gambar_barang/add/' . $id_barang);
            }
        }
        $data = array(
            'title' => 'Tambah Gambar Barang',
            'barang' => $this->M_barang->get_data($id_barang),
            'gambar' => $this->M_gambar_barang->get_gambar($id_barang),
            'isi' => 'gambar_barang/add',
        );
        $this->load->view('templates/v_wrapper_backend', $data, false);
    }

    public function delete($id_barang, $id_gambar)
    {
        //menghapus gambar pada bagian file manager 
        $gambar = $this->M_gambar_barang->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambar_barang/' . $gambar->gambar);
        }
        //end hapus gambar 

        $data = array('id_gambar' => $id_gambar);
        $this->M_gambar_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus');
        redirect('gambar_barang/add/' . $id_barang);
    }
}
