<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
class VkgalleryModelsMenu extends VkgalleryModelsDefault
{
	var $_id = null;
	var $_title = null;
	var $_type = null;
	var $_album = null;
	var $_parent = null;
	var $_position = null;
	var $_visible = null;
	
	var $_tableName = '#__vkg_menu';
	
	function __construct()
	{
		parent::__construct();
    }

 	public function getForm($data = array(), $loadData = true) 
	{
		$form = $this->loadForm($this->option.'.menu', 'menu', array('control' => 'jform', 'load_data' => false));
		$form->bind($this->getItem());
 
		if (empty($form)) {
			return false;
		}
		return $form;
	}

	protected function _buildQuery()
	{
		$m = "main";
		$p = "parent";
		$a = "album";
		$i = "image"
		$db = JFactory::getDBO();
		$query = $db->getQuery(TRUE);
		$query->select(
			"$m.id as id, ".
			"$m.title as title, ".
			"$m.type as type, ".
			"$m.album as album, ".
			"$m.parent as parent, ".
			"$m.position as position, ".
			"$m.visible as visible, ".
			"$p.title as parent_title, ".
			"$a.title as album_title, ".
			"$i.photo_604 as thumb, ".
			"$i.width as thumb_width, ".
			"$i.height as thumb_height, ".
			);
		$query->from($this->_tableName." as $m");
		$query->leftJoin($this->_tableName." as $p ON $m.parent = $p.id");
		$query->leftJoin("#__vkg_album as $a ON $m.album = $a.id");
		$query->leftJoin("#__vkg_image as $i ON $a.thumb_id = $i.id");

		return $query;
	}

	protected function _buildWhere(&$query)
	{
		$m = "main";
		if(is_numeric($this->_id))
		{
			$query->where($m.'.id = ' . (int) $this->_id);
		}

		if($this->_title)
		{
			$query->where($m.'.title = "' . $this->_title . '"');
		}
		
		if($this->_type)
		{
			$query->where($m.'.type = "' . $this->_type . '"');
		}
	
		if(is_numeric($this->_album))
		{
			$query->where($m.'.album = ' . (float) $this->_album);
		}

		if(is_numeric($this->_parent))
		{
			$query->where($m.'.parent = ' . (int) $this->_parent);
		}
		
		if(is_numeric($this->_position))
		{
			$query->where($m.'.position = ' . (int) $this->_position);
		}
		
		if(is_bool($this->_visible))
		{
			$query->where($m.'.visible = ' .$this->_visible);
		}

		return $query;
	}

	function populateState()
	{

	}
	
	function getPathWay($id, &$items = array()) {
		$model = new VkgalleryModelsMenu();
		$model->_id= $id;
		$item = $model->getItem();
		$items[] = $item;
		
		if (is_numeric($item->parent) && $item->parent > 0) {
			$this->getPathWay($item->parent, $items);
		}
		return $items;
	}
	
	function getChilds($id, &$items = array()) {
		$model = new VkgalleryModelsMenu();
			
			$model->_parent= $id;
			$childs = $model->getItems();
			$items = array_merge($items,$childs);
			
			foreach ($childs as &$child) {
				$items = $this->getChilds($child->id, $items);
			}
		return $items;
	}
	 
}
