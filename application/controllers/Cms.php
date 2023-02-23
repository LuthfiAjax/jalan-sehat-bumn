<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Cms extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model', 'peserta');
    if (!$this->session->userdata('username')) {
      redirect(base_url('portal/login'));
    }
  }

  public function dashboard()
  {
    // get waktu hari ini
    $now = time();
    $startOfDay = strtotime('today', $now);
    $endOfDay = strtotime('tomorrow', $now) - 1;
    $mulai = $startOfDay * 1000;
    $sampai = $endOfDay * 1000 - 1;
    // end

    $id  = $this->session->userdata('id_user');
    $data['undian'] = $this->db->get_where('undian', ['id_undian' => 1])->row();
    $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row();
    $data['current'] = $this->peserta->getCurrentPeserta($mulai, $sampai)->result_array();

    $this->load->view('cms/templates/header', $data);
    $this->load->view('cms/dashboard');
    $this->load->view('cms/templates/footer');
  }

  public function all_peserta()
  {
    $data['peserta'] = $this->db->get('peserta')->result_array();
    $id  = $this->session->userdata('id_user');
    $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row();

    $this->load->view('cms/templates/header', $data);
    $this->load->view('cms/all_peserta');
    $this->load->view('cms/templates/footer');
  }

  public function peserta_hadir()
  {
    $data['hadir'] = $this->db->get_where('peserta', ['hadir' => 1])->result_array();
    $id  = $this->session->userdata('id_user');
    $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row();

    $this->load->view('cms/templates/header', $data);
    $this->load->view('cms/peserta_hadir');
    $this->load->view('cms/templates/footer');
  }

  public function verifikasi_peserta($unix)
  {
    $query = $this->db->get_where('peserta', ['unix_code' => $unix])->row();
    $id = $query->id_peserta;

    $data = array(
      'hadir' => 1,
      'time_hadir' => time()
    );

    $this->db->set($data);
    $this->db->where('id_peserta', $id);
    $this->db->update('peserta');
    $this->session->set_flashdata('message', '<div class="alert alert-success text-center ms-2" role="alert">Verifikasi Kehadiran ' . $query->nama_peserta
      . ' Berhasil</div>');
    redirect(base_url('cms/dashboard'));
  }

  public function undian()
  {
    $start = $this->input->post('start');
    $finish = $this->input->post('finish');
    $time = $this->input->post('time');

    $data = array(
      'start' => $start,
      'finish' => $finish,
      'time' => $time
    );

    $this->db->set($data);
    $this->db->where('id_undian', 1);
    $this->db->update('undian');
    $this->session->set_flashdata('message', '<div class="alert alert-success text-center ms-2" role="alert">Setting Undian Success</div>');
    redirect(base_url('cms/dashboard'));
  }
}
