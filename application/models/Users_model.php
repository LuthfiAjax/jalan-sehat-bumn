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
}
