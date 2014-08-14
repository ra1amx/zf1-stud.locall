<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// загружаем файл с основным классом Doctrine
include_once 'Doctrine/Doctrine.php';
spl_autoload_registeer(array('Doctrine', 'autoload'));

// создаем менеджер doctrine
$manager = Doctrine_Manager::getInstance();
$conn = Doctrine_Manager::connection(
        'mysql://root@localhost/test'. 'doctrione');

// получаем и выводим список баз данных
$databases = $conn->import->listDatabases();
print_r($databases);
