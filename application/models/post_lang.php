<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Post_lang extends MY_Model {
	
	protected $table = 'posts_lang';
	protected $tableposts = 'posts';

	public function postgets($field = '*' , $where = array(), $order_by = array(), $offset = 0, $limit = 1000)
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
		$this->db->join($this->tableposts, 'posts.id = posts_lang.post_id','left');
		$this->db->limit($limit);
        $this->db->offset($offset);
        return $this->db->get()->result();
    }

    public function postfind($where = array())
    {
        if(! empty($where))
        {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->from($this->table);
        $this->db->join($this->tableposts, 'posts.id = posts_lang.post_id','left');
        $user_data = $this->db->get();
        return $this->_get_row($user_data);
        //return $this->db->get()->result();
    }
	
}
