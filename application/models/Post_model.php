<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function read($table)
  {
    $query = $this->db->query("SELECT * FROM $table ORDER BY ID DESC");
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        $data[] = $row;
      }

      $query->free_result();
    } else {
      $data = NULL;
    }

    return $data;
  }

  public function edit($id, $table)
  {
    $this->db->where('ID', $id);
    $query = $this->db->get($table);
    if ($query->num_rows() > 0) {
      $data = $query->row();
      $query->free_result();
    } else {
      $data = NULL;
    }

    return $data;
  }

  public function update($id, $data, $table)
  {
    $this->db->where("ID", $id);
    $this->db->update($table, $data);
  }

  public function delete($id, $table)
  {
    $this->db->where("ID", $id);
    $this->db->delete($table);
  }
}
