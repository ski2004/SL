<?php
    
 
    
    Square();
    echo "<br>" ;

    function Square(){
        // 正方
        $view = [] ;
        $view[] = "<table style='border-collapse: collapse;' >" ;
        for($col = 0 ; $col<10 ; $col++ ){
            $view[] = "<tr>" ;
            for($row = 0 ; $row<10 ; $row++ ){
                $view[] = "<td style='border: 1px solid #ddd;padding:10px;' >" ;
                if($col==0 && $row==0){
                    $view[] = "x" ;   
                }else if($col==0){
                    $view[] = $row ;   
                } else if($row==0){
                    $view[] = $col ;   
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