<?php

class Application_Form_Message extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

//        // Add an email element
//        $this->addElement('text', 'idSender', array(
//            'label'      => 'Your id',
//            'required'   => true,
//            'validators' => array(
//                'validator' => 'Int',
//            )
//        ));

        // add select
        $countries = new Application_Model_DbTable_User();
        $countries_list = $countries->getUsersList();

        $country = new Zend_Form_Element_Select('idSender');
        $country ->setLabel('Id sender:')
            ->addMultiOptions( $countries_list);

        $this->addElement($country);

        // Add the comment element
        $this->addElement('textarea', 'msg', array(
            'label'      => 'Your msg:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 500))
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Send message',
        ));




    }


}

