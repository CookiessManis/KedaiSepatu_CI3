<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }
    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->pelanggan_login($email, $password);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            $gambar = $cek->gambar;


            //buat session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('gambar', $gambar);
            redirect('home');
        } else {
            //jika salah 
            $this->ci->session->set_flashdata('error', 'Email Atau Password Salah');
            redirect('pelanggan/login');
        }
    }
    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('gambar');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout');
        redirect('pelanggan/login');
    }
}
