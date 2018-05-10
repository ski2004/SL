<?php

require_once('../main.php');

$action = new Action();

class Action
{
  public $headers;
  public $db;
  public $ID;
  public $table;
  public $action;
  public $usr;
  public $type;
  public $error;
  public $param;
  public function __construct()
  {
    $this->param = $_POST;
    $this->table = null;
    $this->db = new MySql();

      // print_r($_POST);

    switch (true) {
      case (!$this->Auth()):
        $this->back(403);
        break;
      case (!isset($this->param["action"])):
      case (!isset($this->param["src"])):
        $this->back(1002);
        break;
      default:
        $this->table = $this->param["src"];
        $this->action = $this->param["action"];
        $this->ID = (isset($this->param["id"])) ? $this->param["id"] : 0;
        unset($this->param["src"]);
        unset($this->param["action"]);
    }

    $this->action();

  }
  public function Auth()
  {

    $this->headers = apache_request_headers();//apache
    // $this->headers["Authorization"] = (isset($_SERVER["HTTP_AUTHORIZATION"]))? $_SERVER["HTTP_AUTHORIZATION"] : "" ;
    $login = $this->db->get("login", ["token" => $this->headers["Authorization"]]);
    switch (true) {
      case (!isset($login[0]["id"])):
      case (strtotime("now") - strtotime($login[0]["last_time"]) > 6000):
        return false;
    }
    $this->usr = $login[0];
    return true;
  }

  public function action()
  {

    switch ($this->action) {
      case "insert":
        if (!$this->verify()) return;
        if (isset($this->param["id"])) unset($this->param["id"]);
        $this->insert();
        break;
      case "update":
        if (!$this->verify()) return;
        $this->update();
        break;
      case "del":
        if (!$this->verify_del()) return;
        $this->del();
        break;
      case "get":
        if (!$this->verify()) return;
        $rs = $this->get();
        $this->back(201, $rs);
        break;
      default:
    }
    

  }

  public function get()
  {
    $where = $this->param;
    
    if(array_search("uid", $where)){
      $uid = array_search("uid", $where);
      $where[$uid] = $this->usr["uid"];
    }

    return $this->db->get($this->table, $where);
  }

  public function insert()
  {
    $where = $this->param;
    
    if(array_search("uid", $where)){
      $uid = array_search("uid", $where);
      $where[$uid] = $this->usr["uid"];
    }
      $rs = $this->db->insert($this->table, $where);

    if ($rs == 1) {
      $this->back();
    } else {
      $this->back(1001);
    }
  }

  public function update()
  {

    $where = ["id" => $this->ID];
    $rs = $this->db->update($this->table, $this->param, $where);

    if ($rs == 1) {
      $this->back();
    } else {
      $this->back(1001);
    }
  }

  public function del()
  {

    $rs = $this->db->del($this->table, ["id" => $this->param['id']]);

    if ($rs == 1) {
      $this->back();
    } else {
      $this->back(1001);
    }
  }

  private function back($code = 200, $content = null)
  {
    echo json_encode(["code" => $code, "content" => $content]);
  }

  // 新增修改參數 驗證
  public function verify()
  {

    return true;
  }
  // 刪除 參數驗證
  public function verify_del()
  {
    switch (true) {
      case (!isset($this->param["id"])):
        $this->back(1002);
        return false;
    }
    return true;
  }


}
  
  
  

  

