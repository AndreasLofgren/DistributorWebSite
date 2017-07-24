<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orderController
 *
 * @author andre
 */
class orderController {

    public function show() {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        $params = array();
        $order = $client->__soapCall('', $params);
        require_once('view/order/show.php');
    }
    
    public function create() {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        $params = array();
         $order = $client->__soapCall('createNewOrder', $params);
         return $order;
    }

    public function add() {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        $params = array();
        $this->create();
        
    }
}
