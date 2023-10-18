<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_masuk extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    

    public function index()
	{
		$data = array(
            'title' => 'Pesanan Masuk',
            'total_barang' => $this->M_admin->total_barang(),
            'total_kategori' => $this->M_admin->total_kategori(),
            'pesanan_masuk' => $this->M_admin->pesanan_masuk(),
            'pesanan_diproses' => $this->M_admin->pesanan_diproses(),
            'pesanan_dikirim' => $this->M_admin->pesanan_dikirim(),
            'pesanan_selesai' => $this->M_admin->pesanan_selesai(),
            'isi' => 'pesanan_masuk/index',
        );
		$this->load->view('templates/v_wrapper_backend', $data);
	}
    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1'
        );
        $this->M_admin->proses_pesanan($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil di Proses');

        redirect('pesanan_masuk');
    }
    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2'
        );
        $this->M_admin->proses_pesanan($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil di Kirim');

        redirect('pesanan_masuk');
    }

}

/* End of file Controllername.php */
