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
		// get waktu hari ini
		$now = time();
		$startOfDay = strtotime('today', $now);
		$endOfDay = strtotime('tomorrow', $now) - 1;
		$mulai = $startOfDay * 1000;
		$sampai = $endOfDay * 1000 - 1;
		// end

		$total = $this->peserta->getCurrentPeserta($mulai, $sampai)->num_rows();

		$this->load->library('DeviceDetector');
		$detector = new DeviceDetector();

		$device_type = $detector->get_device_type();

		if ($detector->is_mobile()) {
			if ($total <= 2000) {
				$this->load->view('welcome');
			} else {
				$data['pesan'] = 'Mohon maaf, pendaftaran program Jalan Sehat BUMN telah ditutup. Kami akan membuka pendaftaran lagi besok. Terima kasih atas minat Anda untuk bergabung dengan program ini';
				$this->load->view('limit', $data);
			}
		} elseif ($detector->is_tablet()) {
			$this->load->view('dekstop');
		} else {
			$this->load->view('dekstop');
		}
	}

	public function cari_data()
	{
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');

		if ($this->form_validation->run() == false) {
			if ($detector->is_mobile()) {
				$this->load->view('cari_data');
			} elseif ($detector->is_tablet()) {
				$this->load->view('dekstop');
			} else {
				$this->load->view('dekstop');
			}
			$this->load->view('cari_data');
		} else {
			$no_hp = $this->input->post('no_hp', true);
			$valid_no_hp = $this->security->xss_clean($no_hp);

			$query = $this->db->get_where('peserta', ['nomor_hp' => $valid_no_hp])->row();

			if (empty($query)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">Nomor HP Belum Terdaftar</div>');
				redirect(base_url('cari'));
			}

			$unix = $query->unix_code;
			redirect(base_url('bukti-daftar/' . $unix));
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
		$this->form_validation->set_rules('ktp', 'KTP', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// Form validation failed, show error message
			$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">Data yang diinputkan tidak valid</div>');
			redirect(base_url(''));
		} else {

			$nama = $this->input->post('nama', true);
			$alamat = $this->input->post('alamat', true);
			$pilih = $this->input->post('pilih');
			$no_hp = $this->input->post('no_hp', true);
			$ktp = $this->input->post('ktp', true);

			$alamat_perusahaan = $this->input->post('alamat_perusahaan');
			$alamat_desa = $this->input->post('alamat_desa');
			$alamat = ($pilih == 1) ? $alamat_perusahaan : $alamat_desa;
			$time = time();
			$kode = $time . $no_hp;

			if ($pilih == 1) {
				if ($alamat_perusahaan == '') {
					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">Asal Instansi / Organisasi wajib diisi</div>');
					redirect(base_url(''));
				}
			} else {
				if ($alamat_desa == '') {
					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">Asal Desa / Kelurahan wajib diisi</div>');
					redirect(base_url(''));
				}
			}

			// Check if the data already exists in the database
			$query = $this->db->get_where('peserta', ['nomor_hp' => $no_hp])->row();
			$query2 = $this->db->get_where('peserta', ['ktp' => $ktp])->row();

			if ($query != null) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">Nomor HP Anda telah digunakan mendaftar sebelumnya</div>');
				redirect(base_url(''));
			} else if ($query2 != null) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger mx-2 mt-2" role="alert">KTP anda telah digunakan mendaftar sebelumnya</div>');
				redirect(base_url(''));
			} else {
				$unix =  md5('' . $kode);

				$get = ($pilih == 1) ? $this->peserta->getNomorInstansi() : $this->peserta->getNomorUmum();
				$last_id = $get->nomor_urut;

				if (!$last_id) {
					$nomor = ($pilih == 1) ? '00001' : '01501';
				} else {
					$next_id = $last_id + 1;
					if ($pilih == 1) {
						if ($next_id > 1500) {
							return "Nomor urut untuk instansi sudah mencapai batas maksimum";
						}
						$nomor = str_pad($next_id, 5, '0', STR_PAD_LEFT);
					} else {
						if ($next_id > 6500) {
							return "Nomor urut untuk umum sudah mencapai batas maksimum";
						}
						$nomor = str_pad($next_id + 1500, 5, '0', STR_PAD_LEFT);
						if ($next_id > 1501) {
							$nomor = str_pad($next_id + 0, 5, '0', STR_PAD_LEFT);
						}
					}
					$data = array(
						'nama_peserta' => $this->security->xss_clean($nama),
						'nomor_hp' => $this->security->xss_clean($no_hp),
						'ktp' => $this->security->xss_clean($ktp),
						'kategori' => $this->security->xss_clean($pilih),
						'alamat' => $this->security->xss_clean($alamat),
						'nomor_urut' => $this->security->xss_clean($nomor),
						'created' => time(),
						'unix_code' => $this->security->xss_clean($unix)
					);


					$this->db->set($data);
					$this->db->insert('peserta');
					redirect(base_url('generate-barcode/' . $unix));
				}
			}
		}
	}


	public function bukti_daftar($unix)
	{
		$this->load->library('DeviceDetector');
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
