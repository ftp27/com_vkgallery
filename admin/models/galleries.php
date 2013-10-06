<?php
defined ( '_JEXEC' ) or die ();

jimport ( 'joomla.application.component.model' );

/*
* Model for working with Galleries table
*/
class VkGalleryModelGalleries extends JModelList {

        protected function getListQuery(){      
                // Создаем новый query объект.
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);

                // Выбераем поля.
                $query->select('id, title');

                $query->from('#__vkg_galleries');

                return $query;
        }

	/*
	* Get galleries from Data Base
	*/
/*	protected function getGalleries() {	
		$db = JFactory::getDBo();

		$query = "SELECT * FROM `#__vkg_galleries`";
		$db->setQuery($query);
		$configs = $db->loadObject();

		return $configs;
	} */

	/*
	* Checking for galleries
	*/
/*	public function isExist() {	
		if ($this->getGalleries()) {
			return true;
		} else {
			return false;
		}
	} */

	/*
	* Add new gallery
	*/

//	public function addGallery(
//	    $id, $thumb_id, $title, $description, 
//	    $created, $updated, $size, $thumb_src) {
	/*
		$config = $this->getConfig();
		if ($config) {
			$query = "UPDATE `#__vkg_config` SET 
					`app_id`  = $app_id,
					`app_key` = '$app_key',
					`user_id` = $user_id";
		} else {
			$query = "INSERT INTO `#__vkg_config` (`app_id`,`app_key`,`user_id`)
					VALUES ($app_id,'$app_key',$user_id)";
		}

		$db = JFactory::getDBo();
		$db->setQuery($query);
		return $db->loadResult();
	*/
//	}
}
?>
