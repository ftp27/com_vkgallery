<?php defined( '_JEXEC' ) or die( 'Restricted access' );
class TableMenu extends JTable
{
	/** @var int Primary key */
	var $id = null;

	/** @var int thumb_id */
	var $thumb_id = null;
	
	/** @var string title */
	var $title = null;
	
	/** @var string description */
	var $description = null;
	
	/** @var integer created */
	var $created = null;
	
	/** @var integer updated */
	var $updated = null;
	
	/** @var integer size */
	var $size = null;
	
	/** @var string thumb_src */
	var $thumb_src = null;
	
	/** @var integer position */
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
		parent::__construct('#__vkg_album', 'id', $db);
	}

	/**
	* Проверка
	*
	* @return boolean True if buffer is valid
	*/
	function check()
	{
		if(!$this->name)
		{
			$this->setError(JText::_('Ошибка'));
			return false;
		}
		return true;
	}
}
