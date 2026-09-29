<?php
require_once "conexao.php";

$sql = "SELECT
        reservas.id AS nome_cliente,
        clientes.telefone,
        quartos.numero_quarto,
        reservas.data_entrada,
        reservas.data_saida
    FROM reservas 
    JOIN quartos ON reservas.id_quarto = quartos.id
    JOIN clientes ON reservas.id_clientes = clientes.id
    WHERE quartos.id_hotel='$id_hotel'";

    $resultado = mysqli_query($conexao, $sql);
?>