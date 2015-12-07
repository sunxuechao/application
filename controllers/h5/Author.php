<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends My_Controller {

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
        $data['curr_author'] = $this->_current_author();
        $data['header_data'] = $this->render_header($this->_page_title);
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();
        $data['recommend'] = $this->_recommend();

        $this->load->view('h5/header', $data);
        $this->load->view('h5/author');
        $this->load->view('h5/footer');
    }

    /**
     * 获取当前页面展示的诗词
     */
    private function _current_author(){
        $authorId = intval($this->uri->segment(4));
        $sqlWhere = array('author_id = ' . $authorId);
        $authorList = $this->Author_Model->author_list($sqlWhere);

        if(empty($authorList)){
            show_404();
        }
        $this->_page_title = $authorList[0]['author_name'];
        $this->_author_id = $authorList[0]['author_id'];
        return $authorList[0];
    }

    /**
     * 获取【站点推荐】
     */
    private function _recommend(){
        $where = array();
        $where[] = 'author_id = ' . $this->_author_id;
        return $this->Poetry_Model->poetry_list($where);
    }
}
