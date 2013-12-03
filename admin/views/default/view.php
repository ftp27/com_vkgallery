<?php defined( '_JEXEC' ) or die( 'Restricted access' );

class VkgalleryViewsDefault extends JViewLegacy
{
	protected $model = null;

    function display($tpl = null)
    {
	$document = JFactory::getDocument();
	$document->addStyleSheet(JURI::base().'components/com_vkgallery/css/style.css');

      	$this->addToolBar() ;
        //display
        return parent::display($tpl);
    }

    protected function addToolBar() {
		JToolBarHelper::title(JText::_('Настройки галлереи'), 'vkgallery');
		JToolBarHelper::preferences('com_vkgallery');
		
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
		$app = JFactory::getApplication();
		$this->limitstart = $app->input->get('limitstart',0);
		$this->model->set("limitstart",$this->limitstart);
		$this->items = $this->model->listItems();	
		$this->pagination = $this->model->getPagination();
	}
	
	public function displayItem($table) {
		$app = JFactory::getApplication();
		$data = isset($data) ? $data : JRequest::get('post');
		
		if (isset($data['jform'])) {
			$data['jform']['table'] = $table;
			$this->model->store($data['jform']);
		}
		
		$this->id = $app->input->get('id',0);
		$this->model->_id = $this->id;
		
		$this->form = $this->model->getForm();
		$this->item = $this->model->getItem();
	}
}
