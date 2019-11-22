<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function index()
	{
		$init = "";
		$this->template->add_init($init);
		$data = array(
			'posts' => $this->db->query("SELECT b.categoryId, b.categoryName, b.categoryDesc, COUNT(a.postsId) AS total
										FROM sttdb_posts a
										LEFT JOIN sttdb_category b ON a.categoryId = b.categoryId WHERE a.postsType='Materi'
										GROUP BY a.categoryId")->result()
		);
		$this->template->load('backend/Mainlayout', 'backend/Dashboard', $data);
	}



}
