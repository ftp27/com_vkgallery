<?php defined( '_JEXEC' ) or die( 'Restricted access' );
 include_once __DIR__ . '/../default/view.php';
class VkgalleryViewsAlbum extends VkgalleryViewsDefault
{
	protected $form;
	protected $items;
	protected $pagination;
	protected $limitstart;

	function display($tpl=null)
	{
		$app = JFactory::getApplication();

		$layout = $app->input->getWord('layout','albums');
		$this->setLayout($layout);
		 
		//retrieve task list from model
		$this->model = new VkgalleryModelsAlbum();
		$this->model->_layout = $layout;
		
		
		switch($layout) {
			case "albums" :
				parent::displayItems();
				break;
			case "album":
				/*
				parent::displayItem();
				*/
				break;
		}
	
		//display
		return parent::display();
	}
}
