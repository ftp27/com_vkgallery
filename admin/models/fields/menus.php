<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
JFormHelper::loadFieldClass('list');
  
class JFormFieldMenus extends JFormFieldList
{
 
	protected $type = 'Menus';
 
	public function getOptions() 
	{
		$db = JFactory::getDbo();
		
		$query = $db->getQuery(true);
		$query->select('id, title, type')
			->from('#__vkg_menu');
			
		$db->setQuery($query);
		$list = $db->loadObjectList();
		
		$id =  JFactory::getApplication()->input->get('id');
		
		$model = new VkgalleryModelsMenu();
		$childs = $model->getChilds($id);
		$ch = array();
		foreach ($childs as &$child) {
			$ch[$child->id] = $child->title;
		}
		$options = array();
		
		if ($list)
		{
			$options[]  = JHtml::_('select.option', 0, 'Корень');
			foreach ($list as $category)
			{
				if ($category->id != $id && $category->type == "elem" && !(isset($ch[$category->id]))) {
					$options[] = JHtml::_('select.option', $category->id, $category->title);
				}
			}
		}
		
		$options = array_merge(parent::getOptions(), $options);
		
		return $options;
	}
}
?>
