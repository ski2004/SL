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

      $this->verify();
      $this->tpl->assign("type" , $this->type);
      $this->tpl->assign("typeName" , $this->typeName);

     
      $this->tpl->display("train4-2.tpl");
    }

    public function add(){
      $this->tpl->assign("usr" , null); 
    }

    public function edit(){
      // $usr = $this->db->get("sales" , [ 'id'=> $_GET["uid"] ] ) ;
      $data = $this->file->get();
    
      // print_r($all);
      $this->tpl->assign("usr" ,  $data[$_GET["uid"]] ); 
    }

    
    public function verify(){
      switch(true){
        case (isset($_GET["uid"])):
          $this->type = "update" ;
          $this->typeName = "修改" ;
          $this->tpl->assign("uid" , $_GET["uid"]);
          $this->edit();
          
        break;
        default:
          $this->type = "insert" ;
          $this->typeName = "新增" ;
          $this->tpl->assign("uid" , 0 );
          $this->add();
      }

    }


  }
  
  
  

  

