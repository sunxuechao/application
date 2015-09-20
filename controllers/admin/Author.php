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

        /* 审核的诗词列表 */
        $field_val = array(1);
        $where_val = array('1 = ?');
        $data['author_list'] = $this->Author_Model->author_list($where_val, $field_val, array(0, 10));

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
        $author_id = $this->uri->segment(4);
        $author_id = intval($author_id);
        $data = array();

        if($author_id == 0){
            /* 添加作者 */
            $data['author_info']['author_id'] = 0;
            $data['author_info']['author_time'] = 0;
            $data['author_info']['author_name'] = '';
            $data['author_info']['author_brief'] = array('');
        }else{
            /* 编辑作者 */
            $field_val = array($author_id);
            $where_val = array('author_id = ?');
            $poem_info = $this->Author_Model->author_list($where_val, $field_val, array(0, 1));
            $data['author_info'] = (array)($poem_info[0]);
            $data['author_info']['author_brief'] = json_decode($data['author_info']['author_brief']);
        }

        $data['header_data'] = $this->render_header('测试地址');
        $data['dynasty_list'] = $this->Dynasty_Model->dynasty_list();
        $data['pop_warn'] = $this->load->view('admin/pop_warn', '', true);

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
            $updateData['author_brief'] = json_encode(array_values(array_filter($this->input->post('author-brief'))));

            /* 验证作者是否存在 */
            $author_id = intval($this->input->post('author-id'));
            $where_val = array('author_name = ?', 'author_id <> ?');
            $field_val = array($updateData['author_name'], $author_id);
            $author_info = $this->Author_Model->author_list($where_val, $field_val, array(0, 1));
            if(!empty($author_info)){
                throw new Exception("作者【{$updateData['author_name']}】已存在", 100001);
            }

            /* 判断插入还是编辑作者信息 */
            if($author_id > 0){
                $affect_num = $this->Author_Model->update_author($updateData, array('author_id' => $author_id));
            }else{
                $affect_num = $this->Author_Model->add_author($updateData);
            }

            $affect_num == 0 && $data['msg'] = '操作失败';
        } catch (Exception $e) {
            $data['msg'] = $e->getMessage();
        }

        $data['msg_a'][] = array('a_href' => 'admin/author', 'a_text' => '前往列表页');
        $data['msg_a'][] = array('a_href' => 'admin/author/edit/' . $author_id, 'a_text' => '继续编辑或添加');
        $data['header_data'] = $this->render_header('测试地址');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu');
        $this->load->view('admin/turn_warn');
        $this->load->view('admin/footer');
    }
}
