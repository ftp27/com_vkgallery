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

<ul class="vkg-image-gallery">
	<?php
		$size = count($this->childs);
		$i = 0;
		for ($i=0; $i < $size; $i++) {
			if ($this->childs[$i]->type != "elem") {
		?>
			  <li>
				<a class="vkg-image" href="<?=JRoute::_('index.php?option=com_vkgallery&view=vkgallery&id='.$this->childs[$i]->id)?>">
					<img src="<?=$this->childs[$i]->thumb ?>" style="
						<?php
							$width = $this->childs[$i]->thumb_width ;
							$height = $this->childs[$i]->thumb_height;
							if ($width > $height) {
								echo "max-height: 100%; max-width: none;";
							} else {
								echo "max-width: 100%; max-height: none;";
							}
						?>
						"
					>
				<a class="vkg-image-title" 
					href="<?=JRoute::_('index.php?option=com_vkgallery&view=vkgallery&id='.$this->childs[$i]->id)?>">
						<?=$this->childs[$i]->title?>
				</a>
				</a>
			  </li>
		<?php
			}
		}
	?>
</ul>

<ul class="nav nav-pills nav-stacked">
	<?php
		$size = count($this->childs);
		$i = 0;
		for ($i=0; $i < $size; $i++) {
			if ($this->childs[$i]->type == "elem") {
		?>
			<li>
				<a href="<?=JRoute::_('index.php?option=com_vkgallery&view=vkgallery&id='.$this->childs[$i]->id)?>">
					<?=$this->childs[$i]->title?>
				</a>
			</li>
		<?php
			}
		}
	?>
</ul>
<?php
?>
