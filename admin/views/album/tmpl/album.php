<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
JHtml::_('jquery.framework');
?>
<div class="row-fluid">
<div class="span2">
	<?=$this->sidebar?>
</div>
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=album&layout=album&id='.$this->item->id); ?>" method="post" name="adminForm" id="adminForm">
	<h1><?=$this->item->title?></h1>

	<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=image&view=image&id='.$this->thumb->id)?>">
		<img src="<?=$this->thumb->photo_604?>" class="img-polaroid" style="margin-bottom: 20px;"> 
	</a>
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
				<?=$this->form->getLabel('thumb_id'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('thumb_id'); ?>
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
				<?=$this->form->getLabel('description'); ?>
		</div>
		<div class="controls">
				<?=$this->form->getInput('description'); ?>
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
<div class="panel-group" id="accordion">
<div class="panel">
	<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo JText::_('COM_VKGALLERY_ADMIN_ALBUM_PHOTOS'); ?></a>
		</h4>
	</div>
	<div id="collapseOne" class="panel-collapse collapse">
	<div class="panel-body">
		<ul class="vkg-image-gallery">
		<?php
		$n = count($this->images);
		for ($i=0; $i<$n; $i++) {
		?>
		  <li>
			<a class="vkg-image" href="<?=JRoute::_('index.php?option=com_vkgallery&layout=image&view=image&id='.$this->images[$i]->id); ?>">
			  <img src="<?=$this->images[$i]->photo_604?>" alt="..." style="
					<?php
						$width = $this->images[$i]->width ;
						$height = $this->images[$i]->height;
						if ($width > $height) {
							echo "max-height: 100%; max-width: none;";
						} else {
							echo "max-width: 100%; max-height: none;";
						}
					?>
					"
				>
			</a>
		  </li>
		<?php
		}
		?>
		</ul>
	</div>
</div>
</div>
	<div class="form-actions"> 
			<input class="btn btn-primary" type="button" value="<?php echo JText::_('COM_VKGALLERY_ADMIN_SAVE'); ?>" onclick="Joomla.submitbutton()" /> 
	</div> 
</form>
</div>
