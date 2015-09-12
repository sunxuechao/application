<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dynasty_Model');
        $this->load->model('Poetry_Model', '', true);
    }

    public function index() {
        $data = $this->get_data();

        $this->load->view('header', $data);
        $this->load->view('author');
        $this->load->view('footer');
    }
    /**
     * 获取渲染到页面的数据
     */
    private function get_data() {
        $data = array();
        //$data['data_list'] = $this->poem_list();
        $data['hot_poetry'] = $this->_hot_poetry();
        $data['famous_author'] = $this->_famous_author();
        $data['header_data'] = $this->render_header('测试地址');
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();

        return $data;
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
        $this->load->model('Author_Model', '', true);

        $rand = rand(1, 7);
        $field_val = array($rand);
        $where_val = array('author_id > ?');
        $order_by  = 'poetry_view DESC';
        return $this->Author_Model->author_list($where_val, $field_val, array(0, 10));
    }
}
