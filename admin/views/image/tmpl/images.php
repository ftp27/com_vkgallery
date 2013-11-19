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
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=image'); ?>" method="post" name="adminForm" id="adminForm">
<legend>Фотографии</legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th>id</td>
			<th>Изображение</th>
			<th>Родитель</th>
			<th>Видимость</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$n = count($this->items);
		for ($i=0; $i<$n; $i++) {
			?>
			<tr>
				<td><?=$this->items[$i]->id?></td>
				<td>
					<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=image&view=image&id='.$this->items[$i]->id); ?>">
						<img src="<?=$this->items[$i]->photo_75?>">
					</a>
				</td>
				<td>
					<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=album&view=album&id='.$this->items[$i]->parent); ?>">
						<?=$this->items[$i]->album_id?>
					</a>
				</td>	
				<td>
					<?php
						if ($this->items[$i]->visible == "1") {
							echo '<span class="glyphicon glyphicon-eye-open"></span>';
						} else {
							echo '<span class="glyphicon glyphicon-eye-close"></span>';
						}
					?>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4">
				<?=$this->pagination->getListFooter ()?>
			</td>
		</tr>
	</tfoot>
</table>
</form>
</div>
