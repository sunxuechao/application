<?php
/**
 * 公共函数相关操作
 */
class Poetry_Model extends CI_Model {

    const DB_TABLE_POEM = 'poetry';

    const STATUS_AUDIT  = 1;//未审核
    const STATUS_PASS   = 2;//通过
    const STATUS_REJECT = 3;//驳回
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * 插入诗词表内数据
     */
    public function poetry_add($data){
        $data['poetry_last'] = time();
        $data['poetry_create'] = time();
        
        $this->db->insert(self::DB_TABLE_POEM, $data);
        return $this->db->insert_id();
    }

    /**
     * 更新诗词表内数据
     */
    public function poetry_edit($data, $where){
        $sqlWhere = implode(' AND ', $where);
        $this->db->update(self::DB_TABLE_POEM, $data, $sqlWhere);
        
        return $this->db->affected_rows();
    }

    /**
     * @param array $where 查询条件
     * @param array $limit 返回数据偏移量
     * @param array $order 排序规则
     * @return array 诗词列表
     */
    public function poetry_list($where = array(), $limit = array(0, 10), $order = array('poetry_id DESC')){
        $sqlOrder = ' ORDER BY ' . implode(', ', $order);
        $sqlWhere = empty($where) ? '' : ' AND ' . implode(' AND ', $where);
        $sqlQuery = 'SELECT * FROM ' . self::DB_TABLE_POEM . ' WHERE poetry_status = 1 ';
        $sqlQuery = $sqlQuery . $sqlWhere . $sqlOrder . ' LIMIT ' . $limit[0] . ', ' . $limit[1];

        $query = $this->db->query($sqlQuery);
        return $query->result_array();
    }
}
