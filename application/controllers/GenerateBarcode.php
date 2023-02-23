<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GenerateBarcode extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('Ciqrcode');
  }

  public function generateBarcode($unix)
  {
    $query = $this->db->get_where('peserta', ['unix_code' => $unix])->row();
    $id = $query->id_peserta;

    $kode = base_url('verifikasi-peserta/' . $unix);
    $filename = $unix;
    $ukuran = 10;
    $level = 'H';
    $path = FCPATH . 'assets/images/barcode/'; // ubah sesuai dengan path folder tujuan

    // Generate barcode
    $params['data'] = $kode;
    $params['level'] = $level;
    $params['size'] = $ukuran;
    $params['savename'] = $path . $filename . '.png';

    $this->ciqrcode->generate($params);

    $data = array(
      'barcode' => $filename . '.png'
    );

    $this->db->set($data);
    $this->db->where('id_peserta', $id);
    $this->db->update('peserta');

    redirect(base_url('bukti-daftar/' . $unix));
  }
}
