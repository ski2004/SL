<?php
    
  print_r($_POST) ;
  $number = "" ;
  $string = "" ;
  switch(true){
    case (isset($_POST["number"])):
      switch(true){
        case (strlen($_POST["number"])>5):
        case (strlen($_POST["number"])<=0):
          $number = "請輸入五個以內的數字" ;
        break;
        default:
          $number = getNumber();
      }
    break;

    case (isset($_POST["word"])):
      $string = getWord();
    break;

  }



  function getNumber(){
    $CN =  array( "零","壹","貳","參","肆","伍","陸","柒","捌","玖" );
    $POSITION =  array("萬","千","佰","拾","");

    $num = str_split($_POST["number"]) ;
    $STR = "" ;
    while(count($POSITION) !== count($num) ){
      array_shift($POSITION);
    }
    for($i=0 ; $i<count($num) ; $i++){
      $number = ($num[$i] !== "0")? $CN[ $num[$i] ].$POSITION[$i] :  "" ;
      $STR .= $number ;
    }
    return  $STR ;
  }


  function getWord(){
    $en = array("i", "you", "am", "are", "student" , "teacher" ) ;
    $zh = array("我", "你", "是", "是", "學生" , "老師" ) ;

    $word = mb_split("\s",$_POST["word"]) ;
    $STR = "" ;
    for($i=0 ;$i<count($word);$i++){
      if(array_search($word[$i], $en)>-1){
        $key = array_search($word[$i], $en) ;
        $STR .= $zh[$key] ;
      } 
    }
    return $STR ;
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
  <form action="./train3.php" method="post" >
    數字轉換:
    <br>
    <input type="text" name="number" value="<?php echo (isset($_POST["number"])? $_POST["number"] : "")  ; ?>" placeholder="ex: 12345" >
    <input type="submit" value="輸出">
    <br>
    <br>
    <b><?php echo $number ; ?></b>
  </form> 
  <br>
  =============================
  <br>
  <form action="./train3.php" method="post">
    字串拆解:
    <br>
    判斷陣列 (i,you),(am,are),(stduent,teacher)
    <br>
    替換陣列 (我,你),(是,是),(學生,老師)
    <br>
    <input type="text" name="word" value="<?php echo (isset($_POST["word"])? $_POST["word"] : "")  ; ?>" placeholder="ex: i am stduent" >
    <input type="submit" value="輸出">
    <br>
    <br>
    <b><?php echo $string ; ?></b>    
  </form> 


</body>
</html>