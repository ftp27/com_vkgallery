<?php defined( '_JEXEC' ) or die( 'Restricted access' );

class VkgalletyControllersDefault extends JControllerBase
{

	public function execute()
	{
		$defaultView = "menu";
		$defaultFormat = "html";
		
		$app = $this->getApplication();

		$viewName = $app->input->getWord('view', $defaultView);
		switch ($viewName) {
			case "menu":
				$defaultLayout = "items";
				break;
			case "album":
				$defaultLayout = "albums";
				break;
			case "image":
				$defaultLayout = "images";
				break;
			case "import":
				$defaultLayout = "permissions";
				break;
		}
		
		$layoutName = $app->input->getWord('layout',$defaultLayout);
		$viewFormat = $defaultFormat;
		

		$app->input->set('view', $viewName);
		
		require_once(JPATH_COMPONENT. '/views/' . $viewName.'/html.php');
		$viewClass = 'VkgalleryViews' . ucfirst($viewName);
		$modelClass = 'VkgalleryModels' . ucfirst($viewName);

		if (false === class_exists($modelClass))
		{
			$modelClass = 'VkgalleryModelsDefault';
		}
		
		$view = new $viewClass(new $modelClass);
		$view->addTemplatePath(JPATH_COMPONENT . '/views/' . $viewName . '/tmpl');
		$view->setLayout($layoutName);

		echo $view->display();

		return true;
	}
}
?>
