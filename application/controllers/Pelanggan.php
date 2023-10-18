<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_barang');
    }
    public function index()
    {
        $data = array(
            'title' => 'Daftar Pelanggan',
            'isi' => 'admin/pelanggan',
            'pelanggan' => $this->M_admin->get_all_pelanggan()
        );
        $this->load->view('templates/v_wrapper_backend', $data);
    }
    public function register()
    {
        $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[tbl_pelanggan.email]|valid_email', array(
            'required' => '%s Harus Diisi',
            'is_unique' => '%s Email Pelanggan ini sudah terdaftar'
        ));
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|trim', array(
            'required' => '%s Harus Diisi'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]',  array(
            'required' =>
            '%s Harus Diisi',
            'min_length' => 'Password too short'
        ));

        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
            'required' => '%s Haris Diisi!!!',
            'matches' => '%s Password Tidak sama'
        ));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/foto/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'error_upload' => $this->upload->display_errors(),
                    'title' => 'Halaman Registrasi',
                );
                $this->load->view('pelanggan/registrasi', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'email' => $this->input->post('email'),
                    'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                    'password' => md5($this->input->post('password')),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->db->insert('tbl_pelanggan', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation your account has been created. please login
          </div>');

                redirect('pelanggan/login');
            }
        }


        $data = array(
            'title' => 'Halaman Registrasi',
        );
        $this->load->view('pelanggan/registrasi', $data, false);
    }


    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() ==  TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
        );
        $this->load->view('pelanggan/login', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        $data = array(
            'isi' => 'pelanggan/profile',
            'barang' => $this->M_barang->get_all_data_kategori(),
            'pelanggan' => $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Halaman Profile'
        );
        $this->load->view('templates_frontend/v_wrapper_frontend', $data);
    }



    public function changepassword()
    {
        $data['title'] = 'Ubah Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'New Password', 'required');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['isi'] = 'pelanggan/changepassword';
            $data['pelanggan'] = $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates_frontend/v_wrapper_frontend', $data);
        } else {
            $id_pelanggan = $this->session->userdata('id_pelanggan');

            $newpass = $this->input->post('newpass');
            $this->M_admin->update_user($id_pelanggan, array('password' => md5($newpass)));
            $this->session->set_flashdata('pesan', 'Password anda berhasil diubah!');
            redirect('pelanggan/changepassword');
        }
    }

    public function password_check($current_password)
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->M_admin->get_user($id_pelanggan);

        if ($pelanggan->password !== md5($current_password)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }
        return true;
    }

    public function edit()
    {

        $data['title'] = 'Edit Profile';
        $data['pelanggan'] = $this->db->get_where('tbl_pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_pelanggan', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['isi'] = 'pelanggan/edit';
            $this->load->view('templates_frontend/v_wrapper_frontend', $data);
        } else {
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $email = $this->input->post('email');

            $this->db->set('nama_pelanggan', $nama_pelanggan);
            $this->db->where('email', $email);
            $this->db->update('tbl_pelanggan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your Profile has been updated
          </div>');

            redirect('pelanggan/edit');
        }
    }
}
