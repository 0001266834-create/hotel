<?php

require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$estrelas = $_POST['estrelas'];

$sql = "INSERT INTO clientes
 (nome,email,telefone,senha,estrelas) VALUES ('$nome', '$email', '$telefone', '$senha','$estrelas')";

if(mysqli_query($conexao, $sql)){
  header("Location: minhas_reservas.php");
  exit();
}
else{
    header("Location: login.html");
    exit();
}

?>