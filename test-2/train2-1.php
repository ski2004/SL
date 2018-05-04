<?php
    

  $date = array() ;
  $error = "" ;
  $view = getView();

  // 取天數
  function getDays($y,$m){
    switch($m){
      case "1":case "3":case "5":case "7":case "8":case "10":case "12":
      return 31 ;
      case "4":case "6":case "9":case "11":
      return 30 ;
      case "2":
      if( ($y%4==0 && $y%100!=0) || $y%400==0 ){
        return 29 ;
      }else{
        return 28 ;
      }
    }
  }

  // 抓起始日
  function getWeekend($y ,$m){
    //西元一月一號 12~1月 起始日
    $b = array(  6, 1, 4, 4, 0, 2, 5, 0, 3 , 6, 1, 4 );
    $i= 0 ;                     
    $j = 0 ;

    $i = $b[$m];// 記算起始值i
    $i= $i+($y-1) ;//每年多一天
    $i= $i + floor($y/4)-floor($y/100)+floor($y/400);//遇到幾次閏年 閏年在多加一天

    if($m <= 2){
     if($y%4==0 && $y%100!=0||$y%400==0){ // 當年為閏年則 1 2 月 i 要減一 還沒過
      $i--;  
     }
    }
     $i=$i%7;                   
   return $i;
  }
 
  function getView(){
   
    if(!check()) return ;

    $Week = array("日","一","二","三","四","五","六" );

    $y = (int)$GLOBALS["date"][0] ;
    $m = (int)$GLOBALS["date"][1] ;
    $d = (int)$GLOBALS["date"][2] ;

    $Title ="西元" ;
    $Title .= ($d>0)?  $y."年".$m."月".$d."日" :  $y."年".$m."月" ;
    $view = [] ;
    $view[] = "<table style='border-collapse: collapse;' >" ;
    $view[] = "<tr>" ;
    $view[] = "<td style='border: 1px solid #ddd;padding:10px;text-align:center' colspan='7' >".$Title."</td>" ;
    $view[] = "</tr><tr>" ;
    for($i=0;$i<7;$i++){
      $view[] = "<td style='border: 1px solid #ddd;padding:10px;' >".$Week[$i]."</td>" ;
    }
    $view[] = "</tr><tr>" ;
    $start = getWeekend($y,$m);
    $max = getDays($y,$m);
    $now = 1 ;
    $row = 0 ;
    
    while($now < $max){
      $Data = ($d==$now)? "background-color:red" : ""  ;
      if($start==$row){
        $view[] = "<td style='border: 1px solid #ddd;padding:10px;".$Data."' >".$now."</td>" ;
        $start = $row+1 ;
        $now++ ;
      }else{
        $view[] = "<td style='border: 1px solid #ddd;padding:10px;' ></td>" ;
      }

      $row++ ;
      if($row>=7){
        $row=0;
        $start=0;
        $view[] =  "</tr><tr>" ;
      }
    }

    $view[] =  "</tr>" ;
    $view[] = "</table>" ;

    return join("",$view) ;

  }

  // 檢查
  function check(){
        
    switch(true){
      case (!isset($_POST["date"])):
      case (empty($_POST["date"])):
      case ( count(explode("-",$_POST["date"]))!=3):
        $GLOBALS["error"] = "輸入參數有錯" ;
        return false ; 
      default:
        $GLOBALS["date"] = explode("-",$_POST["date"]) ;
        return true ;

    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <style>
    b{
      color:red ;
    }
  </style>
</head>
<body>
<form action="./train2-1.php" method="post" >
    萬年曆:
    <br>

    <input type="text" name="date" value=""  placeholder="ex: 2007-02-04"> 

    <input type="submit" value="輸出">
    <br>
    <b><?php echo $error ; ?></b>
    
    <br>
    <?php echo $view ; ?>
  </form> 

</body>
</html>