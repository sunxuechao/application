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

    public function add_author(){
        $add_data = array();
        $add_data['author_name']  = $this->uri->segment(1);
        $add_data['author_time']  = time();
        $add_data['author_brief'] = $this->uri->segment(2);

        $this->db->insert(self::DB_TABLE_AUTHOR, $add_data);
    }

    public function get_authors(){
        $sql = 'SELECT * FROM ' . self::DB_TABLE_AUTHOR . ' WHERE author_id = ?';
        $query = $this->db->query($sql, array(2));
        return $query->result();
    }

}
