<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poetry extends My_Controller{

    public function index(){
        try {
            $data = array();
            $poetry_id = $this->input->post('poem');
            $poetry_title = $this->input->post('title');
            $poetry_author = $this->input->post('author');
            $poetry_content = $this->input->post('content');

            /* 格式化诗词内容 */
            $data['poetry_content'] = array_values(array_filter(explode('##', $poetry_content)));
            if(empty($data['poetry_content'])){
                throw new Exception('诗词内容不可为空', 100001);
            }

            /* 获取作者相关信息 */
            $field_val = array($poetry_author);
            $where_val = array('author_name = ?');
            $this->load->model('Author_Model', '', true);
            $author_info = $this->Author_Model->author_list($where_val, $field_val);
            if(empty($author_info)){
                throw new Exception('请先添加作者信息', 100001);
            }
            $author_info = $author_info[0];
            $data['author_id'] = $author_info->author_id;
            $data['author_name'] = $author_info->author_name;
            $data['author_time'] = $author_info->author_time;

            /* 更新数据库数据 */
            $this->load->model('Poetry_Model', '', true);
            $data['poetry_content'] = json_encode($data['poetry_content']);
            $data['poetry_title'] = $poetry_title;
            if($poetry_id > 0){
                $this->Poetry_Model->update_poem($data, array('poetry_id' => $poetry_id));
                $msg = '修改诗词成功';
            }else{
                $this->Poetry_Model->add_poetry($data);
                $msg = '添加诗词成功';
            }

            throw new Exception($msg, 100000);
        } catch (Exception $e) {
            $res = array('code' => $e->getCode(), 'msg' => $e->getMessage());
            echo json_encode($res);
        }
    }
}
