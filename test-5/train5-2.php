<?php
    
  require_once('./main.php') ;
  
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

     
      $this->tpl->display("train5-2.tpl");
    }

    public function add(){
      $this->tpl->assign("usr" , null); 
    }

    public function edit(){
      $usr = $this->db->get("sales" , 'id='.$_GET["uid"] ) ;
      $this->tpl->assign("usr" , array_shift($usr)); 
    }

    public function verify(){
      switch(true){
        case (isset($_GET["uid"])):
          $this->type = "修改" ;
          $this->edit();
          
        break;
        default:
          $this->type = "新增" ;
          $this->add();
      }

    }


  }
  
  
  

  

