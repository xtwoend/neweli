<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class News_lang extends MY_Model {
	
	protected $table = 'news_lang';
	protected $tablenews = 'news';

	public function newsgets($field = '*' , $where = array(), $order_by = array(), $offset = 0, $limit = 1000)
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
		$this->db->join($this->tablenews, 'news.id = news_lang.news_id','left');
		$this->db->limit($limit);
        $this->db->offset($offset);
        return $this->db->get()->result();
    }
	
}
