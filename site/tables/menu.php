<?php defined( '_JEXEC' ) or die( 'Restricted access' );
class TableMenu extends JTable
{
	/** @var int Primary key */
	var $id = null;

	/** @var string Title */
	var $title = null;
	
	/** @var string Type */
	var $type = null;
	
	/** @var integer Album */
	var $album = null;
	
	/** @var integer Parent */
	var $parent = null;
	
	/** @var integer Position */
	var $position = null;
	
	/** @var boolean Visible */
	var $visible = null;
	
	/**
	* Constructor
	*
	* @param object Database connector object
	*/
	function __construct( &$db ) 
	{
		parent::__construct('#__vkg_menu', 'id', $db);
	}

	/**
	* Проверка
	*
	* @return boolean True if buffer is valid
	*/
	function check()
	{
		if(!$this->id)
		{
			$this->setError(JText::_('Ошибка'));
			return false;
		}
		return true;
	}
}
