<?php
/**
 * 公共函数相关操作
 */
class Poetry_Model extends CI_Model {

    const DB_TABLE_POEM = 'poetry';
    const DB_TABLE_POEM_TMP = 'poetry_tmp';

    const STATUS_TMP_AUDIT  = 1;//未审核
    const STATUS_TMP_PASS   = 2;//通过
    const STATUS_TMP_REJECT = 3;//驳回
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * 添加诗词到临时表
     * @param array $data 添加进数据库的数组
     * @throws 抛出可能存在的异常
     * @return int
     */
    public function add_poem_tmp($data = array()){
        if(empty($data) || !is_array($data)){
            throw new Exception('Poem Add Data Empty', 200001);
        }

        $data['poetry_status'] = 1;
        $data['poetry_create'] = time();
        $this->db->insert(self::DB_TABLE_POEM_TMP, $data);

        return $this->db->insert_id();
    }

    /**
     * 修改临时表诗词
     * @param array $data 更新进数据库的数组
     * @param array $where 更新数据表的条件
     * @throws 抛出可能存在的异常
     * @return int
     */
    public function update_poem_tmp($data = array(), $where = array()){
        if(empty($data) || !is_array($data)){
            throw new Exception('Poem Update Data Empty', 200001);
        }

        if(empty($where) || !is_array($where)){
            throw new Exception('Poem Update Where Empty', 200001);
        }

        $this->db->update(self::DB_TABLE_POEM_TMP, $data, $where);
        return $this->db->affected_rows();
    }

    /**
     * 获取临时表诗词
     * @param array $where 条件查询字段
     * @param array $field_val 条件查询值
     * @param array $limit 查询的偏移值
     * @return array
     */
    public function list_poem_tmp($where = array(), $field_val = array(), $limit = array(0, 10)){
        $con_limit = implode(', ', $limit);
        $con_field = implode(' AND ', $where);

        $sql  = 'SELECT * FROM ' . self::DB_TABLE_POEM_TMP . ' WHERE ' . $con_field;
        $sql .= ' ORDER BY poetry_id DESC LIMIT ' . $con_limit;

        $query = $this->db->query($sql, $field_val);
        return $query->result();
    }

    /**
     * 获取一条临时表诗词
     * @param int $tmp_id 临时表诗词ID
     * @return array
     */
    public function one_poem_tmp($tmp_id = 0){
        $sql = 'SELECT * FROM ' . self::DB_TABLE_POEM_TMP . ' WHERE poetry_id = ? LIMIT 1';
        $query = $this->db->query($sql, array($tmp_id));
        $poem_info = $query->result();

        return isset($poem_info[0]) ? $poem_info[0] : array();
    }

    /**
     * 添加诗词到正式表
     * @param array $data 添加进数据库的数组
     * @throws 抛出可能存在的异常
     * @return int
     */
    public function add_poetry($data = array()){
        if(empty($data) || !is_array($data)){
            throw new Exception('Poem Add Data Empty', 200001);
        }

        $data['poetry_status'] = 1;
        $data['poetry_view']   = 1;
        $data['poetry_create'] = time();
        $data['poetry_last']   = time();
        $this->db->insert(self::DB_TABLE_POEM, $data);

        return $this->db->insert_id();
    }
}
