<?php
// RVra

header('Content-type: text/plain');

$conn = mysqli_connect('localhost', 'id18963470_chuo_poa', '_JE4w+S)0Qs5lS7S','id18963470_chuo');

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
$ussd_string = explode("*", $text);
$level = 0;
$level = count($ussd_string );

if ($text == "") {
    // hii ni response ya kwanza user akibonyeza menyu yetu
    $response  = "CON Karibu Chuo Poa \n";
    $response .= "1. Certificate \n";
    $response .= "2. Diploma\n";
    $response .= "3. Degree\n";
    $response .= "4. Masters\n";
    $response .= "5. Register\n";
    $response .= "6. Cancel Confirmation\n";
    $response .= "7. Student\n";
    $response .= "8. Second Application\n";
    $response .= "9. Create Password\n";
    $response .= "10. Check your Information\n";
}elseif ($text == "9") {
    // hii ni pale ambapo user akichagua Certificate
    $response = "CON Jitengenezee password [4 digits]:";
}
elseif ($ussd_string[0] == 9 && $level == 2) {
    $response = "CON Thibitisha Password [4 digits]";
}
elseif ($ussd_string[0] == 9 && $level == 3) {
    $pass1 = $ussd_string[1];
    $pass2 = $ussd_string[2];
    if(strlen($pass1) < 4 || strlen($pass1) > 4){
        $response = "END Password haitakiwi kuwa fupi au ndefu kuliko tarakimu 4 !";

    }elseif(strlen($pass2) < 4 || strlen($pass2) > 4){
        $response = "END Password haitakiwi kuwa fupi au ndefu kuliko tarakimu 4 !";
    }
    elseif($pass1 == $pass2){

        $qry = "SELECT * FROM `passwords` WHERE phoneNumber = '$phoneNumber'";
        $check = mysqli_query($conn, $qry);

        if(mysqli_num_rows($check) == 1){
            $response = "END Namba hii ".$phoneNumber." tayari ipo, Tafadhari rejea password ya zamani!";
        }else{
            $qry = "INSERT INTO `passwords`(`phoneNumber`, `password`) VALUES ('$phoneNumber','$pass1')";
            mysqli_query($conn, $qry);
            $response = "END Umefanikiwa kuunda Password yako kupitia Number hii ".$phoneNumber;
        }

    }else{
        $response = "END Password hazifanani";
    }
}elseif ($text == "3") {
    // hii ni pale ambapo user akichagua Degree
    $response = "CON Ingiza Password yako!:";
}
elseif ($ussd_string[0] == 3 && $level == 2) {
    $password = $ussd_string[1];
    $qry = "SELECT * FROM `passwords` WHERE password = '$password'";
    $check = mysqli_query($conn, $qry);

        if(mysqli_num_rows($check) == 1){
            $response = "CON Ingiza Namba ya Form 4:";
        }else{
            $response = "END Password sio sahihi! ";
        }
}
elseif ($ussd_string[0] == 3 && $level == 3) {
    $response = "CON Ingiza Namba ya Form 6:";
} 
elseif ($ussd_string[0] == 3 && $level == 4) {
    $response = "CON Chagua Tawi la chuo: \n";
    $response .= "1. Dar Main Campus\n";
    $response .= "2. Simiyu\n";
    $response .= "3. Dodoma\n";
    $response .= "4. Mwanza";
}
elseif ($ussd_string[0] == 3 && $level == 5) {
    // when use response with option dar main Campus
    $response = "CON Chagua Course tatu tu kwa pamoja! Kwa kuingiza namba ya course zikifatana e.g 123: \n";
    $response .= "1. Bachelor of Science in Taxation\n";
    $response .= "2. Bachelor of Science in Acturial\n";
    $response .= "3. Bachelor of Science in Insuarance\n";
    $response .= "4. Bachelor of Science in Information Tech\n";
    $response .= "5. Bachelor of Science in Computer Sci";
}
elseif ($ussd_string[0] == 3 && $level == 6) {
    // when use response with option dar main Campus
    $response = "CON Fanya malipo ya Application, kupitia: \n";
    $response .= "1. Benki\n";
    $response .= "2. Airtelmoney\n";
    $response .= "3. Tigo Pesa\n";
    $response .= "4. M-Pesa";
}

