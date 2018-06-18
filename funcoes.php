<?php
        
    function fnc_date_to_mysql($data){
        $ano = substr($data, 6, 4);
        
        $mes = substr($data, 3, 2);
        
        $dia = substr($data, 0, 2);
        
        $data = "$ano-$mes-$dia";
		
		return $data;
    }
    
   

    //--------------------------
    
    

    function fnc_date_to_br($date){
        $dia = substr($date, 8, 2);
        
        $mes = substr($date, 5, 2);
       
        $ano = substr($date, 0, 4);
        
        $date = "$dia/$mes/$ano";
        
		return $date;
    }
    
    

?>