<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_barang');
    }
    public function index()
    {
        
        $data = array(
            'title' => 'Halaman Utama',
            'barang' => $this->M_barang->get_all_data(),
            'isi' => 'v_home',
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data);
    }
    public function search()
    {
        $search = $this->input->post('search');
        $data['barang'] = $this->M_barang->get_search($search);

        $data = array(
            'title' => 'Halaman Utama',
            'barang' => $this->M_barang->get_search($search),
            'isi' => 'v_home',
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->M_barang->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori Barang : ' . $kategori->nama_kategori,
            'barang' => $this->M_barang->get_all_data_barang($id_kategori),
            'isi' => 'v_kategori_barang',
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
    }
    public function detail_barang($id_barang)
    {
        $data = array(
            'title' => 'Detail Barang',
            'gambar' => $this->M_barang->gambar_barang($id_barang),
            'barang' => $this->M_barang->detail_barang($id_barang),
            'isi' => 'barang/detail_barang',
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
    }
}
