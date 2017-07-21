<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lyricController
 *
 * @author andre
 */
class lyricController {

    public function lyric() {
//        $service_url = '(http://localhost:8080/DistributorREST/webresources/entities.lyric/findById/{id})';
//        $curl = curl_init($service_url);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        $curl_response = curl_exec($curl);
//        if ($curl_response === false) {
//            $info = curl_getinfo($curl);
//            curl_close($curl);
//            die('error occured during curl exec. Additioanl info: ' . var_export($info));
//        }
//        curl_close($curl);
//        $decoded = json_decode($curl_response);
//        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
//            die('error occured: ' . $decoded->response->errormessage);
//        }
//        echo 'response ok!';
//        var_export($decoded->response);

        /////////////////////////////////////

        $url = "(http://localhost:8080/DistributorREST/webresources/entities.lyric/findById/".$_GET['id'].")";
        $response = file_get_contents($url);
        echo $response;
        require_once('view/lyric/lyric.php');
    }

}
