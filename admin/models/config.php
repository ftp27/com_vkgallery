<?php
defined ( '_JEXEC' ) or die ();

jimport ( 'joomla.application.component.model' );

class vkGalleryConfig extends JModel {
	protected function getConfig() {	
		$db = JFactory::getDBo();

		$query = "SELECT * FROM `#__vkg_config`";
		$db->setQuery($query);
		$configs = $db->loadObject();

		return $configs;
	}

	public function isExist() {	
		if ($this->getConfig()) {
			return true;
		} else {
			return false;
		}
	}

	public function getAppId() {
		$config = $this->getConfig();
		if ($config) {
			return $config['app_id'];
		} else {
			return false;
		}
	}

	public function getAppKey() {
		$config = $this->getConfig();
		if ($config) {
			return $config['app_key'];
		} else {
			return false;
		}
	}

	public function getUserId() {
		$config = $this->getConfig();
		if ($config) {
			return $config['user_id'];
		} else {
			return false;
		}
	}

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
