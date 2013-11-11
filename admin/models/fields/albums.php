<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
JFormHelper::loadFieldClass('list');
  
class JFormFieldAlbums extends JFormFieldList
{
 
	protected $type = 'Albums';
 
	public function getOptions() 
	{
		$db = JFactory::getDbo();
		
		$query = $db->getQuery(true);
		$query->select('id, title')
			->from('#__vkg_album');
			
		$db->setQuery($query);
		$list = $db->loadObjectList();
		
		$options = array();
		
		if ($list)
		{
			foreach ($list as $category)
			{
				$options[] = JHtml::_('select.option', $category->id, $category->title);
			}
		}
		
		$options = array_merge(parent::getOptions(), $options);
		
		return $options;
	}
}
?>
