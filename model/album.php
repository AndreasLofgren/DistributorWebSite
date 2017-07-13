<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Album
 *
 * @author Andreas
 */
class Album {

    private $al_id;
    private $al_title;
    private $al_picturepath;
    private $al_stock;
    private $al_suppprice;
    private $al_saleprice;
    private $al_songamount;
    
    function __construct($al_id, $al_title) {
        $this->al_id = $al_id;
        $this->al_title = $al_title;
    }

    
    function getAl_id() {
        return $this->al_id;
    }

    function getAl_title() {
        return $this->al_title;
    }

    function setAl_id($al_id) {
        $this->al_id = $al_id;
    }

    function setAl_title($al_title) {
        $this->al_title = $al_title;
    }
    function getAl_picturepath() {
        return $this->al_picturepath;
    }

    function getAl_stock() {
        return $this->al_stock;
    }

    function getAl_suppprice() {
        return $this->al_suppprice;
    }

    function getAl_saleprice() {
        return $this->al_saleprice;
    }

    function getAl_songamount() {
        return $this->al_songamount;
    }

    function setAl_picturepath($al_picturepath) {
        $this->al_picturepath = $al_picturepath;
    }

    function setAl_stock($al_stock) {
        $this->al_stock = $al_stock;
    }

    function setAl_suppprice($al_suppprice) {
        $this->al_suppprice = $al_suppprice;
    }

    function setAl_saleprice($al_saleprice) {
        $this->al_saleprice = $al_saleprice;
    }

    function setAl_songamount($al_songamount) {
        $this->al_songamount = $al_songamount;
    }


}
