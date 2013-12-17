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
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=image&layout=image&id='.$this->item->id); ?>" method="post" name="adminForm" id="adminForm">
	<img src="<?=$this->item->photo_604?>" class="img-polaroid" style="margin-bottom: 20px;"> 
	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('id'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('id'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('album_id'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('album_id'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('parent'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('parent'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('width'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('width'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('height'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('height'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('text'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('text'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="control-label">
				<?=$this->form->getLabel('visible'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('visible'); ?>
		</div>
	</div>
	
	<div class="form-actions"> 
			<input class="btn btn-primary" type="button" value="<?php echo JText::_('COM_VKGALLERY_ADMIN_SAVE'); ?>" onclick="Joomla.submitbutton()" /> 
	</div> 
</form>
</div>
