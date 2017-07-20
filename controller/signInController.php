<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signInController
 *
 * @author andre
 */
class signInController {
    
    public function user() {
        $client = new SoapClient("http://localhost:8080/Logon/Logon?wsdl");
        $name = "";
        $password = "";        
        $user = $client->__soapCall("checkLogon", $arguments);
        foreach ($user as $object) {
            array_push($array, new customer($object->cvrnumber, $object->name, $object->storechain, $object->street, $object->tlf, $object->mail, $object->password));
        }
        require_once('view/login/signIn.php');
    }
}
