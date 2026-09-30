<?php
require_once "conexao.php";

$sql = "SELECT
        reservas.id,
        clientes.nome AS nome_cliente, clientes.telefone, quartos.numero, reservas.data_entrada, reservas.data_saida
        
    FROM reservas 
    JOIN quartos ON reservas.quarto_id = quartos.id
    JOIN  clientes ON reservas.cliente_id = clientes.id
    WHERE quartos.hotel_id = 1";

    $resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quarto Reservados </title>
    <style>
        /* Estilos Gerais */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 24px;
            font-weight: 600;
        }

        /* Container da Tabela para deixá-la responsiva */
        .table-container {
            width: 100%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            margin-bottom: 30px;
        }

        /* Estilização da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 14px 20px;
        }

        th {
            background-color: #c5a059;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tr {
            border-bottom: 1px solid #e0e0e0;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:nth-child(even) {
            background-color: #f9fbfb;
        }

        tr:hover {
            background-color: #f1f4f6;
            transition: background-color 0.2s ease;
        }

        /* Links e Botões */
        .nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            width: 100%;
            max-width: 1000px;
        }

        a {
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-cadastrar {
            background-color: #2ecc71;
            color: white;
        }

        .btn-cadastrar:hover {
            background-color: #27ae60;
        }

        .btn-sair {
            background-color: #e74c3c;
            color: white;
        }

        .btn-sair:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<h2>Painel De Reservas Dos Quartos</h2>
<div class="table-container">
<table>
   <tr>
    <th>Cod. Reservas</th>
    <th>Quarto</th>
    <th>Hospede</th>
    <th>Telefone</th>
    <th>Data de Entrada</th>
    <th>Data de Saida</th>
   </tr> 
   <?php
while($linha = mysqli_fetch_assoc($resultado)){
echo"

<tr>

<td>".$linha['id']."</td>
<td>".$linha['numero']."</td>
<td>".$linha['nome_cliente']."</td>
<td>".$linha['telefone']."</td>
<td>".$linha['data_entrada']."</td>
<td>".$linha['data_saida']."</td>
</tr>
";
}


?>
</table>
<br> 
<div class="nav-links">   
<a href="cadastrar_quarto.html" class="btn-cadastrar">Clique aqui para cadrastrar novos quartos</a>

<a href="logout.php" class="btn-sair">Clique aqui para sair do sistema</a>
</div>
</body>
</html>