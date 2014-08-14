<?php


class News_Bootstrap extends Zend_Application_Module_Bootstrap
{

      public function _initRoute() {
     
      $router = Zend_Controller_Front::getInstance()->getRouter();

      $router->removeDefaultRoutes();



      $route_static2 = new Zend_Controller_Router_Route(
              '/', array(
          'controller' => 'index',
          'module' => 'default',
          'action' => 'index',
              )
      );
      $router->addRoute('index', $route_static2);

      $dynamic_static2 = new Zend_Controller_Router_Route('news/:action/:id', array('controller' => 'index', 'module' => 'news', 'id' => ''),
 array('action' => '^(add$|edit$|delete$|detail$|id$)')
              );
      $router->addRoute('newscrud', $dynamic_static2);

      $route_static = new Zend_Controller_Router_Route(
              '/news/list', array(
          'controller' => 'index',
          'module' => 'news',
          'action' => 'index',
              )
      );
      $router->addRoute('newslist', $route_static);
      
    $route_id = new Zend_Controller_Router_Route(
              '/news/edit/', array(
          'controller' => 'index',
          'module' => 'news',
          'action' => 'detail',
                  
              )
      );
      $router->addRoute('id', $route_id);   
      
      $route_index = new Zend_Controller_Router_Route(
              'index', array(
          'controller' => 'index',
          'module' => 'news',
          'action' => 'index',
                  
              )
      );
      $router->addRoute('index-page', $route_index);
      
       }
    
 
   // }
}

