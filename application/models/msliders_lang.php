<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Msliders_lang extends MY_Model {
	
	protected $table = 'sliders_lang';
	protected $tableslide = 'sliders';

	function gets($where=array())
	{
		$this->db->from($this->table);
		$this->db->join($this->tableslide, 'sliders.id = sliders_lang.slide_id','left');
		if(!empty($where))
		{
			foreach ($where as $k => $v) {
				$this->db->where($k,$v);
			}
		}
		return $this->db->get()->result();
	}
}