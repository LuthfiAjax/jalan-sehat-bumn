<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Peserta_model extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }


  public function getNomorInstansi()
  {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->where('kategori', 1);
    $this->db->order_by('id_peserta', 'DESC');
    $this->db->limit(1);

    $query = $this->db->get();
    return $query->row();
  }

  public function getNomorUmum()
  {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->where('kategori', 2);
    $this->db->order_by('id_peserta', 'DESC');
    $this->db->limit(1);

    $query = $this->db->get();
    return $query->row();
  }

  public function getCurrentPeserta($mulai, $sampai)
  {
    $query = "SELECT * FROM peserta WHERE created >= '$mulai' AND created <= '$sampai'";
    return $this->db->query($query);
  }
}
