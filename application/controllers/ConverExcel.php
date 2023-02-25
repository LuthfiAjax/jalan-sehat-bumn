<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ConverExcel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model', 'peserta');
  }

  public function all_data()
  {
    $data = $this->peserta->getAll()->result_array();

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_seluruh_peserta.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Buat baris header di file Excel
    $header_row = "Nomor peserta\tNama Peserta\tKategori\tAsal\tWaktu mendaftar\n";
    echo $header_row;

    foreach ($data as $row) {
      $time = date('d-m-Y H:i', $row['created']);
      $nomor = 'Nomor - ' . $row['nomor_urut'];
      $kategori = ($row['kategori'] == 1) ? 'Instansi' : 'Umum';
      echo $nomor . "\t" . $row['nama_peserta'] . "\t" . $kategori . "\t" . $row['alamat'] . "\t" . $time . "\n";
    }

    // Buat baris author
    echo "\n";
    echo "Author : JaxID\n";
    echo "Data : Seluruh Peserta Jalan Sehat yang terdaftar\n";

    exit;
  }

  public function hadir_data()
  {
    $data = $this->peserta->getHadir()->result_array();

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_peserta_hadir.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Buat baris header di file Excel
    $header_row = "Nomor peserta\tNama Peserta\tKategori\tAsal\tWaktu kehadiran\n";
    echo $header_row;

    foreach ($data as $row) {
      $time = date('d-m-Y H:i', $row['time_hadir']);
      $nomor = 'Nomor - ' . $row['nomor_urut'];
      $kategori = ($row['kategori'] == 1) ? 'Instansi' : 'Umum';
      echo $nomor . "\t" . $row['nama_peserta'] . "\t" . $kategori . "\t" . $row['alamat'] . "\t" . $time . "\n";
    }

    // Buat baris author
    echo "\n";
    echo "Author: JaxID\n";
    echo "Data : Seluruh Peserta Jalan Sehat yang Hadir\n";

    exit;
  }

  public function instansi_data()
  {
    $data = $this->peserta->getInstansi()->result_array();

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_peserta_instansi.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Buat baris header di file Excel
    $header_row = "Nomor peserta\tNama Peserta\tKategori\tAsal\tWaktu Mendaftar\n";
    echo $header_row;

    foreach ($data as $row) {
      $time = date('d-m-Y H:i', $row['created']);
      $nomor = 'Nomor - ' . $row['nomor_urut'];
      $kategori = ($row['kategori'] == 1) ? 'Instansi' : 'Umum';
      echo $nomor . "\t" . $row['nama_peserta'] . "\t" . $kategori . "\t" . $row['alamat'] . "\t" . $time . "\n";
    }

    // Buat baris author
    echo "\n";
    echo "Author: JaxID\n";
    echo "Data : Seluruh Peserta Jalan Sehat Dari Kategori Instansi\n";

    exit;
  }

  public function umum_data()
  {
    $data = $this->peserta->getUmum()->result_array();

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_peserta_umum.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Buat baris header di file Excel
    $header_row = "Nomor peserta\tNama Peserta\tKategori\tAsal\tWaktu Mendaftar\n";
    echo $header_row;

    foreach ($data as $row) {
      $time = date('d-m-Y H:i', $row['created']);
      $nomor = 'Nomor - ' . $row['nomor_urut'];
      $kategori = ($row['kategori'] == 1) ? 'Instansi' : 'Umum';
      echo $nomor . "\t" . $row['nama_peserta'] . "\t" . $kategori . "\t" . $row['alamat'] . "\t" . $time . "\n";
    }

    // Buat baris author
    echo "\n";
    echo "Author: JaxID\n";
    echo "Data : Seluruh Peserta Jalan Sehat Dari Kategori Umum\n";

    exit;
  }
}
