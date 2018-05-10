<?php
    
  require_once('../main.php') ;
  
  $action = new Action();
  
  class Action {
    public $db;
    public $tpl;
    public $type;
    public $error;
    public $param;
    public function __construct()
    {
      $this->param = $_POST ;
      $this->db = new MySql();
      $this->tpl = new Smarty(); 
      $this->tpl->template_dir = "views" ;
      $this->tpl->compile_dir = "tmp" ;
      // print_r($_POST);
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
          if(!$this->verify_Identity()) return ;
          $this->insert();
        break;
        case "update":
          if(!$this->verify()) return ;
          if(!$this->verify_Identity()) return ;
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
      // 判斷開關
      $enable = $this->db->get("control" , [ "name" => "identity_repeat" ] );
      if($enable[0]['content']==='1') {
        $repeatData = $this->db->get("customer" , [ "identity" => $this->param["identity"] ] );
        if(count($repeatData)>0) {
          $this->back(1007);
          return ;
        }
      } 

      $array = [ "name" => $this->param["name"] , "identity" => $this->param["identity"] , "birth" => $this->param["birth"] , "tel" => $this->param["tel"] , "post_code" => $this->param["post_code"] , "address" => $this->param["address"] , "password" => "123" , "account" => $this->param["name"]] ;
      
      $rs = $this->db->insert("customer" , $array ) ;
      
      if($rs==1){
        $this->back();
      }else{
        $this->back(1001);
      }
    }

    public function update(){
      
      $array = [ "name" => $this->param["name"] , "identity" => $this->param["identity"] , "birth" => $this->param["birth"] , "tel" => $this->param["tel"] , "post_code" => $this->param["post_code"] , "address" => $this->param["address"]  ] ;
      $where = [ "id" => $this->param['id'] ] ;
      $rs = $this->db->update("customer" , $array , $where ) ;
      
      if($rs==1){
        $this->back();
      }else{
        $this->back(1001);
      }
    }

    public function del(){
      
      $rs = $this->db->del("customer" , [ "id"=>$this->param['id'] ] ) ;
      
      if($rs==1){
        $this->back();
      }else{
        $this->back(1001);
      }
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
        case (empty($_POST["name"])):
        case (empty($_POST["identity"])):
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
    // 驗證身分證
    public function verify_Identity(){


      $ID = trim($_POST["identity"]) ;
      $array = str_split($ID);

      switch(true){
        case (count($array)!==10):
          $this->back(1003);
          return false ;
        case (!$this->Identity_Calculate($array)):
          return false ;
      }


      return true;

    }

    public function Identity_Calculate($ch=[]){
      $POWER = array(1,8,7,6,5,4,3,2,1,1);
      if(!$this->en2num($ch[0])) {
        $this->back(1004);
        return false ;
      }  
      $ch[0] = $this->en2num($ch[0]);
      for($i=1 ; $i<count($ch) ; $i++ ){
        if(!is_numeric($ch[$i])) {
          $this->back(1005);
          return false ;
        }
      }

      $result = [] ;
      foreach($POWER as $k=>$v){
        $result[]= $ch[$k] * $v ;
      }

      $result[0] = floor($result[0]*0.1) + ($result[0]%10) ;
      $number10 = (int)$result[9] ;
      unset($result[9]);
      $sum = 10 - (array_sum($result)%10);
      if($sum !== $number10){
        $this->back(1006);
        return false ;
      } 



      return true ;
    }

    public function en2num($en){
      switch($en)
      {
        case 'A': return 10 ;break;   
        case 'B': return 11 ;break;   
        case 'C': return 12 ;break;   
        case 'D': return 13 ;break;   
        case 'E': return 14 ;break;   
        case 'F': return 15 ;break;   
        case 'G': return 16 ;break;   
        case 'H': return 17 ;break;   
        case 'I': return 34 ;break;   
        case 'J': return 18 ;break;   
        case 'K': return 19 ;break;   
        case 'L': return 20 ;break;   
        case 'M': return 21 ;break;   
        case 'N': return 22 ;break;   
        case 'O': return 35 ;break;
        case 'P': return 23; break;
        case 'Q': return 24; break;
        case 'R': return 25; break;
        case 'S': return 26; break;
        case 'T': return 27; break;
        case 'U': return 28; break;
        case 'V': return 29; break;
        case 'W': return 32; break;
        case 'X': return 30; break;
        case 'Y': return 31; break;
        case 'Z': return 33; break;
        default:
          $GLOBALS['error'] = "身分證第一碼有錯" ;
          return false ;
      }
    }



  }
  
  
  

  

