<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Msliders extends MY_Model {
	
	protected $table = 'sliders';
	protected $tablelang = 'sliders_lang';	
	
	public function findsliders($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablelang, $this->table.'.id = '.$this->tablelang.'.slide_id');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		
		return $this->db->get()->result();
	}
	
	
}