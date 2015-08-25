<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends My_Controller {

    public function index() {
        $data = array();
        $data['poem_list'] = $this->_poem_list();
        $data['poem_status'] = $this->_poem_status();
        $data['header_data'] = $this->render_header('测试地址');
        $this->load->view('admin/audit_list', $data);
    }

    /**
     * 获取渲染到页面的数据
     */
    public function detail() {
        $data = array();
        $data['poem_list'] = $this->_poem_list();
        $data['poem_status'] = $this->_poem_status();
        $data['header_data'] = $this->render_header('测试地址');
        $this->load->view('admin/audit_detail', $data);
    }

    /**
     * 审核的诗词列表
     */
    private function _poem_list() {
        $field_val = array(1);
        $where_val = array('1 = ?');
        $this->load->model('Poetry_Model', '', true);
        return $this->Poetry_Model->list_poem_tmp($where_val, $field_val, array(0, 100));
    }

    /**
     * 审核的诗词状态
     */
    private function _poem_status(){
        return array(
            '1' => '未审',
            '2' => '通过',
            '3' => '驳回',
        );
    }
}
