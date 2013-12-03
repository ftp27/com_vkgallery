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
<form class="span10" action="<?php echo JRoute::_('index.php?option=com_vkgallery&view=import'); ?>" method="post" name="adminForm" id="adminForm">
<legend>Импорт альбомов из vk.com</legend>
	<div class="alert alert-info">
		Для использования компонента вам необходимо создать свое приложение через которое вы будете получать доступ к API vk.com. Такое приложение можно создать по <a href="http://vk.com/editapp?act=create">ссылке</a>.<br>
		В ходе настройки вы получите <b>ID приложения</b> и <b>Защищенный ключ</b>, который необходимо указать в <a href="<?=JRoute::_('index.php?option=com_config&view=component&component=com_vkgallery');?>" type="button" class="btn btn-default"><span class="icon-options"></span> Настройках</a> компонента.<br>
		Так же для стабильной работы компонента, необходимо заполнить поля <b>Адрес сайта</b> и <b>Базовый домен</b></div>
		<?php 
			if ($this->configAvaible) {
		?>
			<a type="button" class="btn btn-default" href="https://oauth.vk.com/authorize?client_id=<?=$this->client_id?>&redirect_uri=<?=$this->redirectURL?>&scope=12&display=page">Загрузить альбомы</a>
		<?php 
		} else {
		?>
			<div class="alert alert-danger">
				Сперва произведите <a href="<?=JRoute::_('index.php?option=com_config&view=component&component=com_vkgallery');?>" type="button" class="btn btn-default"><span class="icon-options"></span> Настройку</a> компонента
			</div>
		<?php
		}
		?>
</form>
</div>
