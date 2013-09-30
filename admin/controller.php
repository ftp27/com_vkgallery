<?php
define('_JEXEC') or die;

jimport('joomla.application.component.controller');

class VkGalleryController extends JControllerLegacy {
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display($cachable = false, $urlparams = array()) {
		echo "testtesttest";
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'VkGallerys'));

		parent::display($cachable);
	} 
}
?>
