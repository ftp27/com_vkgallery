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
		$this->setLayout($layout);
		 
		//retrieve task list from model
		$this->model = new VkgalleryModelsMenu();
		$this->model->_layout = $layout;
		
		
		switch($layout) {
			case "items" :
				parent::displayItems();
				break;
			case "item":
				/*
				parent::displayItem();
				*/
				break;
		}
	
		//display
		return parent::display();
	}
}
