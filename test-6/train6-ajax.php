<?php

require_once('../main.php');

$action = new Action();

class Action
{
  public $db;
  public $ID;
  public $table;
  public $action;
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
      case (!isset($this->param["action"])):
      case (!isset($this->param["src"])):
        $this->back(1002);
        return;
      default:
        $this->table = $this->param["src"];
        $this->action = $this->param["action"];
        $this->ID = ($this->param["id"]) ? $this->param["id"] : 0;
        unset($this->param["src"]);
        unset($this->param["action"]);
    }

    $this->action();

  }

  public function action()
  {

    switch ($this->action) {
      case "insert":
        if (!$this->verify()) return;
        if (isset($this->param["id"])) unset($this->param["id"]);
        //   if(!$this->verify_Identity()) return ;
        $this->insert();
        break;
      case "update":
        if (!$this->verify()) return;
        //   if(!$this->verify_Identity()) return ;
        $this->update();
        break;
      case "del":
        if (!$this->verify_del()) return;
        $this->del();
        break;
      default:

    }
  }



  public function insert()
  {

    //   $array = [ "name" => $this->param["name"] , "identity" => $this->param["identity"] , "birth" => $this->param["birth"] , "tel" => $this->param["tel"] , "post_code" => $this->param["post_code"] , "address" => $this->param["address"]  ] ;

    $rs = $this->db->insert($this->table, $this->param);

    if ($rs == 1) {
      $this->back();
    } else {
      $this->back(1001);
    }
  }

  public function update()
  {

    // $array = ["name" => $this->param["name"], "identity" => $this->param["identity"], "birth" => $this->param["birth"], "tel" => $this->param["tel"], "post_code" => $this->param["post_code"], "address" => $this->param["address"]];
    $where = ["id" => $this->ID ];
    $rs = $this->db->update($this->table, $this->param, $where);

    if ($rs == 1) {
      $this->back();
    } else {
      $this->back(1001);
    }
  }

  public function del()
  {

    $rs = $this->db->del("customer", "id=" . $this->param['id']);

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
  
  
  

  

