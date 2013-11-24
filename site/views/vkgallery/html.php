<?php defined( '_JEXEC' ) or die( 'Restricted access' );
 
class VkgalleryViewsVkgalleryHtml extends JViewLegacy
{
	function display()
	{
		
		$app = JFactory::getApplication();
		$this->id = $app->input->get('id',0);
		$page = $app->input->get('page',0);
		
		if ($this->id == 0) {
			$layout = "menu";
		}

		//retrieve task list from model
		$menuModel = new VkgalleryModelsMenu();
		if ($this->id == 0) {
			$menuModel->_parent = 0;
		} else {
			$menuModel->_id = $this->id;
		}
		
		$this->menuItem = $menuModel->getItem();
		$this->pathway = $menuModel->getPathWay($this->id);
		
		if ($this->menuItem->type == "elem") {
			$layout = "menu";
			$menuModel->_parent = $this->id;
			$menuModel->_id = null;
			$this->childs = $menuModel->getItems();
		} else {
			$layout = "album";
		}

		//display
		$document->addStyleSheet(JURI::base().'components/com_vkgallery/css/style.css');
		$this->setLayout($layout);
		return parent::display();
	}
}
