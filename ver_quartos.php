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

while ($linha = mysqli_fetch_assoc($resultado)){
        echo "
<tr>
            <td>". $linha['numero'] . "</td>
            <td>". $linha['tipo'] . "</td>
            <td>". $linha['preco_diaria'] .  "</td>
        </tr>
        ";
        }
        echo "</table>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos Disponiveis</title>
    <style>
        

 * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #282a30;
            margin-bottom: 24px;
            text-align: center;
            font-size: 24px;
        }

        h3 {
            color: #4b5563;
            margin: 30px 0 15px 0;
            font-size: 18px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 8px;
        }

        /* Estilização da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 6px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #c5a059;;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tr {
            border-bottom: 1px solid #e5e7eb;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        /* Estilização do Formulário */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #fff;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* Botão de Envio */
        button[type="submit"] {
            width: 100%;
            background-color: #10b981;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 10px;
        }
        

        button[type="submit"]:hover {
            background-color: #059669;
        }

        /* Responsividade para telas menores */
        @media (max-width: 600px) {
            body {
                padding: 15px 10px;
            }
            .container {
                padding: 20px;
            }
            th, td {
                padding: 10px;
                font-size: 14px;
            }
        }
    
        
    </style>
</head>
<body>

<div class="container">

    <h2>Quartos Disponíveis no Hotel Selecionado</h2>
    <div>
<form action="salvar_reservas.php" method="POST">
<div class="form-group">
    <label for="id_cliente">Id do Cliente</label>
    <input type="number" id="cliente_id" name="cliente_id" placeholder=" id cliente" require>
    <br><br>
</div>
<div class="form-group">

<label for="id_quarto">Id do quarto</label>
    <input type="number" id="quarto_id" name="quarto_id" placeholder=" id quarto" require>
</div>
<br><br>

<div class="form-group">
<label for="entrada">Id da entrada</label>
    <input type="date" id="data_entrada" name="data_entrada" placeholder=" data_entrada" require>
</div>
<br><br>

<div class="form-group">
<label for="saida">data da saida</label>
    <input type="date" id="data_saida" name="data_saida" placeholder=" data da saida" require>
</div>

<br><br>
<button  type"submit" style="
    display: inline-block;
    background-color: #c5a059;
    color: #ffffff;
    padding: 12px 24px;
    font-family: 'Segoe UI', Arial, sans-serif;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 6px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    border: none;
    cursor: pointer;
    transition: background-color 0.2s ease;
">comfirmar reservas</button>

</form>
<br><br>
    </div>
   </div>

</body>
</html>