<?php

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "sodoma_db";

$verbindung = new mysqli($host, $user, $pass, $db);

if(!$verbindung){

    echo "Sad but true";
    exit;
}


$createtable = "CREATE TABLE produtos(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(69) NOT NULL,
    titulo VARCHAR(69) NOT NULL,
    valor DOUBLE(6,2) NOT NULL

)";

if($verbindung->query($createtable) === true){

    echo "Satanás";
}else{

    echo "Sad but true";
};

?>