<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poem extends My_Controller {

    public function index() {
        $data = $this->get_data();

        $this->load->view('header', $data);
        $this->load->view('poem/list');
        $this->load->view('footer');
    }

    public function create() {
        $data = array();
        $data['header_data'] = $this->render_header('收集信息-');

        $this->load->view('header', $data);
        $this->load->view('poem/create');
        $this->load->view('footer');
    }

    /**
     * 获取渲染到页面的数据
     */
    private function get_data() {
        $data = array();
        $data['data_list'] = $this->poem_list();
        $data['header_data'] = $this->render_header('测试地址');

        return $data;
    }

    private function poem_list() {
        $field_val = array(1);
        $where_val = array('1 = ?');
        $this->load->model('Poetry_Model', '', true);
        return $this->Poetry_Model->list_poem_tmp($where_val, $field_val, array(0, 100));
    }
}
