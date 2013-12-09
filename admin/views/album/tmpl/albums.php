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
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=album'); ?>" method="post" name="adminForm" id="adminForm">
<legend><?php echo JText::_('COM_VKGALLERY_ADMIN_ALBUMS_TITLE'); ?></legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width: 1px;"><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_ID'); ?></td>
			<th><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_NAME'); ?></th>
			<th style="width: 1px;"><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_VISIBLE'); ?></th>
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
					<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=album&view=album&id='.$this->items[$i]->id); ?>">
						<?=$this->items[$i]->title?>
					</a>
				</td>
				<td>
					<?php
						if ($this->items[$i]->visible == "1") {
							echo '<span class="icon-eye-open"></span>';
						} else {
							echo '<span class="icon-eye-blocked"></span>';
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
