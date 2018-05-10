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

      $usr = $this->db->get("orders" , $param) ;
    
      $sql = "SELECT orders.* , customer.name as C_NAME, items.name as I_NAME FROM orders LEFT JOIN customer ON customer.id=orders.c_Id  LEFT JOIN items ON items.id=orders.p_id  WHERE orders.p_id=$prod "  ; 
      $usr = $this->db->get_query($sql);
      
    print_r($sql);

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
