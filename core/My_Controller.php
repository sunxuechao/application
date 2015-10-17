<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('user_agent');
    }
	
    protected function render_header($title){
        $this->load->helper('url');

        $data = array();
        $data['title'] = $title;
        $data['site_host'] = base_url();

        /* 判断是否是移动端在访问 */
        if($this->agent->is_mobile() && !strstr($_SERVER["REQUEST_URI"], 'h5')){
            $h5Uri = $data['site_host'] . 'h5'. $_SERVER["REQUEST_URI"];
            header('location: ' . $h5Uri);
        }

        return $data;
    }
}
