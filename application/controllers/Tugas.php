<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','language','parse'));
		$this->load->library(['form_validation', 'session']);

		// Jika belum login maka alihkan ke halaman login
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
	}

	public function index(){
		$init = "";
		$this->template->add_init($init);
		$data = array(
			'posts' => $this->db->query("SELECT a.*, b.categoryName, CONCAT(c.first_name,' ',c.last_name) as fullname FROM sttdb_posts a LEFT JOIN sttdb_category b ON b.categoryId=a.categoryId LEFT JOIN sttdb_users c ON c.id=a.author WHERE a.postsType='Tugas' AND a.postsStatus='Published'")->result()
		);
		$this->template->load('backend/Mainlayout', 'backend/Tugas', $data);
	}

	public function tugas_mahasiswa($user){
		$init = "";
		$this->template->add_init($init);
		$data = array(
			'posts' => $this->db->query("SELECT a.*, b.categoryName, CONCAT(c.first_name,' ',c.last_name) as fullname FROM sttdb_posts a LEFT JOIN sttdb_category b ON b.categoryId=a.categoryId LEFT JOIN sttdb_users c ON c.id=a.author WHERE a.author='$user' AND a.postsType='Tugas'")->result()
		);
		$this->template->load('backend/Mainlayout', 'backend/Tugas', $data);
	}

	public function category($category)
	{
		$init = "";
		$this->template->add_init($init);
		$data = array(
			'posts' => $this->db->query("SELECT a.*, b.categoryName, CONCAT(c.first_name,' ',c.last_name) as fullname FROM sttdb_posts a LEFT JOIN sttdb_category b ON b.categoryId=a.categoryId LEFT JOIN sttdb_users c ON c.id=a.author WHERE a.categoryId='$category' AND a.postsType='Materi' AND a.postsStatus='Published'")->result()
		);
		$this->template->load('backend/Mainlayout', 'backend/Materi', $data);
	}

	public function detail($id)
	{
		$init = "";
		$this->template->add_init($init);
		
		$data = array(
			'posts' => $this->db->query("SELECT a.*, b.categoryName, b.categoryDesc, CONCAT(c.first_name,' ',c.last_name) as fullname FROM sttdb_posts a LEFT JOIN sttdb_category b ON b.categoryId=a.categoryId LEFT JOIN sttdb_users c ON c.id=a.author WHERE a.postsId='$id'")->row()
		);
		$this->template->load('backend/Mainlayout', 'backend/Detail_Tugas', $data);
	}



}
