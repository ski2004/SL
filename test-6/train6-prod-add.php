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
      $this->tpl->assign("type" , $this->type);
      $this->tpl->assign("typeName" , $this->typeName);
      $store = (isset($_GET["store"]))? $_GET["store"] : "0" ;
      $info = $this->db->get("store" , ["id"=>$store] );
      $this->tpl->assign("store" , $store); 
      $this->tpl->assign("info" , array_shift($info) ); 
      $this->tpl->display("train6-prod-add.tpl");
    }

    public function add(){
      $this->tpl->assign("usr" , null); 
    }

    public function edit(){
      $usr = $this->db->get("items" , [ 'id'=> $_GET["uid"] ] ) ;
      $this->tpl->assign("usr" , array_shift($usr)); 
    }

    public function verify(){
      switch(true){
        case (isset($_GET["uid"])):
          $this->type = "update" ;
          $this->typeName = "修改" ;
          $this->edit();
          
        break;
        default:
          $this->type = "insert" ;
          $this->typeName = "新增" ;
          $this->add();
      }

    }


  }