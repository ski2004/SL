<?php
    
 
    
    LeftFold() ;
    

    // 左折
    function LeftFold(){

        $view = [] ;
        $view[] = "<table style='border-collapse: collapse;' >" ;
        for($col = 0 ; $col<=6 ; $col++ ){
            $view[] = "<tr>" ;
            for($row = 0 ; $row<=10 ; $row++ ){
                $view[] = "<td style='border: 1px solid #ddd;padding:10px;' >" ;
                if($col==0 && $row==0){
                    $view[] = "x" ;   
                }else if($col==0){
                    $view[] = $row ;   
                } else if($row==0 && $col==1){
                    $view[] = $col ;   
                }else if($row<$col){
                    $Filed = "" ;
                    $row2 = 0 ;
                    $col2 = 0 ;
                    if($col-$row==1){
                        $Filed  = ($col+5 < 11 )? ($col+5)."/".$col : $col ;
                    }else{
                        $Filed = $col-$row ;
                    }
                    $view[] = $Filed  ;
                }else{
                    $view[] = $col*$row ;   
                }
                $view[] = "</td>" ;   
            }
            $view[] =  "</tr>" ;
        }
        $view[] = "</table>" ;

        echo join("",$view) ;

    }


?>