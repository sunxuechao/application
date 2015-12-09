<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

    const PAGE_SIZE = 10;
    private $_search_word = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('Dynasty_Model');
        $this->load->model('Poetry_Model', '', true);
    }

    public function index(){
        $this->page();
    }

    public function page(){
        $data = array();
        $data['s_word'] = $this->_getSWord();
        $data['recommend'] = $this->_recommend();
        $data['content_list'] = $this->_content_list();
        $data['curr_page'] = intval($this->uri->segment(3));
        $data['header_data'] = $this->render_header('古言语 - 诸子百家论道');        

        $this->load->view('header', $data);
        $this->load->view('home');
        $this->load->view('footer');
    }

    private function _recommend(){
        $where = array();
        $where[] = 'poetry_id < 56536';
        return $this->Poetry_Model->poetry_list($where);
    }

    private function _content_list(){
        $currPage = intval($this->uri->segment(3));
        $sqlLimit = array(($currPage * self::PAGE_SIZE), self::PAGE_SIZE);
        $sqlWhere = array("poetry_title LIKE '%{$this->_search_word}%' OR poetry_content LIKE '%{$this->_search_word}%'");
        return $this->Poetry_Model->poetry_list($sqlWhere, $sqlLimit);
    }

    private function _getSWord(){
        if(empty($this->_search_word)){
            $this->_search_word = $this->input->get('s');
            $this->_search_word = preg_replace("/\s/", "", $this->_search_word);
        }

        return $this->_search_word;
    }
}
