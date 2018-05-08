<?php
  
  require_once('../smarty/Smarty.class.php') ;
  define('APP_PATH', str_replace('\\', '/', dirname(__FILE__)) );

  // str_replace('\', '/', dirname(__FILE__) ) 
  
  // $action = new Action();
  $tpl = new Smarty(); 
  // $tpl->template_dir = "views" ;
  // $tpl->compile_dir = "tmp" ;
  
  $tpl->template_dir = APP_PATH ."/views/" ;
  $tpl->compile_dir = APP_PATH."/tmp/" ;
  $tpl->config_dir  = APP_PATH."/config/" ;
  $tpl->cache_dir = APP_PATH."/cache/" ;
$tpl->testInstall();
  // $tpl->display("train4-1.1.tpl");
