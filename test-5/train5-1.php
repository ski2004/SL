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
    
      $usr = $this->db->get("customer") ;
      $this->tpl->assign("usr" , $usr); 
      $this->tpl->display("train5-1.tpl");
    }

    public function verify(){

    }


  }
