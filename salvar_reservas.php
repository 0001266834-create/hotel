<?php
         require_once "conexao.php";

$id_cliente = $_POST['id_cliente'];
$id_quarto = $_POST['id_quarto'];
$data_entrada = $_POST['data_entrada'];
$data_saida = $_POST['data_saida'];



$sql = "INSERT INTO reservas (cliente_id, quarto_id,data_entrada,data_saida,total) VALUES ($id_cliente, $id_quarto,'$data_entrada','$data_saida',100)";

 if (mysqli_query($conexao, $sql)) {
echo "Reserva salva com sucesso!" ; 
} else {
    echo  "Não Foi possivel Salvar sua reservas.";
    echo "<a herf='ver_quartos.php'Tente novamente!</a>";
}
?>