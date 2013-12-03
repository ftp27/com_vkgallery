<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.session.session' );
JTable::addIncludePath(JPATH_COMPONENT.'/tables');
JLoader::registerPrefix('Vkgallery', JPATH_COMPONENT);

$app = JFactory::getApplication();

if($controller = $app->input->get('controller','default')) {
	require_once(JPATH_COMPONENT.'/controllers/'.$controller.'.php');
}

$classname = 'VkgalleryControllers'.ucfirst($controller);
$controller = new $classname();

$controller->execute();
?>
