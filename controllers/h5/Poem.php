<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poem extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dynasty_Model');
        $this->load->model('Poetry_Model', '', true);
        $this->load->model('Author_Model', '', true);
    }

    public function index() {
        $this->detail();
    }

    /**
     * 渲染数据到页面
     */
    public function detail() {
        $data = array();
        $data['hot_poetry'] = $this->_hot_poetry();
        $data['curr_poetry'] = $this->_current_poetry();
        $data['famous_author'] = $this->_famous_author();
        $data['header_data'] = $this->render_header('测试地址');
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();

        $this->load->view('h5/header', $data);
        $this->load->view('h5/poem');
        $this->load->view('h5/footer');
    }

    /**
     * 获取当前页面展示的诗词
     */
    private function _current_poetry(){
        $where_val = array('poetry_id = ?');
        $field_val = array(intval($this->uri->segment(4)));
        $poem_list = $this->Poetry_Model->list_poetry($where_val, $field_val, array(0, 1));
        $curr_poem = (array)($poem_list[0]);
        $curr_poem['poetry_content'] = json_decode($curr_poem['poetry_content'], true);
        return $curr_poem;
    }

    /**
     * 获取热门诗词
     */
    private function _hot_poetry(){
        $field_val = array(1);
        $where_val = array('1 = ?');
        $order_by  = 'poetry_view DESC';
        return $this->Poetry_Model->list_poetry($where_val, $field_val, array(0, 10), $order_by);
    }

    /**
     * 获取著名作者
     */
    private function _famous_author(){
        $rand = rand(1, 7);
        $field_val = array($rand);
        $where_val = array('author_id > ?');
        $order_by  = 'poetry_view DESC';
        return $this->Author_Model->author_list($where_val, $field_val, array(0, 10));
    }
}
