<?php defined( '_JEXEC' ) or die( 'Restricted access' );

class VkGalleryController extends JControllerBase
{

	public function execute()
	{
		$defaultView = "vkgallery";
		$defaultFormat = "html";
		$defaultModule = "VkgalleryModelsDefault";
		
		$app = $this->getApplication();

		$viewName = $app->input->getWord('view', $defaultView);
		$viewFormat = $defaultFormat;
		
		
		$app->input->set('view', $viewName);
		
		require_once(JPATH_COMPONENT. '/views/' . $viewName.'/html.php');
		
		$viewClass = 'VkgalleryViews' . ucfirst($viewName) . ucfirst($viewFormat);
		$view = new $viewClass(new $defaultModule);
		$view->addTemplatePath(JPATH_COMPONENT . '/views/' . $viewName . '/tmpl');
		echo $view->display();
		
		return true;
	}
}
?>
