<?php defined( '_JEXEC' ) or die( 'Restricted access' );
 include_once __DIR__ . '/../default/view.php';
class VkgalleryViewsImage extends VkgalleryViewsDefault
{
	protected $form;
	protected $items;
	protected $pagination;
	protected $limitstart;

	function display($tpl=null)
	{
		$app = JFactory::getApplication();

		$layout = $app->input->getWord('layout','images');
		$this->setLayout($layout);
		 
		//retrieve task list from model
		$model = new VkgalleyModelsImage();
		$model->_layout = $layout;
		
		
		switch($layout) {
			case "images" :
				parent::displayItems();
				break;
			case "image":
				/*
				parent::displayItem();
				*/
				break;
		}
	
		//display
		return parent::display();
	}
}
