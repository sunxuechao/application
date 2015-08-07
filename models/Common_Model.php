<?php
/**
 * 公共函数相关操作
 */
class Common_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function check_referer(){
        //检测请求链接是否正确
    }

    /**
     * 去除字符串的所有空格元素
     * @param string $str 
     */
    public function str_trimall($str = ''){
        $after  = array("", "", "", "", "");
        $before = array(" ", "　", "\t", "\n", "\r");
        return str_replace($before, $after, $str);
    }
}
