<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends My_Controller{

    private $_poetry_id = array();
    private $_poetry_info = array();

    public function index(){
        try {
            $this->load->model('Poetry_Model', '', true);
            $this->_poetry_id = $this->input->post('poetry_id');

            $this->one_tmp_poetry();
            //$this->update_poetry_status();
            $this->insert_poetry_really();

            throw new Exception('Poem Update Data OK', 100000);
        } catch (Exception $e) {
            $res = array('code' => $e->getCode(), 'msg' => $e->getMessage());
            echo json_encode($res);
        }
    }

    private function one_tmp_poetry(){
        $this->_poetry_info = $this->Poetry_Model->one_poem_tmp($this->_poetry_id);
        if(empty($this->_poetry_info)){
            throw new Exception("Poem Info Not Exist", 100001);
        }
    }

    /**
     * 更新诗词临时表的审核状态
     */
    private function update_poetry_status(){
        $data = array();
        $status = $this->input->post('status');
        $data['poetry_status'] = $status == 'pass' ? Poetry_Model::STATUS_TMP_PASS : Poetry_Model::STATUS_TMP_REJECT;

        $where = array();
        $where['poetry_id'] = $this->_poetry_id;
        $where['poetry_status'] = Poetry_Model::STATUS_TMP_AUDIT;

        $is_ok = $this->Poetry_Model->update_poem_tmp($data, $where);
        if($is_ok < 1){
            throw new Exception("Poem Update Data Failed", 200002);
        }
    }

    private function insert_poetry_really(){
        $data = array();
        $data['author_id'] = $this->_poetry_info->poetry_title;
        $data['poetry_title'] = $this->_poetry_info->poetry_title;
        $data['poetry_content'] = $this->_poetry_info->poetry_content;print_r($this->_poetry_info);
    }
}
