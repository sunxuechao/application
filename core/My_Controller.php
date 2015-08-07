<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {
	
    protected function render_header($title){
        $this->load->helper('url');

        $data = array();
        $data['title'] = $title;
        $data['site_host'] = base_url();

        return $data;
    }
}
