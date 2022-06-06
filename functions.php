<?php
    $tawi;
    
    $phoneNumber = $_POST["phoneNumber"];

    // Function ya ku print maneno hapa
    function ussd_proceed($ussd_text){
     echo "CON $ussd_text";
    }

    // Function ya ku End Dialog
    function ussd_stop($ussd_text){
        echo "END $ussd_text";
    }

    // Function ya means za malipo hapa
    function malipo(){
        $ussd_text = "Fanya malipo ya Application, kwa: \n"
        ."\n1. Benki\n"
        ."2. Airtelmoney\n"
        ."3. Tigo Pesa\n"
        ."4. M-Pesa";

        ussd_proceed($ussd_text);
    }

    // Function ya kutuma control number au lipa namba
    function controlLipaNumber($paymentMethod){
        if($paymentMethod == "1"){
            $ussd_text = "Fanya malipo kupitia CRDB, NMB au NBC Bank katika Control number iliyotumwa kwenye namba yako!\n"
            ."\nAsante kwa kuchagua IFM!";
            ussd_stop($ussd_text);

        }elseif($paymentMethod == "2" || $paymentMethod == "3" || $paymentMethod == "4"){

            $pesa;
            if($paymentMethod == "2"){
                $pesa = "Airtelmoney";
            }else if($paymentMethod == "3"){
                $pesa = "Tigo Pesa";
            }else if($paymentMethod == "4"){
                $pesa = "M-Pesa";
            }

            $ussd_text = "Fanya malipo kupitia ".$pesa." katika Namba ya Kampuni iliyotumwa kwenye namba yako! \n"
            ."\nAsante kwa kuchagua IFM!";
            ussd_stop($ussd_text);
        }
    }

    // Function kwaajili ya campus zinazotoa Certificate
    function campusCertificate(){
        $ussd_text = "Chagua Tawi la chuo: \n"
        ."\n1. Dar Main Campus\n"
        ."2. Mwanza Campus\n";

        ussd_proceed($ussd_text);
    }

    // Function kwaajili ya campus zinazotoa diploma
    function campusDiploma(){
        $ussd_text = "Chagua Tawi la chuo: \n"
        ."\n1. Dar Main Campus\n"
        ."2. Simiyu Campus\n"
        ."3. Mwanza Campus";

        ussd_proceed($ussd_text);
    }

    // Function kwaajili ya campus zinazotoa Degree
    function campusDegree(){
        $ussd_text = "Chagua Tawi la chuo: \n"
        ."\n1. Dar Main Campus\n"
        ."2. Mwanza Campus";

        ussd_proceed($ussd_text);
    }

    // Function kwaajili ya campus zinazotoa Masters
    function campusMasters(){
        $ussd_text = "Chagua Tawi la chuo: \n"
        ."\n1. Dar Main Campus\n"
        ."2. Dodoma Campus";

        ussd_proceed($ussd_text);
    }

    // Course za Certificate kulingana na Campus
    function certificateCourses($campus){
        if($campus == "1"){
            // Certificate course Dar main Campus
            $ussd_text = "Karibu Dar Main Campus\n"
            ."\nChagua Course tatu tu kwa pamoja!.. mfano 143: \n"
            ."\n1. Basic Certificate in Accounting\n"
            ."2. Basic Certificate in Taxation\n"
            ."3. Basic Certificate in Insurance\n"
            ."4. Basic Certificate in Computer Science\n"
            ."5. Basic Certificate in Banking and Finance";

            ussd_proceed($ussd_text);

        }else if($campus == "2"){
            // Certificate Course Mwanza Campus
            $ussd_text = "Karibu Mwanza Campus\n"
            ."\nChagua Course tatu tu kwa pamoja!.. mfano 143: \n"
            ."\n1. Basic Certificate in Accounting\n"
            ."2. Basic Certificate in Taxation\n"
            ."3. Basic Certificate in Insurance";

            ussd_proceed($ussd_text);
        }
    }

   

    // Function ya kuanzisha MENU hapa
    function menuKuu(){
        $ussd_text  = "Karibu Chuo Poa \n"
        ."\n1. Certificate \n";
        // ."2. Diploma\n"
        // ."3. Degree\n"
        // ."4. Masters\n"
        // ."5. Register\n"
        // ."6. Cancel Confirmation\n"
        // ."7. Student\n"
        // ."8. Second Application\n"
        // ."9. Create Password\n"
        // ."10. Check your Information\n";

        ussd_proceed($ussd_text);
    }

    // Funxtion kwaajili ya kuthibitisha uchaguzi
    function thibitisha($form4, $campus, $course){
        $ussd_text  = "Thibitisha Taarifa zako:"
        ."\nNamba ya form 4:\n"
        .$form4."\n"
        ."\nTawi la Chuo:\n"
        .$campus."\n"
        ."\nCourse Namba:\n"
        .$course."\n"
        ."\n1. Ndiyo, Fanya malipo\n"
        ."2. Hapana, Sitisha\n\n";

        ussd_proceed($ussd_text);
    }

    // Function ya option 1 - CERTIFICATE
    function certificate($details){
        if (count($details)==1){
            // 1: namba ya siri

            // Verification kwenye Database
            $ussd_text="Andika namba ya siri";
            ussd_proceed($ussd_text);

        }else if(count($details)==2){
            // 2: namba ya form 4

            // Verify Urefu wa namba 
            // Verify Format husika
           $ussd_text="Andika namba ya Form IV \nmfano: S3886.0038.2021";
           ussd_proceed($ussd_text);

        }else if(count($details) == 3){
            // 3: chagua campus za certificate
            $form4 = $details[2];
            $cancelled = "Andika namba yako ya Form 4 kwa kuzingatia Format uliyopewa: \nmfano: S3886.0038.2021";
            $Scheck = strpos($form4, 'S');
            $dotCheck = strpos($form4, '.');

            if ($Scheck !== false && strlen($form4) == 15 && $dotCheck !== false) {
                campusCertificate();
            }else{
                ussd_stop($cancelled);
            }

        }else if(count($details) == 4){
            // 4: chagua Course kulingana na Campus
            $campus = $details[3];
            $cancelled = "Campus uliyochagua Haipo! \nTafadhari fata utaratibu!";

            if($campus >= 1 && $campus <= 2){
                certificateCourses($campus);
            }else{
                ussd_stop($cancelled);
            }

        }else if(count($details) == 5){
            // 6: Thibitisha Uchaguzi
            $form4 = $details[2];
            $campus;
            $course = $details[4];
            $cancelled = "Tafadhari chagua Course Tatu!";

            if($details[3] == "1"){
                $campus = "Dar Main Campus";
            }else if($details[3] == "2"){
                $campus = "Mwanza Campus";
            }

            if(strlen($course) > 3 || strlen($course) < 3){
                ussd_stop($cancelled);
            }else{
                thibitisha($form4, $campus, $course);
            }

        }else if(count($details) == 6){
            // 6: Chagua Njia ya Malipo
            $cancelled = "Umefanikiwa kusitisha Usajili!";
            if($details[4] == "1"){
                malipo();
            }else{
                ussd_stop($cancelled);
            }
        }else if(count($details) == 7){
            // 7: Pata contol number ya malipo au namba ya malipo
            $paymentMethod = $details[6];
            controlLipaNumber($paymentMethod);
        }
    }

?>