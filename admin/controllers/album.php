<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class VkgalleryControllersAlbum extends VkgalleryControllersDefault 
{
	function execute()
	{
		$defaultView = "album";
		$defaultFormat = "html";
		$defaultLayout = "albums";
		
		$app = JFactory::getApplication();
		$viewName = $defaultView;
		$layout = $app->input->get('layout',$defaultLayout );
		
		$app->input->set('layout',$layout);
		$app->input->set('view', $viewName);
		
		return parent::execute();
	}
}
?>
