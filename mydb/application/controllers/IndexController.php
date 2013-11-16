<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
//        $register = new Application_Model_Register();
//        $register->createUser(array(
//            'name' => 'Test',
//            'age'  => 25,
//            'gener'=> 'm'
//        ));
        $user = new Application_Model_UserMapper();
        $this->view->entries = $user->fetchAll();

        $message = new Application_Model_MessageMapper();
        $this->view->messages = $message->fetchAll();
        $user = new Application_Model_User();
        $this->view->user = $user;
        $this->view->userMapper = new Application_Model_UserMapper();

    }

    public function registerAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_Register();

        if($request->isPost())
        {
            if($form->isValid($request->getPost()))
            {
                $user = new Application_Model_User($form->getValues());
                $mapper = new Application_Model_UserMapper();
                $mapper->save($user);
                return $this->_helper->redirector('index');
            }
        }

        // add form to the view
        $this->view->form = $form;
    }

    public function sendmessageAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_Message();

        if($request->isPost())
        {
            if($form->isValid($request->getPost()))
            {
                $message = new Application_Model_Message($form->getValues());
                $mapper = new Application_Model_MessageMapper();
                $mapper->save($message);
                return $this->_helper->redirector('index');
            }
        }

        // add form to the view
        $this->view->form = $form;
    }


}





