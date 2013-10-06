<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class VkGalleryViewGalleries extends JViewLegacy {
	protected $items;
	protected $pagination;

	public function display($tpl = null) {
		//$model = $this->getModel("Config");
		try {
			$this->items = $this->get('Test');
			print_r($this->items);
			//$this->items = $this->get('Items');
			//$this->pagination = $this->get('Pagination');
			$this->addToolBar();
			parent::display($tpl);
		} catch(Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	protected function checkingFor($option) {
		$param = JComponentHelper::getParams('com_vkgallery')->get($option);
		if ( isset($param) &&
		     ($param != "") ) {
			return true;
		} else {
			return false; 
		}
	}

	protected function checkForConfig() {
		if ($this->checkingFor("app_id") &&
		    $this->checkingFor("app_key") &&
		    $this->checkingFor("user_id")) {
			return true;
		} else {
			return false;
		}
	}

	protected function addToolBar() {
		JToolBarHelper::title(JText::_('Настройки аккаунта vk.com'), 'vkgallery');
		JToolBarHelper::preferences('com_vkgallery');
		if ($this->checkForConfig()) {
			JToolBarHelper::custom('synhro.synh', 'refresh.png', 'refresh_f2.png', 'Синхронизировать', false);
		}
	}
}

?>
