<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');
    }

    public function index()
    {

        $data = array(
            'isi' => "admin/laporan",
            'title' => "Laporan Penjualan",
            'laporan' => $this->M_laporan->get_all_data(),

        );
        $this->load->view('templates/v_wrapper_backend', $data);
    }
    public function search()
    {
        $search = $this->input->post('search');
        $data['laporan'] = $this->M_laporan->get_search($search);

        $data = array(
            'title' => 'laporan Penjualan',
            'laporan' => $this->M_laporan->get_search($search),
            'isi' => "admin/laporan",
        );
        $this->load->view('templates/v_wrapper_backend', $data);
    }

    public function laporan_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'isi' => 'admin/laporan_bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->M_laporan->laporan_bulanan($bulan, $tahun)
        );
        $this->load->view('templates/v_wrapper_backend', $data, false);
    }
    public function laporan_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Tahunan',
            'isi' => 'admin/laporan_tahunan',
            'tahun' => $tahun,
            'laporan' => $this->M_laporan->laporan_tahunan($tahun)
        );
        $this->load->view('templates/v_wrapper_backend', $data, false);
    }
}

/* End of file Laporan.php */
