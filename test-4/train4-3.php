<?php
    
  require_once('../main.php') ;
  require_once('./train4-4.php');
  $action = new Action();
  
  class Action {
    public $file;
    public $tpl;
    public $type;
    public $error;
    public $param;
    public function __construct()
    {
      $this->param = $_POST ;
      $this->file = new FILES();
      $this->tpl = new Smarty(); 
      $this->tpl->template_dir = "views" ;
      $this->tpl->compile_dir = "tmp" ;
      
      $this->action();
      
    }

    public function action(){
      if(!isset($this->param["action"])){
        $this->back(1002);
        return  ;
      } 
      switch($this->param["action"]){
        case "insert":
          if(!$this->verify()) return ;
          $this->insert();
        break;
        case "update":
          if(!$this->verify()) return ;
          $this->update();
        break;
        case "del":
          if(!$this->verify_del()) return ;
          $this->del();
        break;
        default:
      }
    }


    public function insert(){
      
      $array = array(  
        $this->param["name"] , $this->param["identity"] , 
        $this->param["birth"] , $this->param["tel"] , 
        $this->param["post_code"] , $this->param["address"] , 
      );

      $this->file->insert($array);

      $this->back();
    }

    public function update(){
      $array = array(  
        $this->param["name"] , $this->param["identity"] , 
        $this->param["birth"] , $this->param["tel"] , 
        $this->param["post_code"] , $this->param["address"] , 
      );

      $data = $this->file->get();
      $data[$this->param["id"]] = $array ;
      $this->file->update($data);
      $this->back();
 
    }

    public function del(){
      $data = $this->file->get();
      unset($data[$this->param["id"]]);
      $this->file->update($data);
      $this->back();
    }

    private function back($code=200 , $content=null){
        echo json_encode(["code"=>$code , "content"=>$content ]) ;
    }

    // 新增修改參數 驗證
    public function verify(){
      switch(true){
        case (!isset($_POST["name"])):
        case (!isset($_POST["identity"])):
        case (!isset($_POST["birth"])):
        case (!isset($_POST["tel"])):
        case (!isset($_POST["post_code"])):
        case (!isset($_POST["address"])):
          $this->back(1002);
          return false ;
      }
      return true ;
    }
    // 刪除 參數驗證
    public function verify_del(){
      switch(true){
        case (!isset($_POST["id"])):
          $this->back(1002);
          return false ;
      }
      return true ;
    }

  }
  
  
  

  

