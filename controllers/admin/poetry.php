<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poetry extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Poetry_Model', '', true);
    }

    public function index() {
        $data = array();
        $data['header_data'] = $this->render_header('后台管理');
        $data['poetry_list'] = $this->Poetry_Model->poetry_list(array(), array(0, 10), array('poetry_id ASC'));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/poetry_list');
        $this->load->view('admin/footer');
    }

    public function edit() {
        $poetryId = $this->uri->segment(4);
        $poetryId = intval($poetryId);
        $data = array();

        if($poetryId == 0){
            /* 添加诗词 */
            $data['poem_info']['poetry_id'] = 0;
            $data['poem_info']['author_name'] = '';
            $data['poem_info']['poetry_title'] = '';
            $data['poem_info']['poetry_content'] = '';
        }else{
            /* 编辑的诗词 */
            $poemInfo = $this->Poetry_Model->poetry_list(array('poetry_id = ' . $poetryId));
            $data['poem_info'] = $poemInfo[0];
        }

        $data['header_data'] = $this->render_header('测试地址');
        $data['editor_content'] = $data['poem_info']['poetry_content'];
        $data['pop_warn'] = $this->load->view('admin/pop_warn', '', true);
        $data['kindeditor'] = $this->load->view('admin/kind-editor', $data, true);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/poetry_edit');
        $this->load->view('admin/footer');
    }
}
