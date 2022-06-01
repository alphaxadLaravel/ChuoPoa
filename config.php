<?php

header('Content-type: text/plain');
$conn = mysqli_connect('localhost', 'id18963470_chuo_poa', '_JE4w+S)0Qs5lS7S','id18963470_chuo');

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$ussd_string= $_POST['text'];

?>