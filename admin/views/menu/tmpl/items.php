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
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=menu'); ?>" method="post" name="adminForm" id="adminForm">
<input type="hidden" name="task" value="" />
<legend><?php echo JText::_('COM_VKGALLERY_ADMIN_MENU_TITLE'); ?></legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_ID'); ?></td>
			<th><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_NAME'); ?></th>
			<th><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_TYPE'); ?></th>
			<th><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_PARENT'); ?></th>
			<th><?php echo JText::_('COM_VKGALLERY_ADMIN_TABLE_VISIBLE'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$n = count($this->items);
		for ($i=0; $i<$n; $i++) {
			?>
			<tr>
				<td>
					<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=item&controller=menu&id='.$this->items[$i]->id); ?>">
						<?=$this->items[$i]->id?>
					</a>
				</td>
				<td>
					<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=item&controller=menu&id='.$this->items[$i]->id); ?>">
						<?=$this->items[$i]->title?>
					</a>
				</td>
				<td><?php
							if ($this->items[$i]->type == "elem") {
								echo JText::_('COM_VKGALLERY_ADMIN_MENU_ITEM');
							} else {
							?>
								<?php echo JText::_('COM_VKGALLERY_ADMIN_ALBUM'); ?> - 
								<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=album&view=album&id='.$this->items[$i]->album); ?>">
									<?=$this->items[$i]->album_title?>
								</a>
							<?php
							}
						?>
				</td>
				<td>
					<?php
					if ($this->items[$i]->parent != 0) {
					?>
						<a href="<?=JRoute::_('index.php?option=com_vkgallery&layout=item&controller=menu&id='.$this->items[$i]->parent); ?>">
							<?=$this->items[$i]->parent_title?>
						</a>
					<?php
					} else {
							echo JText::_('COM_VKGALLERY_ADMIN_MENU_ROOT');
					}
					?>
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
