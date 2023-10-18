<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('M_barang');
		$this->load->model('M_kategori');
	}
	// CRUD BARANG
	public function index()
	{
		$data = array(
			'title' => 'Kelola Barang',
			'barang' => $this->M_barang->get_all_data(),
			'error_upload' => $this->upload->display_errors(),
			'isi' => 'barang/index',
		);
		$this->load->view('templates/v_wrapper_backend', $data, false);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('harga', 'harga', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('stok', 'Stok', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('berat', 'berat', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required',  array('required' =>
		'%s Harus Diisi'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Add Barang',
					'Kategori' => $this->M_kategori->get_all_data(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/add',
				);
				$this->load->view('templates/v_wrapper_backend', $data, false);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'berat' => $this->input->post('berat'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name']
				);
				$this->M_barang->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
				redirect('barang');
			}
		}


		$data = array(
			'title' => 'Add Barang',
			'Kategori' => $this->M_kategori->get_all_data(),
			'isi' => 'barang/add',
		);
		$this->load->view('templates/v_wrapper_backend', $data, false);
	}

	//Update one item
	public function edit($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('harga', 'harga', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('stok', 'Stok', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('berat', 'berat', 'required',  array('required' =>
		'%s Harus Diisi'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required',  array('required' =>
		'%s Harus Diisi'));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Add Barang',
					'Kategori' => $this->M_kategori->get_all_data(),
					'barang' => $this->M_barang->get_data($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/edit',
				);
				$this->load->view('templates/v_wrapper_backend', $data, false);
			} else {
				//menghapus gambar pada bagian file manager 
				$barang = $this->M_barang->get_data($id_barang);
				if ($barang->gambar != "") {
					unlink('./assets/gambar/' . $barang->gambar);
				}
				//end hapus gambar 

				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'berat' => $this->input->post('berat'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name']
				);
				$this->M_barang->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil DiUbah');
				redirect('barang');
			}
			//jika tanpa ganti gambar 
			$data = array(
				'id_barang' => $id_barang,
				'nama_barang' => $this->input->post('nama_barang'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'berat' => $this->input->post('berat'),
				'deskripsi' => $this->input->post('deskripsi'),

			);
			$this->M_barang->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil DiUbah');
			redirect('barang');
		}


		$data = array(
			'title' => 'Edit Barang',
			'Kategori' => $this->M_kategori->get_all_data(),
			'barang' => $this->M_barang->get_data($id_barang),
			'isi' => 'barang/edit',
		);
		$this->load->view('templates/v_wrapper_backend', $data, false);
	}

	public function delete($id_barang = NULL)
	{
		//menghapus gambar pada bagian file manager 
		$barang = $this->M_barang->get_data($id_barang);
		if ($barang->gambar != "") {
			unlink('./assets/gambar/' . $barang->gambar);
		}
		//end hapus gambar 

		$data = array('id_barang' => $id_barang);
		$this->M_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil DiHapus');
		redirect('barang');
	}
	

}
