<?php
    ### IMPORTANT VARIABLES:::
    $tawi;

    // Function ya ku print maneno hapa
    function ussd_proceed($ussd_text){
     echo "CON $ussd_text";
    }

    // Function ya ku End Dialog
    function ussd_stop($ussd_text){
        echo "END $ussd_text";
        }

    // Function ya malipo hapa
    function malipo(){
        $ussd_text = "Fanya malipo ya Application, kwa: \n"
        ."\n1. Benki\n"
        ."2. Airtelmoney\n"
        ."3. Tigo Pesa\n"
        ."4. M-Pesa";

        ussd_proceed($ussd_text);
    }

    // function kwaajili ya kucahgua Tawi
    function tawi(){
        $ussd_text = "Chagua Tawi la chuo: \n"
        ."\n1. Dar Main Campus\n"
        ."2. Simiyu\n"
        ."3. Dodoma\n"
        ."4. Mwanza";

        ussd_proceed($ussd_text);
    }

    // Function ya kuanzisha MENU hapa
    function menu(){
        $ussd_text  = "Karibu Chuo Poa \n"
        ."\n1. Certificate \n"
        ."2. Diploma\n"
        ."3. Degree\n"
        ."4. Masters\n"
        ."5. Register\n"
        ."6. Cancel Confirmation\n"
        ."7. Student\n"
        ."8. Second Application\n"
        ."9. Create Password\n"
        ."10. Check your Information\n";

        ussd_proceed($ussd_text);
    }

    // Function ya option 1 - CERTIFICATE
    function certificate($details){
        if (count($details)==1){
            $ussd_text="Andika namba ya siri";
            ussd_proceed($ussd_text);

        }else if(count($details)==2){
           $ussd_text="Andika namba ya Form IV";
           ussd_proceed($ussd_text);

        }else if(count($details) == 3){
            tawi();
        }else if(count($details) == 4){
            if($details[3] == "1"){
                $tawi = "Dar Main Campus";
            }else if($details[3] == "2"){
                $tawi = "Simiyu";
            }else if($details[3] == "3"){
                $tawi = "Dodoma";
            }else if($details[3] == "4"){
                $tawi = "Mwanza";
            }

            $ussd_text = "Chagua Course tatu tu kwa pamoja! Kwa kuingiza namba ya course zikifatana e.g 123: \n"
           ."\n1. Basic Certificate in Accounting\n"
           ."2. Basic Certificate in Taxation\n"
           ."3. Basic Certificate in Insurance\n"
           ."4. Basic Certificate in Computer Science\n"
           ."5. Basic Certificate in Banking and Finance";
           
           ussd_proceed($ussd_text);

        }else if(count($details) == 5){
            malipo();
        }else if(count($details) == 6){
            if($details[5] == "1"){

                $ussd_text = "Ili kufanya malipo kupitia Benki, Chagua: \n"
                ."\n1. Kupata  Control Number\n"
                ."2. kusitisha";
                ussd_proceed($ussd_text);

        
            }elseif($details[5] == "2" || $details[5] == "3" || $details[5] == "4"){
        
                $response = "Ili kufanya malipo, Chagua: \n"
                ."\n1. Kupata namba ya kampuni ya malipo\n"
                ."2. kusitisha";
                ussd_proceed($ussd_text);

            }
        }
    }

    

?>