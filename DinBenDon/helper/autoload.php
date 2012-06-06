<?php
  function my_autoload($className) {
    include(dirname (__DIR__).'/models/'.$className.'.php');
  }
  spl_autoload_register('my_autoload');
?>