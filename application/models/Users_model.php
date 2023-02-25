<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Users_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
  }

  public function getCurrentPeserta($mulai, $sampai)
  {
    $query = "SELECT * FROM peserta WHERE created >= '$mulai' AND created <= '$sampai'";
    return $this->db->query($query);
  }

  public function getAll()
  {
    $query = "SELECT * FROM peserta";
    return $this->db->query($query);
  }

  public function getHadir()
  {
    $query = "SELECT * FROM peserta WHERE hadir = 1";
    return $this->db->query($query);
  }

  public function getInstansi()
  {
    $query = "SELECT * FROM peserta WHERE kategori = 1";
    return $this->db->query($query);
  }

  public function getUmum()
  {
    $query = "SELECT * FROM peserta WHERE kategori = 2";
    return $this->db->query($query);
  }
}
