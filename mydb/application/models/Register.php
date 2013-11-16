<?php

class Application_Model_Register
{
    protected $_dbTableUser;
    function __construct()
    {
        $this->_dbTableUser = new Application_Model_DbTable_User();
    }

    function createUser($array)
    {
        $this->_dbTableUser->insert($array);
    }

    function updateUser($array,$id)
    {
        $this->_dbTableUser->update($array,"id = $id");
    }


}

