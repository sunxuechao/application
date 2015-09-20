<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends My_Controller{

    private $_tmp_id = 0;
    private $_tmp_info = array();

    public function index(){
        try {
            $this->load->model('Poetry_Model', '', true);
            $this->_tmp_id = $this->input->post('tmp_id');

            $this->_set_tmp_info();
            $this->_update_poetry_status();

            throw new Exception('审核成功', 100000);
        } catch (Exception $e) {
            $res = array('code' => $e->getCode(), 'msg' => $e->getMessage());
            echo json_encode($res);
        }
    }

    /**
     * 获取要审核的数据
     */
    private function _set_tmp_info(){
        if(!empty($this->_tmp_info)){
            return $this->_tmp_info;
        }

        $this->_tmp_info = $this->Poetry_Model->one_poem_tmp($this->_tmp_id);

        if(empty($this->_tmp_info)){
            throw new Exception("要审核的数据不存在", 100001);
        }

        if($this->_tmp_info->poetry_status != 1){
            throw new Exception("数据已被审核", 100001);
        }

        return $this->_tmp_info;
    }

    /**
     * 获取作者ID
     */
    private function _get_author_info(){
        $tmp_info = $this->_set_tmp_info();
        $where_val = array('author_name = ?');
        $field_val = array($tmp_info->author_name);

        $this->load->model('Author_Model', '', true);
        $author_info = $this->Author_Model->author_list($where_val, $field_val);
        if(empty($author_info)){
            throw new Exception("请先添加作者信息", 100001);
        }

        return $author_info[0];
    }

    /**
     * 添加诗词入库
     */
    private function _insert_really_poetry(){        
        $status = $this->input->post('status');
        if($status == 'reject'){return 0;}

        $tmp_info = $this->_set_tmp_info();
        $author_info = $this->_get_author_info();

        $data = array();
        $data['poetry_title']   = $tmp_info->poetry_title;
        $data['poetry_content'] = $tmp_info->poetry_content;
        $data['author_id']      = $author_info->author_id;
        $data['author_name']    = $author_info->author_name;
        $data['author_time']    = $author_info->author_time;

        $poetry_id = $this->Poetry_Model->add_poetry($data);
        if($poetry_id < 1){
            throw new Exception("添加诗词审核失败", 200001);
        }

        return $poetry_id;
    }

    /**
     * 更新诗词临时表的审核状态
     */
    private function _update_poetry_status(){
        $data = array();
        $status = $this->input->post('status');
        $data['show_id'] = $this->_insert_really_poetry();
        $data['poetry_status'] = $status == 'pass' ? Poetry_Model::STATUS_TMP_PASS : Poetry_Model::STATUS_TMP_REJECT;

        $where = array();
        $where['poetry_id'] = $this->_tmp_id;
        $where['poetry_status'] = Poetry_Model::STATUS_TMP_AUDIT;

        $is_ok = $this->Poetry_Model->update_poem_tmp($data, $where);
        if($is_ok < 1){
            throw new Exception("更新审核状态失败", 200002);
        }
    }
}
