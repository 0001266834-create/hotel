<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco ="hotel_db";


$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if($conexao){
    echo "conectou ao banco de dados";
}
else{
    echo "nao conectou ao banco de dados";
}












?>