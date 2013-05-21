<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mregisters extends MY_Model {
	
	protected $table = 'registrations';	
	
	public function findprograms($where = array())
	{	
		$this->db->from($this->table);		
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		
		return $this->db->get()->result();
	}
	// optional (if not set its plural of your class name)
	// protected $table	= 'table';
	
	// optional (if not set its 'id')
	// protected $primary 	= 'primarykey';
	
}