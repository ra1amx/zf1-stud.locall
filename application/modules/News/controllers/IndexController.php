<?php

class News_IndexController extends Zend_Controller_Action {

    public function init() {
        //$this->view->baseUrl = $this->_request->getBaseUrl();
        //Zend_Loader::loadClass('News');
        //$ajaxContext = $this->_helper->getHelper('AjaxContext');
        //$ajaxContext->addActionContext('index', 'json')
                   // ->initContext();
        
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'json')
                ->addActionContext('delete', 'json')
                    ->initContext();
    }

    public function indexAction() {

        $this->view->title = "Новости";
        $this->view->headTitle($this->view->title);
        //chek is AJAX request or not       
        //$head = new Model_DbTable_News();
        $news = new News_Model_DbTable_News();
        $this->view->news = $news->fetchAll('val != 0', 'time_cd DESC')->toArray();
        $this->view->message='index';
    }

    /*public function getAnythingAjaxAction() {
        //а это уже ajax-действие
        //$result - массив некоторых данных, которые нам необходимо вернуть в браузер
        $output = Zend_Json::encode($result);
        $response = $this->getResponse();
        $response()->setBody($output)
                ->setHeader('content-type', 'application/json', true);*/
    

    public function detailAction() {
        $this->view->title = "Новость детально";
        $this->view->headTitle($this->view->title);
        //$head = new Model_DbTable_News();
        $id = $this->_getParam('id', 0);
        if ($id > 0) {
            $news = new News_Model_DbTable_News();
            $this->view->news = $news->getNews($id);
        }
    }

    function addAction() {
        $this->view->title = "Добавить новость";
        $this->view->headTitle($this->view->title);
        $form = new News_Form_News();
        $form->submit->setLabel('Добавить');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $val = $form->getValue('val');
                $head = $form->getValue('head');
                $anons = $form->getValue('anons');
                $txt = $form->getValue('txt');

                $news = new News_Model_DbTable_News();
                $news->addNews($head, $anons, $txt, $val);
                $this->_helper->redirector->gotoRoute(array(), 'index-page');
//$this->_helper->redirector->gotoUrl ('http://zf1-stud.local');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function deleteAction() {

        //$this->view->title = "Удалить новость";
        // $this->view->headTitle($this->view->title);
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            /*  echo $del;
              var_dump($this->getRequest()->getPost());
              var_dump($del == 'Да');
              exit; */
            if ($del == 'Да') {
                $id = $this->getRequest()->getPost('id');
                $news = new News_Model_DbTable_News();
                $news->deleteNews($id);
            }
            $this->_helper->redirector->gotoRoute(array(), 'index-page');
// $this->_helper->redirector->gotoUrl ('http://zf1-stud.local');
        } else {
            $id = $this->getRequest()->getQuery("id");
            $news = new News_Model_DbTable_News();
            $news->deleteNews($id);
            $this->view->success = "новость успешно удалена";
        }
    }

    /* public function editAction()
      {
      //выводим форму редактирования новости
      $form = new News_Form_Updatenews();
      $this->view->form = $form;

      //получаем id
      $id = $this->_getParam('id');
      //если было передано коректное id
      if($id > 0){
      //делаем выборку из базы данных и заполняем форму
      $objNews = new News_Model_DbTable_News();
      $form->populate($news = $objNews->getNews($id)->toArray());
      //проверяем данные из формы
      if($this->getRequest()->isPost()){
      $postdata = $this->getRequest()->getPost();

      if($form->isValid($postdata)){
      $data = array(
      'head' => $form->getValue('head'),
      'anons' => $form->getValue('anons'),
      'txt' => $form->getValue('txt'));
      }
      //добавляем запись в базу
      $obj = new News_Model_DbTable_News();
      $update = $obj->updateNews($data, $id);

      $this->_helper->redirector('index');
      }
      } */

    function editAction() {
        $this->view->title = "Редактирование новости";
        $this->view->headTitle($this->view->title);

        $form = new News_Form_News();
        $form->submit->setLabel('UPDATE');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int) $form->getValue('id');
                $head = $form->getValue('head');
                $anons = $form->getValue('anons');
                $txt = $form->getValue('txt');
                $news = new News_Model_DbTable_News();
                $news->updateNews($id, $head, $anons, $txt);
                $this->_helper->redirector->gotoRoute(array(), 'newscrud');
                //  $this->_helper->redirector->gotoUrl ('http://zf1-stud.local');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $news = new News_Model_DbTable_News();
                $form->populate($news->getNews($id)->toArray());
            }
        }
    }

}
