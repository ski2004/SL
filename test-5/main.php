<?php
    
  require_once('../smarty/Smarty.class.php') ;
  require_once('../mysql.php');
  define('APP_PATH', str_replace('\\', '/', dirname(__FILE__)));
  $tpl = new Smarty();
  $tpl->template_dir =  APP_PATH . "views" ;
  $tpl->compile_dir =  APP_PATH . "tmp" ;


  $aa = "12355" ;

