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
				parent::displayItem("album");
				$modelImage = new VkgalleryModelsImage();
				
				$this->model->set("limitstart",0);
				$this->model->set("limit",10000);
				$modelImage->_album_id  = $this->item->id;
				$this->images = $modelImage->listItems();
								
				$modelImage->_id = $this->item->thumb_id;
				$this->thumb = $modelImage->getItem();
				break;
		}
	
		//display
		return parent::display();
	}
}
