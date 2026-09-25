<?php
require_once 'conexao.php';
$id_hotel = $_GET['id_hotel'];

$sql = "SELECT * FROM quartos WHERE hotel_id = '$id_hotel'
and disponivel = 1";
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE HOTÉIS</title>
</head>
<body>
    <h2>Quartos Disponíveis no Hotel Selecionado</h2>
    <table>
        <tr>
            <td>Número</td>
            <td>Tipo</td>
            <td>Preço</td>
        </tr>
    <?php while($quarto = mysqli_fetch_assoc($resultado)){
        echo "<tr>
            <td>".$quarto['numero']."</td>
            <td>".$quarto['tipo']."</td>
            <td>".$quarto['preco_diaria']."</td>
        </tr>";
    }
    ?>
    </table>

    <h2>Preencha para reservar o quarto</h2>
    <form action="salvar_reserva.php" method="post">
        <label for="id_cliente">ID do Cliente:</label>
        <input type="number" name="id_cliente" id="id_cliente">
        <br><br>

        <label for="id_quarto">ID do Quarto:</label>
        <input type="number" name="id_quarto" id="id_quarto">
        <br><br>

        <label for="data_entrada">Data Entrada:</label>
        <input type="number" name="data_entrada" id="data_entrada">
        <br><br>

        <label for="data_saida">Data Saída:</label>
        <input type="number" name="data_saida" id="data_saida">

        <button>RESERVAR</button>
    </form>
</body>
</html>