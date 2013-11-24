<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
?>
<ol class="breadcrumb">
	<li>
		<a href="<?=JRoute::_('index.php?option=com_vkgallery&view=vkgallery&id=0')?>">
			Корень
		</a>
	</li>
	<?php
		$size = count($this->pathway);
		$i = 0;
		for ($i=$size; $i > 0; $i--) {
		?>
			<li>
				<a href="<?=JRoute::_('index.php?option=com_vkgallery&view=vkgallery&id='.$this->pathway[$i]->id)?>">
					<?=$this->pathway[$i]->title?>
				</a>
			</li>
		<?php
		}
	?>
	<li class="active"><?=$this->pathway[0]->title?></li>
</ol>

<?php
?>
