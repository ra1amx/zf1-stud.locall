<?php
//задаем кодировку страницы
header ('Content-type: text/html; charset-utf-8');
// подключаем файл настроек
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Dобласть применения среды
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// создаем строку путей
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),

    //include "Zend/Loader.php";
      //  Zend_Loader::registerAutoload();
    
    )));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run создание приложения, подключение 
//бутсрапа и запуск
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
try{
$application->bootstrap()
            ->run();
}
catch(\Exception $e) {
    echo $e->getMessage();
    var_dump($e->getTrace());
    exit;
}