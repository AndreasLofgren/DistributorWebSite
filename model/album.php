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

    public $id;
    public $title;
    public $picturepath;
    public $stock;
    public $suppprice;
    public $saleprice;
    public $songamount;
    
    function __construct($id, $title) {
        $this->id = $id;
        $this->title = $title;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPicturepath() {
        return $this->picturepath;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getSuppprice() {
        return $this->suppprice;
    }

    public function getSaleprice() {
        return $this->saleprice;
    }

    public function getSongamount() {
        return $this->songamount;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setPicturepath($picturepath) {
        $this->picturepath = $picturepath;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setSuppprice($suppprice) {
        $this->suppprice = $suppprice;
    }

    public function setSaleprice($saleprice) {
        $this->saleprice = $saleprice;
    }

    public function setSongamount($songamount) {
        $this->songamount = $songamount;
    }




}
