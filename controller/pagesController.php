<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagesController
 *
 * @author andre
 */
class pagesController {
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('view/pages/home.php');
    }

    public function error() {
      require_once('view/pages/error.php');
    }
  
}
