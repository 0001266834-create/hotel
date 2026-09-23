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
    <td> <a href='ver_quartos.php? id_hotel=".$linha['id']."'>Ver quartos</a> </td>
</tr>
";
    }

?>
  



    </table>
</body>
</html>








