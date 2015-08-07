<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poem extends My_Controller{

    public function index(){
        try {
            $data = $this->add_data();
            $this->load->model('Poetry_Model', '', true);
            $this->Poetry_Model->add_poem_tmp($data);

            throw new Exception('Poem Add Data OK', 100000);
        } catch (Exception $e) {
            $res = array('code' => $e->getCode(), 'msg' => $e->getMessage());
            echo json_encode($res);
        }
    }

    private function add_data(){
        $data = array();
        $data['poetry_title']  = $this->input->post('title');
        $data['author_name']   = $this->input->post('author');
        $data['poetry_content']= $this->input->post('content');

        $this->load->model('Common_Model');
        $data = $this->Common_Model->str_trimall(json_encode($data));

        return json_decode($data, true);
    }
}
