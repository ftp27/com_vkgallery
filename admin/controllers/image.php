<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class VkgalleryControllersImage extends VkgalleryControllersDefault 
{
	function execute()
	{
		$defaultView = "image";
		$defaultFormat = "html";
		$defaultLayout = "images";
		
		$app = JFactory::getApplication();
		$viewName = $defaultView;
		$layout = $app->input->get('layout',$defaultLayout );
		
		$app->input->set('layout',$layout);
		$app->input->set('view', $viewName);
		
		return parent::execute();
	}
}
?>
