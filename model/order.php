<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order
 *
 * @author andre
 */
class order {

    public $id;
    public $date;
    public $cvrnumber;
    public $totalprice;
    public $orderend;

    public function __construct($id, $date, $cvrnumber, $totalprice, $orderend) {
        $this->id = $id;
        $this->date = $date;
        $this->cvrnumber = $cvrnumber;
        $this->totalprice = $totalprice;
        $this->orderend = $orderend;
    }

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCvrnumber() {
        return $this->cvrnumber;
    }

    public function getTotalprice() {
        return $this->totalprice;
    }

    public function getOrderend() {
        return $this->orderend;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setCvrnumber($cvrnumber) {
        $this->cvrnumber = $cvrnumber;
    }

    public function setTotalprice($totalprice) {
        $this->totalprice = $totalprice;
    }

    public function setOrderend($orderend) {
        $this->orderend = $orderend;
    }


}
