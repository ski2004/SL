<?php
  header("Content-Type:text/html; charset=utf-8");
  require_once('../main.php') ;
  $db =  new MySql();
  echo "自動新增今日起至前三十天定單" ;
  for($i=-30;$i<=0;$i++){
    $day = date('Y-m-d',strtotime(date("Y-m-d") . "$i days"));
    for($j=0;$j<rand(2,5);$j++){
      $db->insert("orders" , ["p_id"=>rand(7,27) , "c_id"=>rand(4,8) , "create_time"=>$day ] );
    }    
  }
  
?>