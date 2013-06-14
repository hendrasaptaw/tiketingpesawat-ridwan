<?php
$Asal       = $_GET['asal'];
$Tujuan     = $_GET['tujuan'];
$Tanggal    = $_GET['tanggal'];
$Token      = "082b6aeb82f4172a7c9008cb3be95f01"; //Isi Token Anda Disini
 
$Data = file_get_contents("https://api.master18.tiket.com/search/flight?d=".$Asal."&a=".$Tujuan."&date=".$Tanggal."&adult=1&child=0&infant=0&ret_date=&token=".$Token."&output=json");
 
$Proses2 = json_decode($Data);
 
$array = array();
$array[] = (object)$Proses2;
 
if ($_GET['callback']) {
        echo $_GET['callback'] . '('.json_encode($array).')';
    }else{
        echo '{"items":'. json_encode($array) .'}';
    }
?>