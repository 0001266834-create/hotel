<?php
require_once "conexao.php";


$sql = "SELECT hotel_id, numero, tipo from quartos";
$resultado = mysqli_query($conexao, $sql);

echo "<table border='1'>";



echo "<tr>
 <th>hotel_id</th>
 <th>numero</th>
<th>tipo</th>

</tr>";

while ($linha = mysqli_fetch_assoc($resultado)) {

echo "<tr>";
echo "<td>" . $linha['hotel_id'] . "</td>";
echo "<td>" . $linha['numero'] . "</td>";
echo "<td>" . $linha['tipo'] . "</td>";
echo "</tr>";
}

echo "</table>";
echo "<a href = 'cadastrar_quarto.html'>Cadastre outro quarto </a>";
echo "<a href = 'login_hotel.html'Voltar/Sair</a>";
                    



?>