<?php
       require_once "conexao.php";

  

$sql = "SELECT * FROM hoteis";
$resultado = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Hoteis</title>


 <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 40px;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 24px;
        }
        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #c5a059;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        tr {
            border-bottom: 1px solid #dddddd;
        }
        tr:nth-of-type(even) {
            background-color: #f8f9fa;
        }
        tr:last-of-type {
            border-bottom: 2px solid #2c3e50;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        /* Estilização do link de ação para parecer um botão */
        .btn-acao {
            display: inline-block;
            padding: 6px 12px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }
        .btn-acao:hover {
            background-color: #2980b9;
        }
    </style>




</head>
<body>
 <table>
<tr>
    <th>Nome</th>
    


    <th>Cidade</th>
    <th>Estrelas</th>
    <th>Ação</th>
</tr>
<?php
    while ($linha = mysqli_fetch_assoc($resultado)){
  echo "  <tr>
    <td>".$linha['nome']."</td>
    <td>".$linha['cidade']."</td>
    <td>".$linha['estrelas']."</td>
    <td> <a href='ver_quartos.php?id_hotel=".$linha['id']."'>Ver quartos</a> </td>
</tr>
";
    }

?>
  



    </table>
</body>
</html>








