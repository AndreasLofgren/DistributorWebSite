<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  function call($controller, $action) {
    require_once('controller/' . $controller . 'Controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'album':
        // we need the model to query the database later in the controller
        require_once('model/album.php');
        $controller = new AlbumController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'album' => ['index', 'show']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>