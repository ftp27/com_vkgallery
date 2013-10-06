<?php
defined('_JEXEC') or die;

JError::$legacy = false;

$document = JFactory::getDocument();

jimport('joomla.application.component.controller');

$controller = JControllerLegacy::getInstance('VkGallery');

// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));

// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();

?>
