<?php
error_reporting(E_ERROR);
  function myAutoload($name){
    if (file_exists("../server/".$name.".php")) {
      require_once "../server/".$name.".php";
    }elseif (file_exists("/server/".$name.".php")) {
      require_once "/server/".$name.".php";
    }
  }
  spl_autoload_register('myAutoload');