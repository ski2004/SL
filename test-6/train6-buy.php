<?php
  
  require_once('../main.php') ;
  
  $action = new Action();

  class Action {
    public $db;
    public $tpl;
    public $type;
    public $error;
    public function __construct()
    {
      $this->db = new MySql();
      $this->tpl = new Smarty(); 
      $this->tpl->template_dir = "views" ;
      $this->tpl->compile_dir = "tmp" ;
      $this->verify();
      $store = (isset($_GET["store"]))? $_GET["store"] : "0" ;

      $info = $this->db->get("store" );

      $this->tpl->assign("store" , $store); 
      $this->tpl->assign("info" , $info ); 
      $this->tpl->display("train6-buy.tpl");
    }

    public function verify(){

    }


  }
