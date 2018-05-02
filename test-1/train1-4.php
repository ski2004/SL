<?php
    
 
    

    DoubleRow() ;

    // 雙排
    function DoubleRow(){
        $view = [] ;
        $view[] = "<table style='border-collapse: collapse;' >" ;
        for($col = 0 ; $col<2 ; $col++ ){
            $view[] = "<tr>" ;
            for($row = 2 ; $row<6 ; $row++ ){
                $view[] = "<td style='border: 1px solid #ddd;padding:10px;' >" ;
                
                $content = [] ;
                $left = $col*4 + $row ;
                $right = 0 ;
                do{
                    $right++;
                    $content[] = $left."x".$right."=".$left*$right ;
                }while($right<9);

                $view[] =join("<br>" , $content ) ;
                $view[] = "</td>" ;   
            }
            $view[] =  "</tr>" ;
        }
        $view[] = "</table>" ;

        echo join("",$view) ;
    }

  


?>