<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class vkGalleryViewVkGallery extends JViewLegacy {
	protected $items;
	protected $pagination;

	public function display($tpl = null) {
		try {
			$this->items = $this->get('Items');
			$this->pagination = $this->get('Pagination');
			$this->addToolBar();
			parent::display($tpl);
		} catch(Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	protected function addToolBar() {
		JToolBarHelper::title(JText::_('Настройки галереи'), 'vkgallery');
	}
}

?>
