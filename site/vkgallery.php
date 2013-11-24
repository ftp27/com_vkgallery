<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.session.session' );
JTable::addIncludePath(JPATH_COMPONENT.'/tables');
JLoader::registerPrefix('Vkgallery', JPATH_COMPONENT);

$app = JFactory::getApplication();
require_once(JPATH_COMPONENT.'/controller.php');


$classname = 'VkGalleryController';
$controller = new $classname();

$controller->execute();
?>
