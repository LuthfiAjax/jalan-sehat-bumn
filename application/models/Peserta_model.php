<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Peserta_model extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }


  public function getNomor()
  {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->order_by('id_peserta', 'DESC');
    $this->db->limit(1);

    $query = $this->db->get();
    return $query->row();
  }
}
