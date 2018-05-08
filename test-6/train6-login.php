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


  private function back($code = 200, $content = null)
  {
    echo json_encode(["code" => $code, "token" => $content]);
  }


  public function LoginType(){
    // $uri = $_SERVER["REQUEST_URI"] ;
    // $array = explode("/",$uri);

    // switch($array[1]){
    //   case ("")
    // }

    return false ;
  }

  public function action()
  {
    // if (!$this->vertify()) return;
    if (!$this->LoginType()) return;

    $key = '';
    $usr = $this->db->get($this->type , $this->param);
    if (isset($usr[0]["id"])) {
      $key = $this->getKey($usr[0]);
      $this->back(200, $key);
    } else {
      $this->back(1000, $key);
    }
  }

  public function getKey($usr = [])
  {
    $usr[] = time();
    $k = join("@", $usr);
    // echo md5($k);
    $encode = md5($k);
    $this->db->insert("login", ["token" => $encode , "uid"=>$usr["id"] ]);
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
  
  
  

  

