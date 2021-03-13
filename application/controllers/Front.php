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



  public function tambah_artikel(){

    //get the "kirim" method using URI Library
		$action = $this->uri->segment(3);
		$this->load->helper('form');

    //form validation load
		$this->load->library('form_validation');
		if($action=='kirim'){
			$post = $this->input->post();			

			/*if(!empty($post['title']) && !empty($post['author']) && !empty($post['content'])){
				$this->load->model('Post_model');

				$data = array(
						'title' => $post['title'],
						'author' => $post['author'],
						'date' => date('Y-m-d'),
						'content' => $post['content']
					);

				$this->Post_model->create('tbl_post',$data);
				$this->load->view('tambah_artikel_berhasil',$data);
			}
			else{
				$this->load->view('tambah_artikel_gagal',$data);
			}*/
      
      //setting up form validation
			$this->form_validation->set_rules('title', 'Judul Artikel', 'required');
			$this->form_validation->set_rules('author', 'Penulis', 'required');
			$this->form_validation->set_rules('content', 'Isi artikel', 'required');

      //create a custom message to each error
			$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
			$this->form_validation->set_error_delimiters('<p class="alert">', '</p>');

			if($this->form_validation->run() == FALSE){
				$this->load->view('tambah_artikel');
			}
			else{
				$this->load->model('Post_model');

				$data = array(
						'title' => $post['title'],
						'author' => $post['author'],
						'date' => date('Y-m-d'),
						'content' => $post['content']
					);

				$this->Post_model->create('tbl_post',$data);
				$this->load->view('tambah_artikel_berhasil',$data);		
			}			

		}
		else{
			$this->load->view('tambah_artikel');
		}		
	}

  public function daftar_artikel()
  {
    $this->load->model('Post_model');
		$this->load->library('pagination');

    /* pagination configuration */
		$config['base_url'] = base_url('front/daftar_artikel/hal/');
		$config['total_rows'] = $this->Post_model->total_rows('tbl_post');
		$config['per_page'] = 5;		
		$config['full_tag_open'] = '<div class="paging">';
		$config['full_tag_close'] = '</div>';
		$config['first_url'] = '';
    
    // initialize pagination lib
		$this->pagination->initialize($config);		

		$limit = $config['per_page'];
		$offset = (int) $this->uri->segment(4);

		$data = array(
				'record' => $this->Post_model->read('tbl_post', $limit, $offset),
				'pagination' => $this->pagination->create_links()
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

  public function register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi');
		$this->form_validation->set_message('valid_email', 'silahkan ketikkan format email yang benar');
		$this->form_validation->set_message('min_length', 'password kurang dari 5 digit');
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');

		if($this->form_validation->run() == FALSE){
			$this->load->view('form_register');
		}
		else{
			$this->load->view('register_sukses');
		}
	}

	public function email_check($str){
		if($str == 'admin@gmail.com'){
			$this->form_validation->set_message('email_check', 'Email sudah digunakan, mohon diganti yang lain');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}
