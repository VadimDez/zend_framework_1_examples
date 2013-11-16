<?php

class Application_Model_MessageMapper
{
    protected $_dbTable;


    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Message');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Message $msg)
    {
        $data = array(
            'idSender' => $msg->getIdSender(),
            'msg'      => $msg->getMsg()
        );

        if (null === ($id = $msg->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Message $msg)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $msg->setId($row->id)
            ->setIdSender($row->idSender)
            ->setMsg($row->msg);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Message();
            $entry->setId($row->id)
                ->setIdSender($row->idSender)
                ->setMsg($row->msg);
            $entries[] = $entry;
        }
        return $entries;
    }
}

