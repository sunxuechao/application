<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Poetry_Model', '', true);
    }

    public function index() {
        $data = array();

        /* 审核的诗词列表 */
        $field_val = array(1);
        $where_val = array('1 = ?');
        $data['poem_list'] = $this->Poetry_Model->list_poem_tmp($where_val, $field_val, array(0, 100));

        $data['poem_status'] = array('1' => '未审', '2' => '通过', '3' => '驳回',);
        $data['header_data'] = $this->render_header('测试地址');
        $this->load->view('admin/audit_list', $data);
    }

    /**
     * 单条审核的诗词数据
     */
    public function detail() {
        $data = array();

        /* 获取当前审核的诗词 */
        $where_val = array('poetry_id = ?');
        $field_val = array($this->uri->segment(4));
        $poem_list = $this->Poetry_Model->list_poem_tmp($where_val, $field_val, array(0, 1));
        $data['poem_detail'] = $poem_list[0];

        /* 检查是否有相似的诗词 */
        $similar_word = mb_strimwidth($data['poem_detail']->poetry_content, 0, 18);
        $where_val = array('poetry_content LIKE ?');
        $field_val = array("%" . $similar_word . "%");
        $data['similar_list'] = $this->Poetry_Model->list_poetry($where_val, $field_val, array(0, 10));

        $data['header_data'] = $this->render_header('测试地址');
        $this->load->view('admin/audit_detail', $data);
    }
}
