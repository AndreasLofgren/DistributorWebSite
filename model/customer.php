<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer
 *
 * @author andre
 */
class customer {
    public $cvrnumber;
    public $name;
    public $storechain;
    public $street;
    public $tlf;
    public $mail;
    public $password;
    
    public function __construct($cvrnumber, $name, $storechain, $street, $tlf, $mail, $password) {
        $this->cvrnumber = $cvrnumber;
        $this->name = $name;
        $this->storechain = $storechain;
        $this->street = $street;
        $this->tlf = $tlf;
        $this->mail = $mail;
        $this->password = $password;
    }
    
    public function getCvrnumber() {
        return $this->cvrnumber;
    }

    public function getName() {
        return $this->name;
    }

    public function getStorechain() {
        return $this->storechain;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getTlf() {
        return $this->tlf;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setCvrnumber($cvrnumber) {
        $this->cvrnumber = $cvrnumber;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setStorechain($storechain) {
        $this->storechain = $storechain;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function setTlf($tlf) {
        $this->tlf = $tlf;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }



    
}
