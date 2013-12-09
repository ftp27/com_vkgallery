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
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_DESCRIPTION1'); ?>  
			<a href="http://vk.com/editapp?act=create">
				<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_VK_CREATE_APP'); ?> 
			</a><br>
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_DESCRIPTION2'); ?> 
			<a href="<?=JRoute::_('index.php?option=com_config&view=component&component=com_vkgallery');?>" type="button" class="btn btn-default">
				<span class="icon-options"></span>
				<?php echo JText::_('COM_VKGALLERY_ADMIN_CONFIGS'); ?>
			</a><br>
		<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_DESCRIPTION3'); ?> 
	</div>
		<?php 
			if ($this->configAvaible) {
		?>
			<a type="button" class="btn btn-default" href="https://oauth.vk.com/authorize?client_id=<?=$this->client_id?>&redirect_uri=<?=$this->redirectURL?>&scope=12&display=page">
				<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_UPLOAD_ALBUMS'); ?> 
			</a>
		<?php 
		} else {
		?>
			<div class="alert alert-danger">
				<?php echo JText::_('COM_VKGALLERY_ADMIN_IMPORT_LOGIN_REQUEST'); ?> 
					<a href="<?=JRoute::_('index.php?option=com_config&view=component&component=com_vkgallery');?>" type="button" class="btn btn-default">
						<span class="icon-options"></span>
						<?php echo JText::_('COM_VKGALLERY_ADMIN_CONFIGS'); ?>
					</a> 
			</div>
		<?php
		}
		?>
</form>
</div>
