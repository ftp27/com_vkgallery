<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

function VkgalleryBuildRoute(&$query) {
	$defaultView = "vkgallery";
	
	$segments = array();
	
	if (!isset($query['view'] )) {$query['view']  = $defaultView; }
	if (!isset($query['id'] )) {$query['id']  = 0; }
	
	if ($query['view'] == 'vkgallery') {
		$segment = $query['id'];
		if (isset($query['page'])) {
			$serment .= "_".$query['page'];
			unset($query['page']);
		}
		$segments[] = $segment;
		unset($query['view']);
		unset($query['id']);
	}
	return $segments;
}

function VkgalleryParseRoute($segments) {
	$vars['view'] = 'vkgallery';
	if (strpos('_',$segments[0])) {
		$vars['id'] = substr(
			$segments[0], 
			0, 
			strpos('_', $segments[0])+1
		);
		$vars['page'] = substr(
			$segments[0], 
			strpos('_', $segments[0])+1, 
			strlen($segments[0])
		);
	} else {
		$vars['id'] = $segments[0];
		$vars['page'] = 0;
	}
	
	if (!is_numeric($vars['id'])) {
		$vars['id'] = 0;
	}
	
	if (!is_numeric($vars['page'])) {
		$vars['page'] = 0;
	}
	
	return $vars;
}
?>
