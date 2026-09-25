<?php
require_once "conexao.php";
$id_hotel = $_GET['id_hotel'];

$sql = "SELECT * FROM quartos WHERE hotel_id = '$id_hotel'";
$resultado = mysqli_query($conexao, $sql);

echo "<table border='1'>";
echo "
    <tr>
            <th>numero</th>
            <th>tipo</th>
            <th>preco_diaria</th>
         </tr>
            ";

while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "
        <tr>
            <td>". $linha['numero'] . "</td>
            <td>". $linha['tipo'] . "</td>
            <td>". $linha['preco_diaria'] .  "</td>
        </tr>
        ";
        echo "</table>";
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos Disponiveis</title>
</head>
<body>
    <h2>Quartos Disponíveis no Hotel Selecionado</h2>
    <div>
<form action="salvar_reservas.php" method="POST">

<div>
    <label for="id_cliente">Id do Cliente</label>
    <input type="number" id="cliente_id" name="cliente_id">


</form>






    </div>








    <table>
        <tr>
            <td>Número</td>
            <td>Tipo</td>
            <td>Preço</td>
        </tr>
    <?php 
    }
    ?>
    </table>

    <h2>Preencha para reservar o quarto</h2>
    <form action="salvar_reservas.php" method="post">
        <label for="id_cliente">ID do Cliente:</label>
        <input type="number" name="id_cliente" id="id_cliente">
        <br><br>

        <label for="id_quarto">ID do Quarto:</label>
        <input type="number" name="id_quarto" id="id_quarto">
        <br><br>

        <label for="data_entrada">Data Entrada:</label>
        <input type="date" name="data_entrada" id="data_entrada">
        <br><br>

        <label for="data_saida">Data Saída:</label>
        <input type="date" name="data_saida" id="data_saida">

        <button>RESERVAR</button>
    </form>
</body>
</html>