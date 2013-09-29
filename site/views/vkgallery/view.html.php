<?php
// Запрет прямого доступа.
defined('_JEXEC') or die('Restricted access');
 
// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');
 
/**
 * HTML представление сообщения компонента HelloWorld.
 */
class VkGalleryViewVkGallery extends JViewLegacy
{
    /**
     * Сообщение.
     *
     * @var  string
     */
    protected $item;  
 
   /**
     * Переопределяем метод display класса JViewLegacy.
     *
     * @param   string  $tpl  Имя файла шаблона.
     *
     * @return  void
     */
    public function display($tpl = null)
    {
        // Получаем сообщение.
        $this->item = $this->get('Item');  
 
        // Отображаем представление.
        parent::display($tpl);
    }
}
?>