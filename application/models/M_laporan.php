<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{


    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_order');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_rincian_order.id_pelanggan', 'left');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order = tbl_rincian_order.no_order', 'left');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_rincian_order.id_barang', 'left');
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }



    public function get_search($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_order');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_rincian_order.id_pelanggan', 'left');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_order = tbl_rincian_order.no_order', 'left');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_rincian_order.id_barang', 'left');
        $this->db->like('tgl_order', $search);
        $this->db->where('status_bayar=1');

        return $this->db->get()->result();
    }

    public function laporan_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_transaksi.id_pelanggan', 'left');
        $this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $this->db->where('status_bayar=1');

        return $this->db->get()->result();
    }
    public function laporan_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_transaksi.id_pelanggan', 'left');
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $this->db->where('status_bayar=1');

        return $this->db->get()->result();
    }
}

/* End of file M_laporan.php */
