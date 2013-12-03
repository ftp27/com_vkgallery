<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#vkg-menu-type>select').change(function(){
			if (jQuery('#vkg-menu-type>select').attr('value') == "elem") {
				jQuery('#vkg-menu-album').hide();
			} else {
				jQuery('#vkg-menu-album').show();
			}
	});
});
</script>

<div class="row-fluid">
<div class="span2">
	<?=$this->sidebar?>
</div>
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=menu&layout=item&id='.$this->item->id); ?>" method="post" name="adminForm" id="adminForm">
<input type="hidden" name="task" value="" />
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
				<?=$this->form->getLabel('title'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('title'); ?>
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
				<?=$this->form->getLabel('type'); ?>
		</div>
		<div class="controls" id="vkg-menu-type">
				<?=$this->form->getInput('type'); ?>
		</div>
	</div>
	
	<div class="control-group" id="vkg-menu-album" 
	<?php
		if ($this->item->type == "elem") {
			echo 'style="display: none;"';
		}
	?>
	>
		<div class="control-label">
				<?=$this->form->getLabel('album'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('album'); ?>
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
			<input class="btn btn-primary" type="button" value="Сохранить" onclick="Joomla.submitbutton('save')" /> 
			<input class="btn btn-danger" style="float:right" type="button" value="Удалить" onclick="Joomla.submitbutton('delete')" /> 
	</div> 
</form>
</div>
