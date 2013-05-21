<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Page_lang extends MY_Model {
	
	protected $table = 'page_lang';
	
	function saveedit($page_id,$lang,$data)
	{
		$this->db->where('page_id',$page_id);
		$this->db->where('lang',$lang);
		$this->db->update($this->table, $data);
	}
}
