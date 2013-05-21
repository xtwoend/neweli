<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Section extends MY_Model {
	
	protected $table = 'sections';
	protected $primary_key  = 'id';
	protected $tablelang = 'section_lang';

	public function findsection($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, 'sections.id = section_lang.section_id');
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