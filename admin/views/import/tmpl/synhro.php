<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
?>
<div class="row-fluid">
<div class="span2">
	<?=$this->sidebar?>
</div>
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=import'); ?>" method="post" name="adminForm" id="adminForm">
<legend>Импорт альбомов из vk.com</legend>
<div class="alert alert-info">
	<b>Синхронизация окончена:</b><br>
		Альбомов - <?=$this->album_count?><br>
		Фотографий - <?=$this->image_count?><br>
	<br>
	<b>Удалено:</b><br>
		Альбомов(вместе с фотографиями) - <?=$this->deletedAlbums?><br>
		Фотографий - <?=$this->deletedImages?><br>		
</div>
</form>
</div>
