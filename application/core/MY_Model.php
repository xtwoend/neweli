<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table;
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function _get_row($result)
    {
        return $result->num_rows() ? $result->row() : FALSE;
    }

    public function _exist($id = null, $field = false){
        $idkey = ($field) ? $field : $this->primary_key;
        $this->db->where($idkey, $id);
        $this->db->from($this->table);
        $rec = $this->db->count_all_results();
        if($rec > 0)
        {
            return TRUE;
        }
        return FALSE;
    }   

    public function all($where = array(), $order_by = array(), $offset = 0, $limit = 1000 )
    {   
        if(! empty($order_by))
        {
            foreach ($order_by as $k => $v) {
                $this->db->order_by($k,$v);
            }
        }

        if(! empty($where))
        {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        $this->db->from($this->table);
        $this->db->limit($limit);
        $this->db->offset($offset);
        return $this->db->get()->result();

    }

    public function get($field = '*' , $where = array(), $order_by = array(), $offset = 0, $limit = 1000)
    {

        if(! empty($order_by))
        {
            foreach ($order_by as $k => $v) {
                $this->db->order_by($k,$v);
            }
        }

        if(! empty($where))
        {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->select($field);
        $this->db->from($this->table);
        $this->db->limit($limit);
        $this->db->offset($offset);
        return $this->db->get()->result();
    }

    public function find($where = array())
    {   
        $this->db->from($this->table);
        if(!empty($where))
        {
            foreach ($where as $k => $v) {
                $this->db->where($k,$v);
            }
        }
        $user_data = $this->db->get();
        return $this->_get_row($user_data);
    }
    public function add($data = array())
    {
        $this->db->insert($this->table, $data); 
        return $this->db->insert_id();
    }

    public function edit($id, $data = array(), $field = false)
    {   $idkey = ($field) ? $field : $this->primary_key;
        if($this->_exist($id , $field)){
            $this->db->where($idkey, $id);
            $this->db->update($this->table, $data);
            return $id; 
        }
        return FALSE;
    }
    public function delete($id, $field = false)
    {   
        $idkey = ($field) ? $field : $this->primary_key;
        if($this->_exist($id, $field)){
            $this->db->where($idkey , $id);
            $this->db->delete($this->table);
            return TRUE;
        }
        return FALSE;
    }
    
}