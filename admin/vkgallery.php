<?php
defined('_JEXEC') or die;

JError::$legacy = false;

$document = JFactory::getDocument();

jimport('joomla.application.component.controller');

$controller = JControllerLegacy::getInstance('VkGallerys');

// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));

// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();



//require_once( JPATH_COMPONENT.DS.'controller.php' );

/*$controller = JControllerLegacy::getInstance('VkGallerys');

$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));

$controller->redirect();


*/
/*
// Require specific controller if requested
if($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

// Create the controller
$classname	= 'VkGalleryController'.$controller;
$controller	= new $classname();

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();
*/
?>
