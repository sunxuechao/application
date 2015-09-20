<?php
/**
 * 作者相关操作
 * 
 */
class Author_Model extends CI_Model {
    const DB_TABLE_AUTHOR = 'author';

    public function __construct() {
        parent::__construct();
    }

    /**
     * 添加作者信息
     * @param array $data 添加进数据库的数组
     * @throws 抛出可能存在的异常
     * @return int
     */
    public function add_author($data){
        if(empty($data) || !is_array($data)){
            throw new Exception('Poem Add Data Empty', 200001);
        }

        $data['create_time'] = time();
        $data['update_time'] = time();
        $this->db->insert(self::DB_TABLE_AUTHOR, $data);

        return $this->db->insert_id();
    }

    /**
     * 修改作者信息表
     * @param array $data 更新进数据库的数组
     * @param array $where 更新数据表的条件
     * @throws 抛出可能存在的异常
     * @return int
     */
    public function update_author($data = array(), $where = array()){
        if(empty($data) || !is_array($data)){
            throw new Exception('Poem Update Data Empty', 200001);
        }

        if(empty($where) || !is_array($where)){
            throw new Exception('Poem Update Where Empty', 200001);
        }

        $data['update_time'] = time();
        $this->db->update(self::DB_TABLE_AUTHOR, $data, $where);
        return $this->db->affected_rows();
    }

    /**
     * 获取作者简介信息
     * @param array $where 条件查询字段
     * @param array $field_val 条件查询值
     * @param array $limit 查询的偏移值
     * @return array
     */
    public function author_list($where = array(), $field_val = array(), $limit = array(0, 10)){
        $con_limit = implode(', ', $limit);
        $con_field = implode(' AND ', $where);

        $sql  = 'SELECT * FROM ' . self::DB_TABLE_AUTHOR . ' WHERE ' . $con_field;
        $sql .= ' ORDER BY author_id DESC LIMIT ' . $con_limit;

        $query = $this->db->query($sql, $field_val);
        return $query->result();
    }

}
