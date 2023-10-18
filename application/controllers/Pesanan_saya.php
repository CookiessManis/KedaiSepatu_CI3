<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_barang');
        $this->load->model('M_kategori');
        $this->load->model('M_transaksi');
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'belum_bayar' => $this->M_transaksi->belum_bayar(),
            'proses' => $this->M_transaksi->proses(),
            'kirim' => $this->M_transaksi->kirim(),
            'selesai' => $this->M_transaksi->selesai(),
            'barang' => $this->M_barang->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array(),
            'isi' => 'belanja/v_pesanan_saya',
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
    }
    public function bayar($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required',  array('required' =>
        '%s Harus Diisi'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->M_transaksi->detail_pembayaran($id_transaksi),
                    'rekening' => $this->M_transaksi->rekening(),
                    'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'belanja/v_bukti_bayar',

                );
                $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'status_bayar' => '1',
                );
                $this->M_transaksi->upload_bukti_bayar($data);
                $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Diupload');
                redirect('pesanan_saya');
            }
        }
        $data = array(
            'title' => 'bukti Pembayaran',
            'pesanan' => $this->M_transaksi->detail_pembayaran($id_transaksi),
            'rekening' => $this->M_transaksi->rekening(),
            'isi' => 'belanja/v_bukti_bayar',
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
    }
    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '3'
        );
        $this->M_admin->proses_pesanan($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil di Terima');

        redirect('pesanan_saya');
    }
}
