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

    public $al_id;
    public $al_title;
    public $al_picturepath;
    public $al_stock;
    public $al_suppprice;
    public $al_saleprice;
    public $al_songamount;

    public function __construct($id, $title) {
        $this->id = $id;
        $this->author = $title;
    }

    public static function all() {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        $params = [];
        $list = $client->__soapCall('GetAllAlbum', $params);
        return $list;
    }

    public static function find($id) {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        // we make sure $id is an integer
        $id = intval($id);

        $album = $client->__soapCall('GetAlbumById', $id);

        return new Album($album['id'], $album['title']);
    }

}
