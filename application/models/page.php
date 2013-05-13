<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Page extends MY_Model {
	
	protected $table = 'page';
	protected $tablelang = 'page_lang';

	
	public function findpage($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, 'page.id = page_lang.page_id');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		$user_data = $this->db->get();
		return $this->_get_row($user_data);
	}
	
}
