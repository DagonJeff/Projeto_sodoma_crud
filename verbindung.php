<?php

//Página que reliza a conexão com o banco de dados já existente na plataforma e a criação da tabela.

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "sodoma_db";

$verbindung = new mysqli($host, $user, $pass, $db);

if(!$verbindung){

    echo "Sad but true";
    exit;
}

//Código SQL para criação da tabela no banco de dados.
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
