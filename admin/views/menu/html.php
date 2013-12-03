<?php defined( '_JEXEC' ) or die( 'Restricted access' );
 include_once __DIR__ . '/../default/view.php';
class VkgalleryViewsMenu extends VkgalleryViewsDefault
{
	protected $form;
	protected $items;
	protected $pagination;
	protected $limitstart;

	function display($tpl=null)
	{
		$app = JFactory::getApplication();

		$layout = $app->input->getWord('layout','items');
		$task = $app->input->getWord('task','');
		
		$MenuTable =& JTable::getInstance('menu', 'Table');
		if ($task == 'add') {
			$layout = 'item';
			$MenuTable->store();
			$app->input->set('id', $MenuTable->id);
		} else if ($task == 'delete') {
			$layout = 'items';
			$MenuTable->delete($app->input->get('id'));
		} 
		
		$this->setLayout($layout);
		 
		//retrieve task list from model
		$this->model = new VkgalleryModelsMenu();
		$this->model->_layout = $layout;
		
		
		switch($layout) {
			case "items" :
				parent::displayItems();
				JToolBarHelper::addNew();
				break;
			case "item":
				parent::displayItem('menu');
				break;
		}
	
		//display
		return parent::display();
	}
}
