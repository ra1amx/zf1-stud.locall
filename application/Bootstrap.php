<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initRoute() {
     
      $router = Zend_Controller_Front::getInstance()->getRouter();

      $router->removeDefaultRoutes();
      
      $route_static3 = new Zend_Controller_Router_Route(
              '/', array(
          'controller' => 'index',
          'module' => 'default',
          'action' => 'index',
              )
      );
      $router->addRoute('index', $route_static3);
      
      
      
      
      $route_static4 = new Zend_Controller_Router_Route(
              '/car/speed', array(
          'controller' => 'car',
          'module' => 'default',
          'action' => 'speed',
              )
      );
      $router->addRoute('car', $route_static4);
      
    }
    
     protected function _initFrontController ( )
    {
        $front = Zend_Controller_Front::getInstance();
        $front->setControllerDirectory( array (
        'default' => APPLICATION_PATH . '/modules/Default/controllers',
        'news' => APPLICATION_PATH . '/modules/News/controllers'
        ));
        
        return $front;

    }
//protected function _initFrontController ( )
  //  {
    //    $front = Zend_Controller_Front::getInstance();
      //  $front->setControllerDirectory( array (
        //'default' => APPLICATION_PATH . '/modules/Default/controllers',
        //'news' => APPLICATION_PATH . '/modules/News/controllers'
        //));
        
        //return $front;
    }
       
   // protected function _initNews() {
	//require_once APPLICATION_PATH."/modules/News/models/DbTable/news.php";
//}


    
//}