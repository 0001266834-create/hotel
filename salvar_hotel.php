<?php
        require_once "conexao.php";

$nome_hotel = $_POST['nome_hotel'];
$cidade =$_POST['cidade'];
$estrelas =$_POST['estrelas'];

$sql = "INSERT INTO hotel
 (nome_hotel,cidade,estrelas) VALUES ('$nome_hotel', '$cidade', '$estrelas')";

if(mysqli_query($conexao, $sql)){
  header("Location: minhas_reservas.php");
  exit();
}
else{
    header("Location: login.html");
    exit();
}





?>