<?php defined( '_JEXEC' ) or die( 'Restricted access' );
 include_once __DIR__ . '/../default/view.php';
class VkgalleryViewsImport extends VkgalleryViewsDefault
{
	protected $form;
	protected $items;
	protected $pagination;
	protected $limitstart;
	
	protected $configAvaible;
	protected $client_id;
	protected $client_secret;
	protected $user_id;
	protected $redirectURL;

	function display($tpl=null)
	{
		$app = JFactory::getApplication();
		$layout = $app->input->getWord('layout','login');
		
		
		$this->redirectURL = JURI::base().'index.php?option=com_vkgallery';
		$this->configAvaible = $this->checkForConfig();
		$this->client_id = JComponentHelper::getParams('com_vkgallery')->get("client_id");
		$this->client_secret = JComponentHelper::getParams('com_vkgallery')->get("client_secret");
		$this->user_id = JComponentHelper::getParams('com_vkgallery')->get("user_id");
		
		//retrieve task list from model
		if ($layout == "synhro") {
			$ImageModel = new VkgalleryModelsImage();
			$AlbumModel = new VkgalleryModelsAlbum();
			
			$ImageTable =& JTable::getInstance('image', 'Table');
			$AlbumTable =& JTable::getInstance('album', 'Table');
			
			
			
			$code = JRequest::getVar('code', '');
			if ($code != "" && $this->configAvaible) {
				//get Access token
				$json = file_get_contents("https://oauth.vk.com/access_token?client_id=".$this->client_id ."&client_secret=".$this->client_secret ."&code=".$code."&redirect_uri=".$this->redirectURL);
				$obj = json_decode($json);
				$access_token = $obj->access_token;
				
				//get Albums
				$json = file_get_contents("https://api.vk.com/method/photos.getAlbums?owner_id=".$this->user_id."&need_covers=1&v=5.2&access_token=".$access_token);
				$obj = json_decode($json);
				
				$count = $obj->response->count;
				$albums = $obj->response->items;

				//Remove deleted albums
				$this->deletedAlbums = $AlbumModel->deleteAlbums($albums);
				$this->deletedImages = 0;
				
				$this->album_count = $count;
				$this->image_count = 0;
				
				for ($i=0; $i<$count; $i++) {
					$album_id = $albums[$i]->id;
					$this->story($AlbumTable, $AlbumModel, $albums[$i]);
					
					
					$image_json = file_get_contents("https://api.vk.com/method/photos.get?owner_id=".$this->user_id."&album_id=".$album_id."&v=5.2&rev=1&extended=1&access_token=".$access_token);
					$image_obj = json_decode($image_json);
					$image_count = $image_obj->response->count;
					$images = $image_obj->response->items;

					//Remove deleted images
					$this->deletedImages += $ImageModel->deleteImages($images,$album_id);
					
					$this->image_count += $image_count;
					
					for ($j=0; $j<$image_count; $j++) {
						$images[$j]->likes = $images[$j]->likes->count;
						$images[$j]->comments = $images[$j]->comments->count;
						if (!$images[$j]->width) {
							$images[$j]->width = 0;
						}
						
						if (!$images[$j]->height) {
							$images[$j]->height = 0;
						}
						
						$this->story($ImageTable, $ImageModel, $images[$j]);
					}
					
				}
			}
		} else {
			$ImageTable =& JTable::getInstance('image', 'Table');
		}
		//display
		return parent::display();
	}
	
	protected function story($Table, $Model, $data) {
		if ($Table->load($data->id)) {
			if (!$Table->bind($data)) {
				return JError::raiseWarning( 500, $Table->getError() );
			}
			if (!$Table->store()) {
				return JError::raiseError(500, $Table->getError() );
			}
		} else {
			$Model->insert($data);
		}
	}
	
	protected function checkingFor($option) {
		$param = JComponentHelper::getParams('com_vkgallery')->get($option);
		if ( isset($param) && ($param != "") ) {
			return true;
		} else {
			return false; 
		}
	}

	protected function checkForConfig() {
		if ($this->checkingFor("client_id") &&
			$this->checkingFor("client_secret") &&
			$this->checkingFor("user_id")) {
			return true;
		} else {
			return false;
		}
	}
}
