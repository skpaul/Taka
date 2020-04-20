<?php 
class Taka{
    public static function format($number, $default='0.00'){
       
        if(empty($number)){
            return $default;
        }

        if(strstr($number,"-")) 
        { 
            $number = str_replace("-","",$number); 
            $negative = "-"; 
        } 
        
        $number = number_format((float)$number, 2, '.', '');

        $split_number = explode(".",$number); 
        
        $taka = $split_number[0]; 
        $poisa = $split_number[1]; 
        
        if(strlen($taka)>3) 
        { 
            $hundreds = substr($taka,strlen($taka)-3); 
            $thousands_in_reverse = strrev(substr($taka,0,strlen($taka)-3)); 
            for($i=0; $i<(strlen($thousands_in_reverse)); $i=$i+2) 
            { 
                $thousands .= $thousands_in_reverse[$i].$thousands_in_reverse[$i+1].","; 
            } 
            $thousands = strrev(trim($thousands,",")); 
            $formatted_taka = $thousands.",".$hundreds; 
            
        } 
        else 
        { 
            $formatted_taka = $taka; 
        } 
        
        if((int)$poisa>0) 
        { 
            $formatted_poisa = ".".substr($poisa,0,2); 
        } 
        
        // return $negative.$formatted_taka.$formatted_poisa; 
        return $negative.$formatted_taka.'.'.$formatted_poisa; 

    } 
}
?>