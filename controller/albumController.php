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
        $params = array();
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

    public function find($id) {
//        $options = array();
//        $classMap = array('GetAlbumByIdResponse' => 'GetAlbumById');
//        $options ['trace'] = TRUE;
//        $options['cache_wsdl'] = WSDL_CACHE_NONE;
//        $options ['classmap'] = $classMap;
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");

//      we make sure $id is an integer
        $id = intval($id);
        $params = array("parameter"=>$id);
        $album = $client->__soapCall('GetAlbumById', array($params));
//      $results = json_decode($albums, true);
//      var_dump($results);
//        var_dump($albums);
//        
        
        return $album;
    }
    
    public function findLyricToAlbum(Album $album){
        $client = new SoapClient("http://localhost:8080/GetInfo/GetInfo?wsdl");
        //here we add all the lyric
        
        $params = array("albumId"=> $album->id );
        $lryiclist = $client->__soapCall('getLyricToAlbum', array($params));
        foreach ($lryiclist as $liste) {
            foreach ($liste as $objekt) {
                $album->setLyric($objekt);
            }
        }
        return $album;
    }

    public function show() {
// we expect a url of form ?controller=albums&action=show&id=x
// without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }

        $return = $this->find($_GET['id']);
        $albums = array();
        foreach ($return as $objekt) {
           $album = new Album($objekt->id, $objekt->title);
        }
        $album = $this->findLyricToAlbum($album);
        require_once('view/albums/show.php');
    }

}
