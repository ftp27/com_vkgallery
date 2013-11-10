<?php defined( '_JEXEC' ) or die( 'Restricted access' );
class TableMenu extends JTable
{
	/** @var int Primary key */
	var $id = null;

	/** @var int thumb_id */
	var $album_id = null;
	
	/** @var string photo_75 */
	var $photo_75 = null;
	
	/** @var string photo_130 */
	var $photo_130 = null;
	
	/** @var string photo_604 */
	var $photo_604 = null;
	
	/** @var string photo_807 */
	var $photo_807 = null;
	
	/** @var string photo_1280 */
	var $photo_1280 = null;
	
	/** @var string photo_2560 */
	var $photo_2560 = null;
	
	/** @var integer width */
	var $width = null;
	
	/** @var integer height */
	var $height = null;

	/** @var string text */
	var $text = null;

	/** @var integer date */
	var $date = null;
	
	/** @var integer likes */
	var $likes = null;
	
	/** @var integer comments */
	var $comments = null;
	
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
		parent::__construct('#__vkg_image', 'id', $db);
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
