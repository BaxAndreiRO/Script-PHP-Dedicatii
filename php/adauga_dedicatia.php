<?php

$date_dedicatie = array(
    'pentru' => $_POST['pentru'],
    'dela' => $_POST['dela'],
    'mesaj' => $_POST['mesaj'],
    'ip' => $_SERVER['REMOTE_ADDR']
);

$adauga_dedicatia = 'https://www.main.baxandrei.ro/dedicatii-v2/remote-web_dedicatii/'.id_radio.'/';
$curl = curl_init($adauga_dedicatia);

$date_dedicatie_prelucrate = http_build_query($date_dedicatie, '', '&');

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $date_dedicatie_prelucrate);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$raspuns_platforma_cd = curl_exec($curl);

if($raspuns_platforma_cd == "dedicatie_netrimisa") {
require_once('sabloane/dedicatii/dedicatie_netrimisa.php');
} elseif($raspuns_platforma_cd == "limita_ip_atinsa") {
require_once('sabloane/dedicatii/limita_ip_atinsa.php');
} elseif($raspuns_platforma_cd == "dedicatie_trimisa") {
require_once('sabloane/dedicatii/dedicatie_trimisa.php');
} elseif($raspuns_platforma_cd == "dedicatii_oprite") {
require_once('sabloane/dedicatii/dedicatii_oprite.php');
} else {
require_once('sabloane/dedicatii/eroare_necunoscuta.php');
}

curl_close($curl);