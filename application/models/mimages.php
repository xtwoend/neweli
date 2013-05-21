<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mimages extends MY_Model {
	
	protected $table		= 'gallery_images';	
	protected $tablegallery = 'gallery';	

	public function find_img_gal($where = array())
	{	
		$this->db->from($this->table);
		$this->db->join($this->tablegallery, 'gallery.id = gallery_images.gallery_id');
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