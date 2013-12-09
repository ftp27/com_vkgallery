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
<legend><?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_TITLE'); ?></legend>
<div class="alert alert-info">
	<b><?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_SYNHRO_OVER'); ?>:</b><br>
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_SYNHRO_ALBUMS'); ?> - <?=$this->album_count?><br>
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_SYNHRO_PHOTOS'); ?> - <?=$this->image_count?><br>
	<br>
	<b><?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_DELETED'); ?>:</b><br>
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_DELETED_ALBUMS'); ?> - <?=$this->deletedAlbums?><br>
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_SYNHRO_PHOTOS'); ?> - <?=$this->deletedImages?><br>		
</div>
</form>
</div>
