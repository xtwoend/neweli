<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Page_lang extends MY_Model {
	
	protected $table = 'page_lang';
	protected $tablepage = 'page';
	
	function saveedit($page_id,$lang,$data)
	{
		$this->db->where('page_id',$page_id);
		$this->db->where('lang',$lang);
		$this->db->update($this->table, $data);
	}

	function gets($where=array(),$order_by = array())
	{
		$this->db->from($this->table);
		$this->db->join($this->tablepage, 'page.id = page_lang.page_id','left');
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
