<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('Dynasty_Model');
        $this->load->model('Poetry_Model', '', true);
    }

    public function index(){
        $data = array();
        $data['new_pick'] = $this->_new_pick();
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();
        $data['header_data'] = $this->render_header('古言语|百家论道');

        $this->load->view('h5/header', $data);
        $this->load->view('h5/home');
        $this->load->view('h5/footer');
    }

    /**
     * 获取最新收录的数据
     */
    private function _new_pick(){
        $field_val = array(1);
        $where_val = array('1 = ?');
        return $this->Poetry_Model->list_poetry($where_val, $field_val, array(0, 100));
    }
}
