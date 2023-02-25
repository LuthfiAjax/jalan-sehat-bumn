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
		$this->load->library('devicedetector');
		$detector = new DeviceDetector();

		$device_type = $detector->get_device_type();

		if ($detector->is_mobile()) {
			$this->load->view('welcome');
		} elseif ($detector->is_tablet()) {
			$this->load->view('dekstop');
		} else {
			$this->load->view('dekstop');
		}
	}

	public function undian()
	{
		$data['undian'] =  $this->db->get_where('undian', ['id_undian' => 1])->row();
		$this->load->view('undian', $data);
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');
		$this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
		$this->form_validation->set_rules('ktp', 'KTP', 'trim|required');

		// cek no HP
		$no_hp = $this->input->post('no_hp', true);
		$ktp = $this->input->post('ktp', true);

		$query = $this->db->get_where('peserta', ['nomor_hp' => $no_hp])->row();
		$query2 = $this->db->get_where('peserta', ['ktp' => $ktp])->row();

		if ($query != null) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">Nomor HP Anda telah digunakan mendaftar sebelumnya</div>');
			redirect(base_url(''));
		}
		if ($query2 != null) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">KTP anda telah digunakan mendaftar sebelumnya</div>');
			redirect(base_url(''));
		}

		// get data input
		$nama = $this->input->post('nama', true);
		$alamat = $this->input->post('alamat', true);
		$pilih = $this->input->post('pilih');

		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$alamat_desa = $this->input->post('alamat_desa');
		$alamat = ($pilih == 1) ? $alamat_perusahaan : $alamat_desa;

		$unix =  md5('' . $no_hp);

		// generate nomor
		$get = ($pilih == 1) ? $this->peserta->getNomorInstansi() : $this->peserta->getNomorUmum();
		$last_id = $get->nomor_urut;

		if (!$last_id) {
			$nomor = ($pilih == 1) ? '00001' : '01501';
		} else {
			$next_id = $last_id + 1;
			if ($pilih == 1) {
				if ($next_id > 1500) {
					redirect(base_url('kouta-daftar-terpenuhi'));
				}
				$nomor = str_pad($next_id, 5, '0', STR_PAD_LEFT);
			} else {
				if ($next_id > 3500) {
					redirect(base_url('kouta-daftar-terpenuhi'));
				}
				$nomor = str_pad($next_id + 1500, 5, '0', STR_PAD_LEFT);
				// Jika nomor_urut lebih besar dari 1501, kurangi dengan 1500
				if ($next_id > 1501) {
					$nomor = str_pad($next_id + 0, 5, '0', STR_PAD_LEFT);
				}
			}
		}

		$data = [
			'nama_peserta' => htmlspecialchars($nama),
			'nomor_hp' => htmlspecialchars($no_hp),
			'ktp' => htmlspecialchars($ktp),
			'kategori' => htmlspecialchars($pilih),
			'alamat' => htmlspecialchars($alamat),
			'barcode' => null,
			'nomor_urut' => $nomor,
			'created' => time(),
			'unix_code' => $unix
		];

		$this->db->insert('peserta', $data);
		redirect(base_url('generate-barcode/' . $unix));
	}

	public function bukti_daftar($unix)
	{
		$this->load->library('devicedetector');
		$detector = new DeviceDetector();

		$device_type = $detector->get_device_type();
		$data['personal'] =  $this->db->get_where('peserta', ['unix_code' => $unix])->row();

		if ($detector->is_mobile()) {
			$this->load->view('bukti_daftar', $data);
		} elseif ($detector->is_tablet()) {
			$this->load->view('bukti_daftar', $data);
		} else {
			$this->load->view('dekstop');
		}
	}

	public function limit()
	{
		$this->load->view('limit');
	}
}
