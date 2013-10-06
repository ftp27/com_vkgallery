<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем тип поля list.
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Класс поля формы Galleries компонента VkGallery.
 */
class JFormFieldGalleries extends JFormFieldList
{
	/**
	 * Тип поля.
	 *
	 * @var  string
	 */
	protected $type = 'VkGallery';

	/**
	 * Метод для получения списка опций для поля списка.
	 *
	 * @return  array  Массив JHtml опций.
	 */
	protected function getOptions()
	{
		// Получаем объект базы данных.
		$db = JFactory::getDbo();

		// Конструируем SQL запрос.
		$query = $db->getQuery(true);
		$query->select('id, title')
			->from('#__vkg_galleries');
		$db->setQuery($query);
		$messages = $db->loadObjectList();

		// Массив JHtml опций.
		$options = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id, $message->title);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}