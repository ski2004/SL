<?php
    

  class FILES {

    public function __construct(){}

  

    public function get(){
      $filename = "test.txt";
      $res= [];
      //判斷是否有該檔案
      if(file_exists($filename)){
        $file = fopen($filename, "r");
        if($file != NULL){
          //當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
          while (!feof($file)) {
            $str = trim(fgets($file));
            // $str = base64_decode($str);
            if(count(explode("__**__",$str))<=1) continue ;
            $res[]= explode("__**__",$str)  ;
          }
          fclose($file);
        }
      }
      return $res;
    }

    public function insert($data=[]){
      
      $file = fopen("test.txt","a+"); //開啟檔案

      fwrite($file,join("__**__",$data).PHP_EOL);

      fclose($file);

    }

    public function update($data=[]){
      $new = [] ;
      foreach($data as $k=>$v){
        $new[]= join("__**__",$v);
      }
      $file = fopen("test.txt","w+"); 

      fwrite($file,join(PHP_EOL,$new));

      fclose($file);

    }

  }
  
  
  

  

