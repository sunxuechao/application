<?php
/**
 * 作者相关操作
 */
class Author_Model extends CI_Model {

    const DB_TABLE_AUTHOR = 'author';

    public function __construct() {
        parent::__construct();
    }

    /**
     * 插入作者表内数据
     */
    public function author_add($data){
        $data['create_time'] = time();
        $data['update_time'] = time();
        
        $this->db->insert(self::DB_TABLE_AUTHOR, $data);
        return $this->db->insert_id();
    }

    /**
     * 更新作者表内数据
     */
    public function author_edit($data, $where){
        $data['update_time'] = time();
        $sqlWhere = implode(' AND ', $where);
        $this->db->update(self::DB_TABLE_AUTHOR, $data, $sqlWhere);
        
        return $this->db->affected_rows();
    }

    /**
     * @param array $where 查询条件
     * @param array $limit 返回数据偏移量
     * @param array $order 排序规则
     * @return array 作者列表
     */
    public function author_list($where = array(), $limit = array(0, 10), $order = array('author_id DESC')){
        $sqlOrder = ' ORDER BY ' . implode(', ', $order);
        $sqlWhere = empty($where) ? '' : ' AND ' . implode(' AND ', $where);
        $sqlQuery = 'SELECT * FROM ' . self::DB_TABLE_AUTHOR . ' WHERE author_status = 0 ';
        $sqlQuery = $sqlQuery . $sqlWhere . $sqlOrder . ' LIMIT ' . $limit[0] . ', ' . $limit[1];

        $query = $this->db->query($sqlQuery);
        return $query->result_array();
    }
}
