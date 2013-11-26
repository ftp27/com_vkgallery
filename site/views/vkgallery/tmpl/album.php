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
		$visible = true;
		for ($i=$size; $i > 0; $i--) {
			if ($this->pathway[$i]->visible == "0") {
				$visible = false;
			}
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
 if ($visible) {
?>
<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<ul id="vkg-image-set" class="vkg-image-gallery links">
	<?php
	$size = count($this->images);
	$i = 0;
	for ($i=0; $i < $size; $i++) {
		if ($this->images[$i]->photo_2560 != "") {
			$image = $this->images[$i]->photo_2560;
		} else if ($this->images[$i]->photo_1280 != "") {
			$image = $this->images[$i]->photo_1280;
		} else if ($this->images[$i]->photo_807 != "") {
			$image = $this->images[$i]->photo_807;
		} else if ($this->images[$i]->photo_604 != "") {
			$image = $this->images[$i]->photo_604;
		}
		if ($this->images[$i]->visible == "1") {
	?>
		<li>
		<a href="<?=$image?>" title="<?=$this->images[$i]->text?>" class="vkg-image" data-gallery>
			<img src="<?=$this->images[$i]->photo_130?>" style="
				<?php
					$width = $this->images[$i]->width ;
					$height = $this->images[$i]->height;
					if ($width > $height) {
						echo "max-height: 100%; max-width: none;";
					} else {
						echo "max-width: 100%; max-height: none;";
					}
				?>
			">
		</a>
		</li>
	<?php
		}
	}
	?>
</ul>

<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<script>
document.getElementById('vkg-image-set').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>
<?php
}
?>