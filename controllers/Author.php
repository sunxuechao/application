<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dynasty_Model');
    }

    public function index() {
        $data = $this->get_data();

        $this->load->view('header', $data);
        $this->load->view('author/list');
        $this->load->view('footer');
    }

    private function get_data() {
        $data = array();
        $data['header_data'] = $this->render_header('');

        return $data;
    }

    public function create(){
        $data = array();
        $data['header_data'] = $this->render_header('');
        $data['dynasty_list']= $this->Dynasty_Model->dynasty_list();

        $this->load->view('header', $data);
        $this->load->view('author/create');
        $this->load->view('footer');
    }
}
