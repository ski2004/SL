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
      print_r($_POST);
      $this->verify();
      
    }

    public function insert(){
      unset($_POST["id"]);
      $rs = $this->db->insert("sales" , $_POST ) ;
      if($rs==1){
        header('Refresh:0;url=train5-1.php');
      }else{
        header('Refresh:0;url=train5-2.php?uid='.$uid);
      }
    }

    public function update(){
      $uid = $_POST["id"] ;
      unset($_POST["id"]);
      $rs = $this->db->update("sales" , $_POST , "id=$uid" ) ;
      if($rs==1){
        header('Refresh:0;url=train5-1.php');
      }else{
        header('Refresh:0;url=train5-2.php?uid='.$uid);
      }
    }

    public function verify(){
      switch(true){
        

        case (!isset($_POST["name"])):
        case (!isset($_POST["identity"])):
        case (!isset($_POST["birth"])):
        case (!isset($_POST["tel"])):
        case (!isset($_POST["post_code"])):
        case (!isset($_POST["address"])):
          header('Refresh:0;url=train5-1.php');
        break;
        case (empty($_POST["id"])):
          $this->insert();
        break;
        default:
          $this->update();

      }
    }


  }
  
  
  

  

