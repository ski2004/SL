<?php
  
  require_once('../main.php') ;
  require_once('./train4-4.php');
  
  
  $action = new Action();

  class Action {
    public $file;
    public $tpl;
    public $type;
    public $error;
    public function __construct()
    {
      $this->file = new FILES();
      $this->tpl = new Smarty(); 
      $this->tpl->template_dir = "views" ;
      $this->tpl->compile_dir = "tmp" ;
      
      $usr = $this->file->get();
      $this->tpl->assign("usr" , $usr); 
      $this->tpl->display("train4-1.tpl");
    }



  }
