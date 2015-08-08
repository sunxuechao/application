<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends My_Controller{

    public function index(){
        try {
            $data = array();
            $data['author_name'] = $this->input->post('name');
            $data['author_time'] = $this->input->post('time');
            $data['author_brief']= $this->input->post('brief');

            $this->load->model('Author_Model', '', true);
            $this->check_author($data['author_name'], $data['author_time']);

            $author_id = $this->Author_Model->add_author($data);
            if($author_id < 1){
                throw new Exception("作者添加失败", 200001);
            }

            throw new Exception('作者添加成功', 100000);
        } catch (Exception $e) {
            $res = array('code' => $e->getCode(), 'msg' => $e->getMessage());
            echo json_encode($res);
        }
    }

    private function check_author($author_name, $author_time){
        $where_val = array(
            'author_name = ?',
            'author_time = ?',
            );
        $field_val = array($author_name, $author_time);

        $author_info = $this->Author_Model->author_list($where_val, $field_val);
        if(empty($author_info)){
            return true;
        }

        $author_info_one = $author_info[0];
        $this->load->model('Dynasty_Model');
        $dynasty_name = $this->Dynasty_Model->dynasty_list($author_info_one->author_time);
        throw new Exception("{$dynasty_name}作者{$author_info_one->author_name}已存在", 200002);
    }
}
