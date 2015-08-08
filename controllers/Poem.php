<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poem extends My_Controller {

    public function index(){
        $data = $this->get_data();

        $this->load->view('header',$data);
        $this->load->view('home');
        $this->load->view('footer');
    }

    public function create(){
        $this->load->helper('url');

        $data = array();
        $data['header_data'] = $this->render_header('收集信息-');

        $this->load->view('header',$data);
        $this->load->view('poem_edit');
        $this->load->view('footer');
    }

    /**
     * 获取渲染到页面的数据
     */
    private function get_data(){
        $data = array();
        $data['header_data'] = $this->render_header('测试地址');
        $data['message'] = 'this is test';

        return $data;
    }
}
