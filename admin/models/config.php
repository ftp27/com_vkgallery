<?php
defined ( '_JEXEC' ) or die ();

jimport ( 'joomla.application.component.model' );



/*
* Model for working with main configuration
*/
class VkGalleryModelConfig extends JModel {

	/*
	* Get config from Data Base
	*/
	protected function getConfig() {	
		$db = JFactory::getDBo();

		$query = "SELECT * FROM `#__vkg_config`";
		$db->setQuery($query);
		$configs = $db->loadObject();

		return $configs;
	}

	/*
	* Checking for config
	*/
	public function isExist() {	
		if ($this->getConfig()) {
			return true;
		} else {
			return false;
		}
	}

	/*
	* Get app_id
	*/
	public function getAppId() {
		$config = $this->getConfig();
		if ($config) {
			return $config['app_id'];
		} else {
			return false;
		}
	}

	/*
	* Get app_key
	*/
	public function getAppKey() {
		$config = $this->getConfig();
		if ($config) {
			return $config['app_key'];
		} else {
			return false;
		}
	}
 
	/*
	* Get user_id
	*/
	public function getUserId() {
		$config = $this->getConfig();
		if ($config) {
			return $config['user_id'];
		} else {
			return false;
		}
	}

	/*
	* Set new configuration 
	*/
	public function setConfig($app_id, $app_key, $user_id) {
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
	}
}
?>
