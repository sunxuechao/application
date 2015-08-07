<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function index()	{
		$this->load->view('welcome_message');
	}

	public function render_header()	{
		$author_model = $this->load->model('Author_Model', '', true);
		$author_infos = $this->Author_Model->get_authors();
		print_r($author_infos);
		echo Author_Model::DB_TABLE_AUTHOR;
		echo urldecode($this->uri->segment(3));
		echo '你好';
	}
}
