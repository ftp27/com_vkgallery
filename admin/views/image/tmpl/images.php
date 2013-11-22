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
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=image'); ?>" method="post" name="adminForm" id="adminForm">
<legend>Фотографии</legend>
<ul class="vkg-image-gallery">
<?php
$n = count($this->items);
for ($i=0; $i<$n; $i++) {
?>
  <li>
	<a class="vkg-image" href="<?=JRoute::_('index.php?option=com_vkgallery&layout=image&view=image&id='.$this->items[$i]->id); ?>">
		<img src="<?=$this->items[$i]->photo_604 ?>" alt="..." style="
			<?php
				$width = $this->items[$i]->width ;
				$height = $this->items[$i]->height;
				if ($width > $height) {
					echo "max-height: 100%; max-width: none;";
				} else {
					echo "max-width: 100%; max-height: none;";
				}
			?>
			"
		>
	<a class="vkg-image-title" 
		href="<?=JRoute::_('index.php?option=com_vkgallery&layout=album&view=album&id='.$this->items[$i]->album_id); ?>">
			<?=$this->items[$i]->album_title?> (<?=$this->items[$i]->album_size?>)
	</a>
    </a>
  </li>
<?php
}
?>
</ul>
<?=$this->pagination->getListFooter ()?>
</table>
</form>
</div>
