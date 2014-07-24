<?php

/*  aprs.fi ключ API 29355.FnpRXLyIrKohtz
 * Отправляем запрос для user=ra1amx-10
 * получаем ответ значения speed
 *
 */

class CarController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function speedAction() {
        // тут пишем что надо делать

        //require_once 'Zend/Http/Client.php';
        $client = new Zend_Http_Client();
        
        $client->setUri("http://api.aprs.fi/api/get?name=RA1AMX-10&what=loc&apikey=29355.FnpRXLyIrKohtz");
        $client->setMethod('GET');
        //$response = $client->send($client->getRequest());
        $response = $client->request()->getBody();
        //echo '<pre>';
        //print_r(json_decode($response));
        $this->view->json_data = json_decode($response);
    }

    public function indexAction() {
        //   
    }

}
