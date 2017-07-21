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
        $url = 'http://localhost:8080/DistributorREST/webresources/entities.lyric/findById/1?';
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));

        $result = curl_exec($cURL);
        curl_close($cURL);
        $result = json_decode($result, true);
        $lyric = new lyric($result['lyId'], $result['lyTitle'], $result['lyText']);
        

        
//        $service_url = '(http://localhost:8080/DistributorREST/webresources/entities.lyric/findById/1?)';
//        var_dump($service_url);
//        echo "<br>";
//        $curl = curl_init($service_url);
//        var_dump($curl);
//        echo "<br>";
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        $curl_response = curl_exec($curl);
//        if ($curl_response === false) {
//            $info = curl_getinfo($curl);
//            curl_close($curl);
//            die('error occured during curl exec. Additional info: ' . var_export($info));
//        }
//        curl_close($curl);
//        $decoded = json_decode($curl_response);
//        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
//            die('error occured: ' . $decoded->response->errormessage);
//        }
//        echo 'response ok!';
//        var_export($decoded->response);
//        /////////////////////////////////////
////        $url = "(http://localhost:8080/DistributorREST/webresources/entities.lyric/findById/1)";
////        $response = file_get_contents($url);
////        echo $response;
        require_once('view/lyric/lyric.php');
    }

}
