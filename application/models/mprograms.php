<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mprograms extends MY_Model {
	
	protected $table = 'programs';	
	protected $tablelang = 'program_lang';
	
	public function findprograms($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, 'programs.id = program_lang.program_id');
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
	
	public function findprog($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, 'programs.id = program_lang.program_id');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		$user_data = $this->db->get();
		return $this->_get_row($user_data);
		//return $this->db->get()->result();
	}
	
}