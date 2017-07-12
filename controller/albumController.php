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
    
    
    public function index() {
      // we store all the posts in a variable
      $albums = Album::all();
      require_once('view/albums/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=albums&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }

        // we use the given id to get the right post
      $album = Album::find($_GET['id']);
      require_once('view/albums/show.php');
    }
  
}
