<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

    public function index(){
        $data = $this->get_data();

        $this->load->view('header',$data);
        $this->load->view('home');
        $this->load->view('footer');
    }

    /**
     * 获取渲染到页面的数据
     */
    private function get_data(){
        $data = array();
        $data['header_data'] = $this->render_header();
        $data['message'] = 'this is test';

        return $data;
    }

    private function render_header(){
        $this->load->helper('url');

        $data = array();
        $data['title'] = '首页';
        $data['site_host'] = base_url();

        return $data;
    }
}
