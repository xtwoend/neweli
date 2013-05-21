<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mgalleries extends MY_Model {
	
	protected $table = 'gallery';	
	
	public function findgalleries($where = array())
	{	
		$this->db->from($this->table);
		// $this->db->join($this->tablelang, 'news.id = news_lang.news_id');
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
	// optional (if not set its plural of your class name)
	// protected $table	= 'table';
	
	// optional (if not set its 'id')
	// protected $primary 	= 'primarykey';
	
}