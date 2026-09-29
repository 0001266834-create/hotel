<?php
require_once "conexao.php";

$sql = "SELECT
        reservas.id AS id_reservas,
        hoteis.nome AS nome_hotel,
        quartos.tipo,
        quartos.preco_diaria,
        reservas.data_entrada,
        reservas.data_saida
    FROM reservas 
    JOIN quartos ON reservas.quarto_id = quartos.id
    JOIN hoteis ON quartos.hotel_id = hoteis.id";

    $resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
      /* Configurações Gerais */
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
            font-size: 28px;
            font-weight: 600;
        }

        /* Estilização da Tabela */
        .table-container {
            width: 100%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: #c5a059;
            color: white;
            padding: 14px 18px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid #eee;
            color: #555;
            font-size: 15px;
        }

        /* Linhas alternadas e efeito de passar o mouse */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f5f9;
            transition: background-color 0.2s ease;
        }

        /* Estilização do Botão/Link */
        .btn-nova-reserva {
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.2s ease, transform 0.1s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-nova-reserva:hover {
            background-color: #27ae60;
            transform: translateY(-1px);
        }

        .btn-nova-reserva:active {
            transform: translateY(0);
        }

        /* Responsividade para telas menores */
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }
            th, td {
                padding: 10px 12px;
                font-size: 14px;
            }
        }
</style>
    
</head>
<body>
    <h2>Minhas reservas comfirmadas</h2>
     <div class="table-container">

    <table>
        <tr>
            <th>Cod. Reservas</th>
            <th>Nome Hotel</th>
            <th>Tipo do Quarto</th>
            <th>Diaria</th>
            <th>Data Entrada (Check-in)</th>
            <th>Data Saida (Check-out)</th>
        </tr>

        
<?php
while($linha = mysqli_fetch_assoc($resultado)){
  echo "<tr>
  <td>".$linha['id_reservas']."</td>
  <td>".$linha['nome_hotel']."</td>
   <td>".$linha['tipo']."</td>
   <td>".$linha['preco_diaria']."</td>
    <td>".$linha['data_entrada']."</td>
     <td>".$linha['data_saida']."</td>
    </tr>";
 }
?>
       
    </table>
    <a href="listar_hoteis.php">Clic aq para novas reservas</a>
  </body>
</html>