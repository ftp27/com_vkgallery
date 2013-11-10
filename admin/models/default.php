<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//jimport( 'joomla.html.pagination' );
jimport('joomla.application.component.modeladmin');
 
class VkgalleyModelsDefault extends JModelAdmin
{
    protected $__state_set = null;
    protected $_total = null;
    protected $_pagination = null;
    protected $_db = null;
    protected $id = null;
    protected $limitstart = 0;
    protected $limit = 50;
 
    function __construct()
    {
        parent::__construct();
    }
    
 	public function getForm($data = array(), $loadData = true) 
	{
		parent::getForm($data, $loadData);
	}
	
	public function save() {
		echo "Hello!";
	}
 
	public function store($data=null)
    {
        $data = $data ? $data : JRequest::get('post');
        //require_once(JPATH_COMPONENT. '/tables/' . $data['table'].'.php');
        $row = &JTable::getInstance($data['table'], 'Table');
          
        // Bind the form fields to the table
        if (!$row->bind($data))
        {
            return false;
        }
     
        // Make sure the record is valid
        if (!$row->check())
        {
            return false;
        }
        // Store the web link table to the database
        if (!$row->store())
        {
            return false;
        }
     
        return $row;
     }

public function set($property, $value = null)
{
    $previous = isset($this->$property) ? $this->$property : null;
    $this->$property = $value;

    return $previous;
}

public function get($property, $default = null)
{
    return isset($this->$property) ? $this->$property : $default;
}

public function getItem()
{
    $db = JFactory::getDBO();
     
    $query = $this->_buildQuery();
    $this->_buildWhere($query);
    $db->setQuery($query);
     
    $item = $db->loadObject();
     
    return $item;
}
 
public function listItems()
{
    $query = $this->_buildQuery();
    $query = $this->_buildWhere($query);
    $list = $this->_getList($query, $this->limitstart, $this->limit);
     
    return $list;
}

protected function _getList($query, $limitstart = 0, $limit = 0)
{
    $db = JFactory::getDBO();
    $db->setQuery($query, $limitstart, $limit);
    $result = $db->loadObjectList();
     
    return $result;
}
 
protected function _getListCount($query)
{
    $db = JFactory::getDBO();
    $db->setQuery($query);
    $db->query();
     
    return $db->getNumRows();
}
 
function getTotal()
{
    if ( empty ( $this->_total ) )
    {
        $query = $this->_buildQuery();
        $this->_total = $this->_getListCount($query);
    }

    return $this->_total;
}

function getTotalWhere()
{
    if ( empty ( $this->_total ) )
    {
        $query = $this->_buildQuery();
	$query = $this->_buildWhere($query);
        $this->_total = $this->_getListCount($query);
    }

    return $this->_total;
}

function getPagination()
{
// Lets load the content if it doesn't already exist
	if (empty($this->_pagination))
	{
		$this->_pagination = new JPagination( 
			$this->getTotal(), 
			$this->limitstart, 
			$this->limit
			//null
			//JRoute::_('index.php?view='._view.'&layout='.$this->_layout)
		);
	}
	return $this->_pagination;
}

public function clearTable() 
{
    $db = JFactory::getDBO();
    $query = "TRUNCATE TABLE `".$this->_tableName."`";
    $db->setQuery($query);
    $db->query();
}

}
?>
