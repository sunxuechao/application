<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends My_Controller {

    public function index(){
        $data = array();
        $data['message'] = 'this is test';
        $data['header_data'] = $this->render_header('审核详情 | 古言语');

        $this->load->view('header',$data);
        $this->load->view('home');
        $this->load->view('footer');
    }

    private function poem_list_tmp(){
        $field_con = array('1 = ?');
        $field_val = array('1');

        $this->load->model('Poetry_Model', '', true);

    }

    public function detail(){
        $this->load->model('Poetry_Model', '', true);

        $data = array();
        $data['poem_status'] = Poetry_Model::STATUS_TMP_AUDIT;
        $data['poem_info']   = $this->Poetry_Model->one_poem_tmp(7);
        $data['header_data'] = $this->render_header('审核详情 | 古言语');

        $this->load->view('header',$data);
        $this->load->view('poem_audit');
        $this->load->view('footer');
    }
}
