<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mprogram_lang extends MY_Model {
	
	protected $table = 'program_lang';
	protected $tableprogram = 'programs';	
	
	public function findprograms($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tableprogram, 'programs.id = program_lang.program_id');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		//$user_data = $this->db->get();
		//return $this->_get_row($user_data);
		return $this->db->get()->result();
	}
	
	public function findcontent($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tableprogram, 'programs.id = program_lang.program_id');
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

	public function gets($where=array(),$order_by = array())
	{
		$this->db->from($this->table);
		$this->db->join($this->tableprogram, 'programs.id = program_lang.program_id','left');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		if(!empty($order_by))
		{
			foreach ($order_by as $x => $z) {
				$this->db->order_by($x, $z); 
			}
		}

		return $this->db->get()->result();
	}
}