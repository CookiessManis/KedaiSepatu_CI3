<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('M_admin');
	}
	public function index()
	{
		
		$data = array(
			'title' => 'Halaman Dashboard',
			'isi' => 'v_dashboard',
			'total_barang' => $this->M_admin->total_barang(),
			'total_kategori' => $this->M_admin->total_kategori(),
			'total_laporan' => $this->M_admin->total_laporan(),
			'total_pesanan' => $this->M_admin->total_pesanan()
		);
		$this->load->view('templates/v_wrapper_backend', $data);
	}
}
