<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	
    protected function render_header($title){
        $this->load->helper('url');

        $data = array();
        $data['title'] = $title;
        $data['site_host'] = base_url();

        return $data;
    }
}
