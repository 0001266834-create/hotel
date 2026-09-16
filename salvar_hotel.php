<?php
        require_once "conexao.php";

$nome_hotel = $_POST['nome_hotel'];
$cidade = $_POST['cidade'];
$E_mail = $_POST['E_mail'];
$senha = $_POST['Senha'];
$estrelas = $_POST['estrelas'];


$estrelas = $_POST['estrelas'];

$sql = "INSERT INTO hoteis (nome,cidade,email,senha,estrelas) VALUES ('$nome_hotel', '$cidade','$E_mail','$Senha', $estrelas)";

if(mysqli_query($conexao, $sql)){
  header("Location: minhas_reservas.php");
  exit();
}
else{
    header("Location: login.html");
    exit();
}





?>