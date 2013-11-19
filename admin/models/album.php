<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
class VkgalleryModelsAlbum extends VkgalleryModelsDefault
{
	var $_id = null;
	var $_thumb_id = null;
	var $_title = null;
	var $_description = null;
	var $_created = null;
	var $_updated = null;
	var $_size = null;
	var $_thumb_src = null;
	var $_position = null;
	var $_visible = null;
	
	var $_tableName = '#__vkg_album';
	
	
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
		$query->select('id, thumb_id, title, description, created, updated, size, thumb_src, position, visible');
		$query->from($this->_tableName);

		return $query;
	}

	protected function _buildWhere(&$query)
	{
		if(is_numeric($this->_id))
		{
			$query->where('id = ' . (int) $this->_id);
		}
		
		if(is_numeric($this->_thumb_id))
		{
			$query->where('thumb_id = ' . (float) $this->_thumb_id);
		}
		
		if($this->_title)
		{
			$query->where('title = "' . $this->_title . '"');
		}
		
		if($this->_description)
		{
			$query->where('description = "' . $this->_description . '"');
		}
		
		if(is_numeric($this->_created))
		{
			$query->where('created = ' . (float) $this->_created);
		}
		
		if(is_numeric($this->_updated))
		{
			$query->where('updated = ' . (float) $this->_updated);
		}
		
		if(is_numeric($this->_size))
		{
			$query->where('size = ' . (float) $this->_size);
		}
		
		if($this->_thumb_src)
		{
			$query->where('thumb_src = "' . $this->_thumb_src . '"');
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
	
	function insert($data) {
		$db = JFactory::getDBO();
		$db->setQuery("INSERT INTO ".$this->_tableName.
													"(`id`, `thumb_id`, `title`, `description`, `created`, `updated`, `size`, `thumb_src`) VALUES ".
													"(".
														$data->id." , ".
												"'".mysql_escape_string($data->thumb_id)."' , ".
												"'".mysql_escape_string($data->title)."' , ".
												"'".mysql_escape_string($data->description)."' , ".
														$data->created." , ".
														$data->updated." , ".
														$data->size." , ".
												"'".mysql_escape_string($data->thumb_src)."'".
													")");
		return $db->query();
	}

}
?>
