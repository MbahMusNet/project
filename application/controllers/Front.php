<?php
defined('BASEPATH') || exit('No direct script access allowed');


class Front extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('menu_member');
  }



  public function tambah_artikel($param = NULL)
  {
    if ($param == "kirim") {
      $post = $this->input->post();

      if (!empty($post['title']) && !empty($post['author']) && !empty($post['content'])) {
        $this->load->model('Post_model');

        $data = array(
          'title' => $post['title'],
          'author' => $post['author'],
          'date' => date("Y-m-d H:i:s"),
          'content' => $post['content']
        );

        $this->Post_model->create('tbl_post', $data);
        $this->load->view('tambah_artikel_berhasil', $data);
      } else {
        $this->load->view('tambah_artikel_gagal');
      }
    } else {
      $this->load->view('tambah_artikel');
    }
  }

  public function daftar_artikel()
  {
    $this->load->model('Post_model');
    $data = array(
      "record" => $this->Post_model->read("tbl_post")
    );

    $this->load->view('daftar_artikel', $data);
  }

  public function edit_artikel($id = 0)
  {
    $this->load->model("Post_model");

    if ($id != 0 && !empty($id)) {
      $data = array(
        "record" => $this->Post_model->edit($id, 'tbl_post')
      );
      $this->load->view('edit_artikel', $data);
    } else {
      redirect(base_url('front/daftar_artikel'));
    }
  }

  public function update()
  {
    $post = $this->input->post();

    if (!empty($post['title']) && !empty($post['author']) && !empty($post['content'])) {
      $this->load->model("Post_model");
      $data = array(
        'title' => $post['title'],
        'author' => $post['author'],
        'date' => date("Y-m-d"),
        'content' => $post['content']
      );

      $this->Post_model->update($post['ID'], $data, 'tbl_post');
      redirect(base_url('front/daftar_artikel'));
    }
  }

  public function delete_artikel($id = 0)
  {
    $this->load->model("Post_model");
    $this->Post_model->delete($id, "tbl_post");
    redirect(base_url('front/daftar_artikel'));
  }
}
