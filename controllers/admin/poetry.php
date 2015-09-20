<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poetry extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Poetry_Model', '', true);
    }

    public function index() {
        $data = array();
        
        /* 审核的诗词列表 */
        $field_val = array(1);
        $where_val = array('1 = ?');
        $data['poem_list'] = $this->Poetry_Model->list_poetry($where_val, $field_val, array(0, 12));

        $data['header_data'] = $this->render_header('测试地址');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/poetry_list');
        $this->load->view('admin/footer');
    }

    public function edit() {
        $poetry_id = $this->uri->segment(4);
        $poetry_id = intval($poetry_id);
        $data = array();

        if($poetry_id == 0){
            /* 添加诗词 */
            $data['poem_info']['poetry_id'] = 0;
            $data['poem_info']['author_name'] = '';
            $data['poem_info']['poetry_title'] = '';
            $data['poem_info']['poetry_content'] = array('');
        }else{
            /* 编辑的诗词 */
            $field_val = array($poetry_id);
            $where_val = array('poetry_id = ?');
            $poem_info = $this->Poetry_Model->list_poetry($where_val, $field_val, array(0, 1));
            $data['poem_info'] = (array)($poem_info[0]);
            $data['poem_info']['poetry_content'] = json_decode($data['poem_info']['poetry_content'], true);
        }

        $data['header_data'] = $this->render_header('测试地址');
        $data['pop_warn'] = $this->load->view('admin/pop_warn', '', true);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/poetry_edit');
        $this->load->view('admin/footer');
    }
}
