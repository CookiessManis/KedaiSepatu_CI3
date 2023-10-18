<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_kategori');
    }

    public function index()
    {
        $data['title'] = 'Kelola Kategori';
        $data['Kategori'] = $this->M_kategori->get_all_data();

        $this->load->view('templates/v_head');
        $this->load->view('templates/v_temp_sidebar');
        $this->load->view('templates/v_temp_navbar');
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/v_temp_footer');
    }

    public function add()
    {
        $data['nama_kategori'] = $this->input->post('nama_kategori');

        $this->M_kategori->add($data);
        $this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambahkan!!');

        redirect('kategori');
    }

    public function edit($id_kategori = NULL)
    {
        $data['id_kategori'] = $id_kategori;
        $data['nama_kategori'] = $this->input->post('nama_kategori');

        $this->M_kategori->edit($data);
        $this->session->set_flashdata('pesan', 'Kategori Berhasil DiUbah');
        redirect('kategori');
    }

    public function delete($id_kategori = NULL)
    {
        $data['id_kategori'] = $id_kategori;
        $this->M_kategori->delete($data);
        $this->session->set_flashdata('pesan','Kategori Berhasil dihapus');
        redirect('kategori');
    }
}
