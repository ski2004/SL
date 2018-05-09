<?php

require_once('../main.php');

$action = new Action();

class Action
{
  public $db;
  public $error;
  public $param;
  public $type;
  public function __construct()
  {
    $this->param = $_POST;
    $this->table = null;
    $this->db = new MySql();

    
    $this->action();
    
  }


  private function back($code = 200, $content = null , $uid = null)
  {
    echo json_encode(["code" => $code, "token" => $content , "uid" => $uid]);
  }


  public function LoginType(){
    $uri = $_SERVER["HTTP_REFERER"] ;
    $array = explode("/",$uri);

    $PAGE  =  $array[count($array)-1] ;

    switch( trim($PAGE) ){
      case ("index.php"):
        $this->type = "customer" ;
        return true ;
      break;
      case ("home.php"):
        $this->type = "sales" ;
        return true ;
      break;
      case ("login.php"):
        $this->type = "store" ;
        return true ;
      break;
      default:
        $this->back(999);
        return false ;
    }


  }

  public function action()
  {
    if (!$this->vertify()) return;
    if (!$this->LoginType()) return;

    $key = '';
    $usr = $this->db->get($this->type , $this->param);
    if (isset($usr[0]["id"])) {
      $key = $this->getKey($usr[0]);
      $this->back(200, $key , $usr[0]["id"] );
    } else {
      $this->back(1000, $key);
    }
  }

  public function getKey($usr = [])
  {
    $usr[] = time();
    $k = join("@", $usr);
    $encode = md5($k);
    $this->db->insert("login", ["token" => $encode , "uid"=>$usr["id"] , "login_time"=>date("Y-m-d H:i:s")  ,"last_time"=>date("Y-m-d H:i:s") , "type"=>$this->type ]);
    return $encode;
  }


  // 新增修改參數 驗證
  public function vertify()
  {
    switch (true) {
      case (!isset($this->param["account"])):
      case (!isset($this->param["password"])):
      case (empty($this->param["account"])):
      case (empty($this->param["password"])):
      case (count($this->param) > 2):
        $this->back(1000);
        return false;
    }

    return true;
  }


}
  
  
  

  

