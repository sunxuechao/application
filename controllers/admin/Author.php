<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dynasty_Model');
        $this->load->model('Author_Model', '', true);
    }

    public function index() {
        $data = array();
        $data['author_list'] = $this->Author_Model->author_list(array(), array(0, 10), array('author_id ASC'));
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();
        $data['header_data'] = $this->render_header('测试地址');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/author_list');
        $this->load->view('admin/footer');
    }

    /**
     * 单条审核的诗词数据
     */
    public function edit() {
        $authorId = $this->uri->segment(4);
        $authorId = intval($authorId);
        $data = array();

        if($authorId == 0){
            /* 添加作者 */
            $data['author_info']['author_id'] = 0;
            $data['author_info']['author_time'] = 0;
            $data['author_info']['author_name'] = '';
            $data['author_info']['author_brief'] = '';
        }else{
            /* 编辑作者 */
            $poemInfo = $this->Author_Model->author_list(array("author_id = {$authorId}"));
            $data['author_info'] = $poemInfo[0];
        }

        $data['header_data'] = $this->render_header('测试地址');
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();
        $data['editor_content'] = $data['author_info']['author_brief'];
        $data['pop_warn'] = $this->load->view('admin/pop_warn', '', true);
        $data['kindeditor'] = $this->load->view('admin/kind-editor', $data, true);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/author_edit');
        $this->load->view('admin/footer');
    }

    /**
     * 编辑或添加提交数据
     */
    public function submit(){
        try {
            $data = array();
            $data['msg'] = '操作成功';

            /* 拼接企图更新的数据 */
            $updateData = array();
            $updateData['author_time'] = $this->input->post('author-time');
            $updateData['author_name'] = trim($this->input->post('author-name'));
            $updateData['author_brief'] = trim($this->input->post('editor-area'));

            /* 验证作者是否存在 */
            $authorId = intval($this->input->post('author-id'));
            $authorInfo = $this->Author_Model->author_list(array("author_name = '{$updateData['author_name']}'"));
            if(!empty($authorInfo) && $authorInfo[0]['author_id'] != $authorId){
                throw new Exception("作者【{$updateData['author_name']}】已存在", 100001);
            }

            /* 判断插入还是编辑作者信息 */
            if($authorId > 0){
                $affectNum = $this->Author_Model->author_edit($updateData, array('author_id = ' . $authorId));
            }else{
                $affectNum = $this->Author_Model->author_add($updateData);
            }

            $affectNum == 0 && $data['msg'] = '操作失败';
        } catch (Exception $e) {
            $data['msg'] = $e->getMessage();
        }

        $data['msg_a'][] = array('a_href' => 'admin/author', 'a_text' => '前往列表页');
        $data['msg_a'][] = array('a_href' => 'admin/author/edit/' . $authorId, 'a_text' => '继续编辑或添加');
        $data['header_data'] = $this->render_header('测试地址');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/turn_warn');
        $this->load->view('admin/footer');
    }
}
