<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
class VkgalleryModelsImage extends VkgalleryModelsDefault
{

	var $_id = null;
	var $_album_id = null;
	var $_photo_75 = null;
	var $_photo_130 = null;
	var $_photo_604 = null;
	var $_photo_807 = null;
	var $_photo_1280 = null;
	var $_photo_2560 = null;
	var $_width = null;
	var $_height = null;
	var $_text = null;
	var $_date = null;
	var $_likes = null;
	var $_comments = null;
	var $_position = null;
	var $_visible = null;
	
	var $_tableName = '#__vkg_image';
	
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
		$query->select('id, album_id, photo_75, photo_130, photo_604, photo_807, photo_1280, photo_2560, width, height, text, date, likes, comments, position, visible');
		$query->from($this->_tableName);

		return $query;
	}

	protected function _buildWhere(&$query)
	{
		if(is_numeric($this->_id))
		{
			$query->where('id = ' . (int) $this->_id);
		}
		
		if(is_numeric($this->_album_id))
		{
			$query->where('album_id = ' . (float) $this->_album_id);
		}
		
		if($this->_text)
		{
			$query->where('text = "' . $this->_text . '"');
		}
		
		if(is_numeric($this->_date))
		{
			$query->where('date = ' . (float) $this->_date);
		}
		
		if(is_numeric($this->_width))
		{
			$query->where('width = ' . (float) $this->_width);
		}
		
		if(is_numeric($this->_height))
		{
			$query->where('height = ' . (float) $this->_height);
		}
		
		if(is_numeric($this->_likes))
		{
			$query->where('likes = ' . (float) $this->_likes);
		}
		
		if(is_numeric($this->_comments))
		{
			$query->where('comments = ' . (float) $this->_comments);
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
													"(`id`, `album_id`, `photo_75`, `photo_130`, `photo_604`, `photo_807`, `photo_1280`, `photo_2560`, `width`, `height`, `text`, `date`, `likes`, `comments`) VALUES ".
													"(".
														$data->id." , ".
												"'".mysql_escape_string($data->album_id)."' , ".
												"'".mysql_escape_string($data->photo_75)."' , ".
												"'".mysql_escape_string($data->photo_130)."' , ".
												"'".mysql_escape_string($data->photo_604)."' , ".
												"'".mysql_escape_string($data->photo_807)."' , ".
												"'".mysql_escape_string($data->photo_1280)."' , ".
												"'".mysql_escape_string($data->photo_2560)."' , ".
														$data->width." , ".
														$data->height." , ".
												"'".mysql_escape_string($data->text)."' , ".
														$data->date." , ".
														$data->likes." , ".
														$data->comments.
													")");
		return $db->query();
	}

 
}
