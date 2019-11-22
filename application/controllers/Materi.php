<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

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
			'posts' => $this->db->query("SELECT a.*, b.categoryName, CONCAT(c.first_name,' ',c.last_name) as fullname FROM sttdb_posts a LEFT JOIN sttdb_category b ON b.categoryId=a.categoryId LEFT JOIN sttdb_users c ON c.id=a.author WHERE a.postsType='Materi' AND a.postsStatus='Published'")->result()
		);
		$this->template->load('backend/Mainlayout', 'backend/Materi', $data);
	}

	public function materi_dosen($user){
		$init = "";
		$this->template->add_init($init);
		$data = array(
			'posts' => $this->db->query("SELECT a.*, b.categoryName, CONCAT(c.first_name,' ',c.last_name) as fullname FROM sttdb_posts a LEFT JOIN sttdb_category b ON b.categoryId=a.categoryId LEFT JOIN sttdb_users c ON c.id=a.author WHERE a.author='$user' AND a.postsType='Materi'")->result()
		);
		$this->template->load('backend/Mainlayout', 'backend/Materi', $data);
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
		$this->template->load('backend/Mainlayout', 'backend/Detail', $data);
	}

	public function create()
	{
		$init = "";
		$this->template->add_init($init);
		 // Include CSS & JS
		$this->template->add_includes('css', 'assets/modules/summernote/summernote-bs4.css');
		$this->template->add_includes('css', 'assets/modules/jquery-selectric/selectric.css');
		$this->template->add_includes('css', 'assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css');
		$this->template->add_includes('js', 'assets/modules/jquery-selectric/jquery.selectric.min.js');
		$this->template->add_includes('js', 'assets/modules/summernote/summernote-bs4.js');
		$this->template->add_includes('js', 'assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js');
		$this->template->add_includes('js', 'assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');
		$this->template->add_includes('js', 'assets/js/page/features-post-create.js');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		// serial number untuk product
		$serial = $this->MY_Model->auto_id('sttdb_posts','postsId','PST','5');
		$this->data['category'] = $this->MY_Model->getAll('sttdb_category')->result();
		// validasi form input
		$this->form_validation->set_rules('postTitle','Judul', 'required');
		$this->form_validation->set_rules('categoryId', 'Kategory', 'required');
		$this->form_validation->set_rules('postsStatus','Status', 'required');

		$group_id = $this->ion_auth->get_user_group();
		if($group_id=='1'){
			$path = "./uploads/dosen/";
			$type = "Materi";
		}else{
			$path = "./uploads/mahasiswa/";
			$type = "Tugas";
		}
		

		$config['upload_path']          = $path;
		$config['allowed_types']        = 'gif|jpg|png|pdf|xls|ppt|pptx|zip|doc|docx|word';
		$config['file_name']            = $serial;
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$this->load->library('upload', $config);

		if ($_POST)
		{
			$data   =   array(
				'postsId'	 	 =>$serial,
				'author'  		 =>$this->session->userdata('user_id'),
				'postsTitle'	 =>$this->input->post('postsTitle'), 
				'categoryId'	 =>$this->input->post('categoryId'), 
				'postsDesc'		 =>$this->input->post('postsDesc'), 
				'postsStatus' 	 =>$this->input->post('postsStatus'),
				'postsType' 	 =>$type,
				'createdAt'      =>date('Y-m-d H:i:s')
			);
		        // upload file
			if(!empty($_FILES['postsFile']['name']))
			{
				$directory = $path;
				$files     = 'postsFile';
				$upload = $this->MY_Model->_do_upload($directory,$files);
				$data['postsFile'] = $upload;
			}

		        $new_product = $this->MY_Model->insert('sttdb_posts',$data);
		        redirect("dashboard", 'refresh');
		        
		    }
		    else
		    {
		    	$this->data['postsTitle'] = array(
		    		'name'  		  => 'postsTitle',
		    		'id'    		  => 'postsTitle',
		    		'type'  		  => 'text',
		    		'class'			  => 'form-control',
		    		'value' 		  => $this->form_validation->set_value('postsTitle'),
		    	);
		    	$this->data['postsDesc'] = array(
		    		'name'  		  => 'postsDesc',
		    		'id'    		  => 'postsDesc',
		    		'type'  		  => 'text',
		    		'data-error'      => 'Please enter description.',
		    		'class'			  => 'summernote',
		    		'required'	      => 'required',
		    		'value' 		  => $this->form_validation->set_value('postsDesc'),
		    	);
		    	

		$this->template->load('backend/Mainlayout', 'backend/Create', $this->data);
	}
}

}
