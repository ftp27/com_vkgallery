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
		//$form = $this->loadForm($this->option.'.item', 'item', array('control' => 'jform', 'load_data' => false));
		//$form->bind($this->getItem());
 
		if (empty($form)) {
			return false;
		}
		return $form;
	}

	protected function _buildQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(TRUE);
		$query->select('id, title, type, album, parent, position, visible');
		$query->from($this->_tableName);

		return $query;
	}

	protected function _buildWhere(&$query)
	{
		if(is_numeric($this->_id))
		{
			$query->where('id = ' . (int) $this->_id);
		}

		if($this->_title)
		{
			$query->where('title = "' . $this->_title . '"');
		}
		
		if($this->_type)
		{
			$query->where('type = "' . $this->_type . '"');
		}
	
		if(is_numeric($this->_album))
		{
			$query->where('album = ' . (float) $this->_album);
		}

		if(is_numeric($this->_parent))
		{
			$query->where('parent = ' . (int) $this->_parent);
		}
		
		if(is_numeric($this->_position))
		{
			$query->where('position = ' . (int) $this->_position);
		}
		
		if(is_bool($this->_visible))
		{
			$query->where('visible = ' .$this->_visible);
		}

		return $query;
	}

	function populateState()
	{

	}

 
}
