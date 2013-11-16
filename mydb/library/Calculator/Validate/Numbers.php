<?php

class Calculator_Validate_Numbers extends Zend_Validate_Abstract
{

    const MSG_NUMERIC = 'msgNumeric';

    protected $_messageTemplates = array(
        self::MSG_NUMERIC => "'%value%' is not numeric",
    );

    public function isValid($value)
    {
        $this->_setValue($value);

        if (!is_numeric($value)) {
            $this->_error(self::MSG_NUMERIC);
            return false;
        }

        return true;
    }
}

?>