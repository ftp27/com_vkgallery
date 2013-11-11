<?php defined( '_JEXEC' ) or die( 'Restricted access' );

class VkgalleryViewsDefault extends JViewLegacy
{
	
    function display($tpl = null)
    {
	
      	$this->addToolBar() ;
        //display
        return parent::display($tpl);
    }

    protected function addToolBar() {
		JToolBarHelper::title(JText::_('Настройки галлереи'), 'vkgallery');
		//JToolBarHelper::preferences('com_radiocatalog');
		$app = JFactory::getApplication();
		$url_main = "index.php?option=com_vkgallery";
		$vName = $app->input->get('view','menu');

		JHtmlSidebar::addEntry(
			JText::_('Меню'),
			$url_main.'&view=menu',
			$vName == 'menu'
		);
		JHtmlSidebar::addEntry(
			JText::_('Альбомы'),
			$url_main.'&view=album',
			$vName == 'album'
		);
		JHtmlSidebar::addEntry(
			JText::_('Изображения'),
			$url_main.'&view=image',
			$vName == 'image'
		);
		JHtmlSidebar::addEntry(
			JText::_('Импорт'),
			$url_main.'&view=import',
			$vName == 'import'
		);
		$this->sidebar = JHtmlSidebar::render();
	}
	
	public function displayItems() {
		$this->limitstart = $app->input->get('limitstart',0);
		$model->set("limitstart",$this->limitstart);
		$this->items = $model->listItems();	
		$this->pagination = $model->getPagination();
	}
	
	public function displayItem() {
		$data = isset($data) ? $data : JRequest::get('post');
		
		if (isset($data['jform'])) {
			$data['jform']['table'] = 'category';
			$model->store($data['jform']);
		}
		
		$this->id = $app->input->get('id',0);
		$model->_id = $this->id;
		$this->form = $model->getForm();
	}
}
