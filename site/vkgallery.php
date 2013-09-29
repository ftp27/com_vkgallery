<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем логирование.
JLog::addLogger(
    array('text_file' => 'com_vkgallery.php'),
    JLog::ALL,
    array('com_helloworld')
);
 
// Подключаем библиотеку контроллера Joomla.
jimport('joomla.application.component.controller');
 

$controller = JControllerLegacy::getInstance('VkGallery');
 
// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));
 
// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();
?>