echo $response;


?>
















<?php
// RVra

header('Content-type: text/plain');

include "functions.php";

$conn = mysqli_connect('localhost', 'id18963470_chuo_poa', '_JE4w+S)0Qs5lS7S','id18963470_chuo');

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
$ussd_string = explode("*", $text);
$level = 0;
$level = count($ussd_string );

if ($text == "") {
    // hii ni response ya kwanza user akibonyeza menyu yetu
    menu();
    
}elseif ($text == "9") {
    // hii ni pale ambapo user akichagua Certificate
    $response = "CON Jitengenezee password [4 digits]:";
}
elseif ($ussd_string[0] == 9 && $level == 2) {
    $response = "CON Thibitisha Password [4 digits]";
}
elseif ($ussd_string[0] == 9 && $level == 3) {
    $pass1 = $ussd_string[1];
    $pass2 = $ussd_string[2];
    if(strlen($pass1) < 4 || strlen($pass1) > 4){
        $response = "END Password haitakiwi kuwa fupi au ndefu kuliko tarakimu 4 !";

    }elseif(strlen($pass2) < 4 || strlen($pass2) > 4){
        $response = "END Password haitakiwi kuwa fupi au ndefu kuliko tarakimu 4 !";
    }
    elseif($pass1 == $pass2){

        $qry = "SELECT * FROM `passwords` WHERE phoneNumber = '$phoneNumber'";
        $check = mysqli_query($conn, $qry);

        if(mysqli_num_rows($check) == 1){
            $response = "END Namba hii ".$phoneNumber." tayari ipo, Tafadhari rejea password ya zamani!";
        }else{
            $qry = "INSERT INTO `passwords`(`phoneNumber`, `password`) VALUES ('$phoneNumber','$pass1')";
            mysqli_query($conn, $qry);
            $response = "END Umefanikiwa kuunda Password yako kupitia Number hii ".$phoneNumber;
        }

    }else{
        $response = "END Password zako hazifanani";
    }
}elseif ($text == "1") {
    // hii ni pale ambapo user akichagua Degree
    $response = "CON Ingiza Namba ya siri!:";
}
elseif ($ussd_string[0] == 1 && $level == 2) {
    $password = $ussd_string[1];
    $qry = "SELECT * FROM `passwords` WHERE password = '$password'";
    $check = mysqli_query($conn, $qry);

        if(mysqli_num_rows($check) == 1){
            $response = "CON Ingiza Namba ya Form 4:";
        }else{
            $response = "END Password sio sahihi! ";
        }
}
elseif ($ussd_string[0] == 1 && $level == 3) {
    $response = "CON Andika namba ya form IV:";
} 
elseif ($ussd_string[0] == 1 && $level == 4) {
    $response = "CON Chagua Tawi la chuo: \n";
    $response .= "1. Dar Main Campus\n";
    $response .= "2. Simiyu\n";
    $response .= "3. Dodoma\n";
    $response .= "4. Mwanza";
}
elseif ($ussd_string[0] == 1 && $level == 5) {
    // when use response with option dar main Campus
    $response = "CON Chagua Course tatu tu kwa pamoja! Kwa kuingiza namba ya course zikifatana e.g 123: \n";
    $response .= "1. Basic Certificate in Accounting\n";
    $response .= "2. Basic Certificate in Taxation\n";
    $response .= "3. Basic Certificate in Insurance\n";
    $response .= "4. Basic Certificate in Computer Science\n";
    $response .= "5. Basic Certificate in Banking and Finance";
    
}elseif ($ussd_string[0] == 1 && $level == 6) {
    // when use response with option dar main Campus
    malipo();

}elseif ($ussd_string[0] == 1 && $level == 7) {
    // when use response with option dar main Campus
    if($ussd_string[6] == 1){

        $response = "CON Ili kufanya malipo kupitia Benki, Chagua: \n";
        $response .= "1. Kupata  Control Number\n";
        $response .= "2. kusitisha";

    }elseif($ussd_string[6] == 2 || $ussd_string[6] == 3 || $ussd_string[6] == 4){

        $response = "CON Ili kufanya malipo, Chagua: \n";
        $response .= "1. Kupata namba ya kampuni ya malipo\n";
        $response .= "2. kusitisha";

    }
}


echo $response;


?>