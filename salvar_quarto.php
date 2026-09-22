<?php
         require_once "conexao.php";

$hotel_id = $_POST['id'];
$numero = $_POST['numero'];
$tipo = $_POST['tipo'];
$preco_diaria = $_POST['preco_diaria'];



$sql = "INSERT INTO quartos (hotel_id,numero,tipo,preco_diaria, disponivel) VALUES ($hotel_id, $numero,'$tipo','$preco_diaria', 1)";

 if (mysqli_query($conexao, $sql)) {
echo "<h3>Quarto cadastrado com sucesso!</h3>";
 echo "<p><a href='cadastrar_quarto.html'>Cadastrar outro quarto</a></p>";

    
} else {
    echo "<h3>Erro ao cadastrar o quarto:</h3>";
}
?>