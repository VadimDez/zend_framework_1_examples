<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';
    protected $_primary = 'id';

    public function getUsersList()
    {
        $select  = $this->_db->select()
            ->from($this->_name,
                array('key' => 'id','value' => 'name'));
        $result = $this->getAdapter()->fetchAll($select);
        return $result;
    }


}

