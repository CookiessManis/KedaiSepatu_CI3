<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_barang');
        $this->load->model('M_transaksi');
    }


    public function index()
    {
        $this->pelanggan_login->proteksi_halaman();
        if (empty($this->cart->contents())) {

            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang Belanja',
            'barang' => $this->M_barang->get_all_data(),
            'isi' => 'belanja/v_belanja',
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
    }

    public function add()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
        $this->cart->insert($data);

        redirect('home', 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty' => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('Pesan', 'Keranjang Berhasil Di Update');
        redirect('belanja');
    }
    public function cekout()
    {
        $this->pelanggan_login->proteksi_halaman();
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required',  array('required' =>
        '%s Harus Diisi'));
        $this->form_validation->set_rules('kota', 'Kota', 'required',  array('required' =>
        '%s Harus Diisi'));
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required',  array('required' =>
        '%s Harus Diisi'));
        $this->form_validation->set_rules('paket', 'Paket', 'required',  array('required' =>
        '%s Harus Diisi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Cekout Belanja',
                'isi' => 'belanja/v_cekout',
                'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array()
            );
            $this->load->view('templates_frontend/v_wrapper_frontend', $data, false);
        } else {
            //Data tersimpan ke tabel transaksi
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order'  => $this->input->post('no_order'),
                'tgl_order' => date('ymd'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'expedisi' => $this->input->post('expedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'grand_total' => $this->input->post('grand_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',
            );
            $this->M_transaksi->simpan_transaksi($data);
            //simpan ke tabel rincian transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order'  => $this->input->post('no_order'),
                    'id_barang' => $item['id'],
                    'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->M_transaksi->simpan_rinci_order($data_rinci);
            }

            $this->session->set_flashdata('Pesan', 'Pesanan Berhasil Di Proses');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
