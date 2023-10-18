<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_barang()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
    public function total_kategori()
    {
        return $this->db->get('tbl_kategori')->num_rows();
    }
    public function total_laporan()
    {
        return $this->db->get('tbl_rincian_order')->num_rows();
    }
    public function total_pesanan()
    {
        $this->db->where('status_order=0');
        return $this->db->get('tbl_transaksi')->num_rows();
    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_setting', $data);
    }
    public function pesanan_masuk()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function pesanan_diproses()
    {

        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function pesanan_dikirim()
    {

        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function proses_pesanan($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }
    public function pesanan_selesai()
    {

        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function get_all_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        return $this->db->get()->result();
    }

    public function edit_data($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->update('tbl_pelanggan');
    }
    public function update_user($id_pelanggan, $userdata)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('tbl_pelanggan', $userdata);
    }
    public function get_user($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get('tbl_pelanggan');
        return $query->row();
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_all_laporan()
    {

        $this->db->select('*');
        $this->db->from('tbl_rincian_order');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_rincian_order.id_pelanggan', 'left');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order = tbl_rincian_order.no_order', 'left');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_rincian_order.id_barang', 'left');
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }
}
