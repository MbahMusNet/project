<?php
defined('BASEPATH') || exit('No direct script access allowed');


class Front extends CI_Controller
{
  public function index()
  {
    $data = array(
      'title' => 'Ini adalah Judul',
      'author' => 'Coderaulia',
      'date' => date("Y-m-d H:i:s"),
      'content' => 'Incididunt velit nostrud nulla ullamco cillum esse adipisicing quis irure elit. Anim veniam reprehenderit velit sit consectetur laborum amet laborum excepteur ipsum incididunt. Amet magna eu labore mollit sunt eu amet do consectetur aute cupidatat officia. Labore exercitation non minim adipisicing. Mollit irure quis laborum in irure sit Lorem deserunt voluptate minim deserunt anim. Ullamco dolore do cupidatat est adipisicing cillum enim occaecat consequat non ut.'

    );
    $this->load->view('front', $data);
  }

  public function category_page($category_name)
  {
    $this->load->view('category_page');
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
  public function image_lib_test()
  {
    $config['image_library'] = 'gd2';
    $config['source_image'] = 'C:/xampp/htdocs/cilabz/cilabz-bab2.7/assets/images/house-of-life.jpg';
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 75;
    $config['height']       = 50;

    $this->load->library('image_lib', $config);

    if (!$this->image_lib->resize()) {
      echo $this->image_lib->display_errors();
    } else {
      echo 'bekerja dengan baik!';
    }
  }

  public function pagination_lib_test()
  {
    $this->load->library('pagination');

    $config['base_url'] = base_url('front/pagination_lib_test/hal/');
    $config['total_rows'] = 10;
    $config['per_page'] = 5;

    $this->pagination->initialize($config);

    echo $this->pagination->create_links();
  }

  public function login()
  {
    $this->load->helper('url');
    echo '<a href="' . base_url('front/login_success') . '">Klik untuk login</a>';
  }

  public function login_success()
  {
    $array_login = array(
      'username' => 'admin',
      'password' => 'admin',
      'login_status' => TRUE
    );

    $this->session->set_userdata($array_login);
    echo '<h1>Anda telah login</h1>';
  }

  public function admin()
  {
    $this->load->library('mainlib');
    $this->mainlib->logged_in();
    echo '<h1>Selamat Datang Admin!</h1>';
  }

  public function logout()
  {
    $this->session->sess_destroy();
    echo '<h1>Anda telah logout!</h1>';
  }

  public function form_helper_test()
  {
    $this->load->helper('form');

    $jenis_kelamin = array(
      "laki-laki" => "Laki-Laki",
      "perempuan" => "Perempuan"
    );

    $data = array("array_jenis_kelamin" => $jenis_kelamin);
    $this->load->view('form', $data);
  }

  public function url_helper_test()
  {
    $this->load->helper('url');

    $str = 'Mouse dan Keyboard Rusak? Tenang, Gunakan Saja Aplikasi Android WIFI Mouse!';

    echo url_title($str, '_');
  }

  public function inflector_helper_test()
  {
    $this->load->helper('inflector');

    $str = 'daftar-shortcut-keyboard-ms-word-untuk-efisiensi-pekerjaan';
    echo humanize($str, '-');
  }

  public function text_helper_test()
  {
    $this->load->helper('text');
    $paragrap = 'Salam, semoga Anda senantiasa diberikan nikmat sehat selalu, Kali ini kita akan mempelajari lebih lanjut perihal efisiensi bekerja menggunakan Ms WORD!';

    echo character_limiter($paragrap, 50);
  }

  public function custom_helper()
  {
    $this->load->helper('main_helper');
    $jumlah_rupiah = 175000000;
    echo rupiahkan($jumlah_rupiah);
  }
}
