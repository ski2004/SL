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
      $usr = $this->db->get("store",[] , ["account","name","password"]);
      foreach($usr as $v){
        print_r($v);
        echo "<br>" ;
      }
      $this->tpl->display("login_store.tpl");
    }
  }