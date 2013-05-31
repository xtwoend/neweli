<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mposts extends MY_Model {
	
	protected $table = 'posts';
	protected $tablelang = 'posts_lang';	

	public function findpost($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, 'posts.id = posts_lang.post_id');
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