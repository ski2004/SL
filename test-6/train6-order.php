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
      $prod = (isset($_GET["prod"]))? $_GET["prod"] : "0" ;
      $param = (isset($_GET["prod"]))? ["p_id"=>$prod] :[] ;
      if(isset($_GET["store"])){
        $PID = $this->getProd($_GET["store"]);
        $sql = "SELECT * FROM orders WHERE p_id in (".join(",",$PID).")  ORDER BY id ASC " ;
        $usr = $this->db->queryAll($sql);
        // echo $sql ;
      }else{
        $usr = $this->db->get("orders" , $param) ;
      }
      
      

      
      $this->tpl->assign("usr" , $usr); 
      $this->tpl->assign("prod" , $prod);
      $this->tpl->display("train6-order.tpl");
    }

    public function verify(){

    }

    public function getProd($store_id){
      $rs = $this->db->get("items" , ["store_id"=>$store_id] , ["id"] );
      // print_r($rs) ;
      $data = [] ;
      foreach($rs as $k=>$v){
        $data[] = $v["id"] ;
      }
      return $data ;
    }

  }
