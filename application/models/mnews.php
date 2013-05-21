<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Mnews extends MY_Model {
	
	protected $table = 'news';
	protected $tablelang = 'news_lang';
	
	public function findnews($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, 'news.id = news_lang.news_id');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		// $user_data = $this->db->get();
		// return $this->_get_row($user_data);
		return $this->db->get()->result();
	}
	
}
