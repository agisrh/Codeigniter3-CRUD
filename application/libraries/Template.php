<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Library Template
|--------------------------------------------------------------------------
|
| Name    : Agis R Herdiana
| Email   : agis.rahma.herdiana@gmail.com
| Created : 2017
|
*/

class Template {

		public function __construct() {
			
			$this->ci = &get_instance();
			$this->includes = array();

		}

		var $template_data = array();

		// Set the value
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		// Load view
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{
			$this->CI =& get_instance();	
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			$this->set('includes_for_layout', $this->includes);
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
		// Function to include CSS & JS
		public function add_includes($type, $file, $options = NULL, $prepend_base_url = TRUE) {
			
			if($prepend_base_url) {
				
				$this->ci->load->helper('url');
				$file = base_url() . $file;
				
			}
			
			$this->includes[$type][] = array(
				
				'file' => $file,
				'options' => $options
				
				
			);
			
			// allows chaining
			return $this;
			
		}

		// Set the init
		function add_init($value)
		{
			$this->set('init',$value);
		}

		// Set the title
		function set_title($value)
		{
			$this->set('title','<h4 class="page-title">'.$value.'</h4>');
		}
		
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */