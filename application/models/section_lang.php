<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Section_lang extends MY_Model {
	
	protected $table = 'section_lang';
	
	function saveedit($section_id,$lang,$data)
	{
		$this->db->where('section_id',$section_id);
		$this->db->where('lang',$lang);
		$this->db->update($this->table, $data);
	}

	
}
