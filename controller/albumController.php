<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of albumController
 *
 * @author andre
 */
class albumController {

    public function all() {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        $params = [];
        $albums = $client->__soapCall('GetAllAlbum', $params);
        return $albums;
    }

    public function index() {
        $return = $this->all();
        $albums = array();
        foreach ($return as $liste) {
            foreach ($liste as $objekt) {
                array_push($albums, new Album($objekt->id, $objekt->title));
            }
        }
        require_once('view/albums/index.php');
    }

    public function find() {
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
// we make sure $id is an integer
        $id = intval($id);

        $album = $client->__soapCall('GetAlbumById', $id);

        return new Album($album['id'], $album['title']);
    }

    public function show() {
// we expect a url of form ?controller=albums&action=show&id=x
// without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        find();
        require_once('view/albums/show.php');
    }

}
