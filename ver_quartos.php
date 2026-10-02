<?php
require_once "conexao.php";

// Segurança básica: garante que o ID seja um número
$id_hotel = isset($_GET['id_hotel']) ? intval($_GET['id_hotel']) : 0; 
$sql = "SELECT * FROM quartos WHERE hotel_id = '$id_hotel'";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos Disponíveis | Reservas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        :root {
            --primary-color: #c5a059; /* Dourado Hotel */
            --primary-hover: #b08d48;
            --text-dark: #2c3e50;
            --text-light: #64748b;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-dark);
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background-color: var(--bg-card);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .header-section {
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            color: var(--text-dark);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        p.subtitle {
            color: var(--text-light);
            font-size: 15px;
        }

        /* Tabela Estilizada */
        .table-responsive {
            overflow-x: auto;
            margin-bottom: 40px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            text-align: left;
        }

        th, td {
            padding: 16px 20px;
            font-size: 15px;
        }

        th {
            background-color: var(--primary-color);
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tr {
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        td {
            color: var(--text-dark);
        }

        /* Formulário */
        .form-section {
            background-color: #f8fafc;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .form-section h3 {
            margin-bottom: 20px;
            color: var(--text-dark);
            font-size: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 14px;
        }

        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 15px;
            color: var(--text-dark);
            background-color: #fff;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.2);
        }

        button[type="submit"] {
            grid-column: span 2;
            background-color: var(--primary-color);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.1s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        /* Responsividade */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }

            button[type="submit"] {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h2>Quartos Disponíveis</h2>
        <p class="subtitle">Confira as opções do hotel e preencha os dados para garantir sua estadia.</p>
    </div>

    <!-- Tabela gerada dinamicamente pelo PHP -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Tipo</th>
                    <th>Preço Diária</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($resultado) > 0) {
                    while ($linha = mysqli_fetch_assoc($resultado)){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($linha['numero']) . "</td>";
                        echo "<td>" . htmlspecialchars($linha['tipo']) . "</td>";
                        echo "<td>R$ " . number_format($linha['preco_diaria'], 2, ',', '.') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>Nenhum quarto encontrado para este hotel.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Formulário de Reserva -->
    <div class="form-section">
        <h3>Detalhes da Reserva</h3>
        <form action="salvar_reservas.php" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="cliente_id">ID do Cliente</label>
                    <input type="number" id="cliente_id" name="cliente_id" placeholder="Digite seu ID" required>
                </div>
                
                <div class="form-group">
                    <label for="quarto_id">ID do Quarto</label>
                    <input type="number" id="quarto_id" name="quarto_id" placeholder="Número de identificação do quarto" required>
                </div>

                <div class="form-group">
                    <label for="data_entrada">Data de Entrada</label>
                    <input type="date" id="data_entrada" name="data_entrada" required>
                </div>

                <div class="form-group">
                    <label for="data_saida">Data de Saída</label>
                    <input type="date" id="data_saida" name="data_saida" required>
                </div>

                <button type="submit">Confirmar Reserva</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>