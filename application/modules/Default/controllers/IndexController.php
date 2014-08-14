<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
      
    }

    public function indexAction()
    {
        $this->view->title = "Портал";
        $this->view->headTitle($this->view->title);
      
        //$albums = new Model_DbTable_Albums();
        //$this->view->albums = $albums->fetchAll();
        
        //$this->view->title = "My albums";
        //$this->view->headTitle($this->view->title, 'PREPEND');
    }

    /*public function editAction() 
    {
        // action body
    }
    
    public function addAction()
    {
        // action body
    }
    
    public function deleteAction()
    {
        // action body
    }*/
    
    
}