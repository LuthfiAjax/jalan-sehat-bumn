<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Peserta_model', 'peserta');
	}

	public function index()
	{
		$this->load->view('welcome');
	}

	public function undian()
	{
		$data['undian'] =  $this->db->get_where('undian', ['id_undian' => 1])->row();
		$this->load->view('undian', $data);
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required|is_unique[peserta.nomor_hp]', [
			'is_unique' => 'Nomor HP ini telah Digunakan mendaftar sebelumnya'
		]);
		$this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');

		$nama = $this->input->post('nama', true);
		$no_hp = $this->input->post('no_hp', true);
		$instansi = $this->input->post('instansi', true);

		$unix =  md5('' . $no_hp);

		// Mendapatkan nomor urut terakhir dari database
		$get = $this->peserta->getNomor();
		$last_id = $get->nomor_urut;

		if (!$last_id) {
			$nomor_urut = '00001';
		} else {
			$next_id = $last_id + 1;
			$nomor_urut = str_pad($next_id, 5, '0', STR_PAD_LEFT);
		}

		$data = [
			'nama_peserta' => htmlspecialchars($nama),
			'nomor_hp' => htmlspecialchars($no_hp),
			'instansi' => htmlspecialchars($instansi),
			'barcode' => null,
			'nomor_urut' => $nomor_urut,
			'created' => time(),
			'unix_code' => $unix
		];

		$this->db->insert('peserta', $data);
		redirect(base_url('generate-barcode/' . $unix));
	}

	public function bukti_daftar($unix)
	{
		$data['personal'] =  $this->db->get_where('peserta', ['unix_code' => $unix])->row();

		$this->load->view('bukti_daftar', $data);
	}
}
