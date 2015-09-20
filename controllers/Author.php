<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dynasty_Model');
        $this->load->model('Poetry_Model', '', true);
        $this->load->model('Author_Model', '', true);
    }

    public function index() {
        $data = $this->get_data();

        $this->load->view('header', $data);
        $this->load->view('author');
        $this->load->view('footer');
    }
    /**
     * 渲染数据到页面
     */
    public function detail() {
        $data = array();
        $data['hot_poetry'] = $this->_hot_poetry();
        $data['curr_author'] = $this->_current_author();
        $data['famous_author'] = $this->_famous_author();
        $data['header_data'] = $this->render_header('测试地址');
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();

        $this->load->view('header', $data);
        $this->load->view('author');
        $this->load->view('footer');
    }

    private function _current_author(){
        $where_val = array('author_id = ?');
        $field_val = array(intval($this->uri->segment(3)));
        $author_list = $this->Author_Model->author_list($where_val, $field_val, array(0, 1));
        $curr_author = (array)($author_list[0]);
        $curr_author['author_brief'] = json_decode($curr_author['author_brief'], true);
        return $curr_author;
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
