<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mregisters extends MY_Model {
	
	protected $table = 'registrations';	
	protected $tableprogram = 'registration_program';
	
	public function findregisters($where = array(),$select = '*')
	{	
		$this->db->select($select);
		$this->db->from($this->table);
		$this->db->join($this->tableprogram, 'registrations.id = registration_program.registration_id');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		return $this->db->get()->result();
	}
	
}