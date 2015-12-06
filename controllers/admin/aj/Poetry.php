<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poetry extends My_Controller{

    public function index(){
        try {
            $data = array();
            $poetryId = $this->input->post('poem');
            $poetryTitle = $this->input->post('title');
            $poetryAuthor = $this->input->post('author');
            $poetryContent = $this->input->post('content');

            if(empty($poetryContent)){
                throw new Exception('诗词内容不可为空', 100001);
            }

            /* 获取作者相关信息 */
            $this->load->model('Author_Model', '', true);
            $sqlWhere = array("author_name = '{$poetryAuthor}'");
            $authorInfo = $this->Author_Model->author_list($sqlWhere);
            if(empty($authorInfo)){
                throw new Exception('请先添加作者信息', 100001);
            }

            /* 组合作者信息 */
            $authorInfo = $authorInfo[0];
            $data['author_id'] = $authorInfo['author_id'];
            $data['author_name'] = $authorInfo['author_name'];
            $data['author_time'] = $authorInfo['author_time'];

            /* 更新数据库数据 */
            $this->load->model('Poetry_Model', '', true);
            $data['poetry_content'] = $poetryContent;
            $data['poetry_title'] = $poetryTitle;
            $data['poetry_last'] = time();
            
            if($poetryId > 0){
                $this->Poetry_Model->poetry_edit($data, array('poetry_id = ' . $poetryId));
                $msg = '修改诗词成功';
            }else{
                $this->Poetry_Model->poetry_add($data);
                $msg = '添加诗词成功';
            }

            throw new Exception($msg, 100000);
        } catch (Exception $e) {
            $res = array('code' => $e->getCode(), 'msg' => $e->getMessage());
            echo json_encode($res);
        }
    }
}
