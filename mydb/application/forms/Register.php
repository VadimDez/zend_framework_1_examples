<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'name', array(
            'label'      => 'Your name:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 50))
            )
        ));

        $this->addElement('text', 'gener', array(
            'label'      => 'Your gener first character:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1, 1))
            )
        ));

        $this->addElement('text', 'age', array(
            'label'      => 'Your age',
            'required'   => true,
            'validators' => array(
                'validator' => 'Int',
            )
        ));
//
//        // Add the comment element
//        $this->addElement('textarea', 'comment', array(
//            'label'      => 'Please Comment:',
//            'required'   => true,
//            'validators' => array(
//                array('validator' => 'StringLength', 'options' => array(0, 20))
//            )
//        ));

        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Register',
        ));

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

