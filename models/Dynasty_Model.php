<?php
/**
 * 朝代相关操作
 */
class Dynasty_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function dynasty_list($dynasty_id = -1) {
        $list = array(
            0 => '未知', 1 => '唐朝', 2 => '宋代', 3 => '元朝', 4 => '明朝',
            5 => '清朝', 6 => '隋朝', 7 => '汉代', 
            );

        if (isset($list[$dynasty_id])) {
            return $list[$dynasty_id];
        } elseif ($dynasty_id == -1) {
            return $list;
        } else {
            return $list[0];
        }
    }
}
