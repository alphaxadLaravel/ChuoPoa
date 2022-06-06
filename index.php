<?php

    include "functions.php";

    include "config.php";

    $level = 0;

    if($ussd_string != ""){  
        $ussd_string= str_replace("#", "*", $ussd_string);  
        $ussd_string_explode = explode("*", $ussd_string);  
        $level = count($ussd_string_explode);  
    } 

    if($level == 0){
        // Onyesha menyu kuu
        menuKuu(); 

    }else if ($level>0){  
        switch ($ussd_string_explode[0]) {  
            // Akichagua 1 msajili kama certificate 
            case 1:  
                certificate($ussd_string_explode);  
            break; 
            default:
                echo "END Tafadhari fata Utaratibu!";
        }  
    }  


?>