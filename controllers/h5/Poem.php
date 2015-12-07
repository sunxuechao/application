<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poem extends My_Controller {

    private $_author_id = 0;
    private $_page_title = '';

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
        $data['curr_poetry'] = $this->_current_poetry();
        $data['header_data'] = $this->render_header($this->_page_title);
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();
        $data['recommend'] = $this->_recommend();

        $this->load->view('h5/header', $data);
        $this->load->view('h5/poem');
        $this->load->view('h5/footer');
    }

    /**
     * 获取当前页面展示的诗词
     */
    private function _current_poetry(){
        $poetryId = intval($this->uri->segment(4));
        $sqlWhere = array('poetry_id = ' . $poetryId);
        $poemList = $this->Poetry_Model->poetry_list($sqlWhere);

        if(empty($poemList)){
            show_404();
        }

        $this->_page_title = $poemList[0]['poetry_title'] . '_' . $poemList[0]['author_name'];
        $this->_author_id = $poemList[0]['author_id'];
        return $poemList[0];
    }

    /**
     * 推荐的内容
     */
    private function _recommend(){
        $where = array();
        $where[] = 'author_id = ' . $this->_author_id;
        return $this->Poetry_Model->poetry_list($where, array(0, 5));
    }
}
