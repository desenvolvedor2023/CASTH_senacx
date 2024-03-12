<?php
$host = "seu_host"; // Endereço IP do servidor do banco de dados
$username = 'seu_usuario'; // Nome de usuário do banco de dados
$password = "sua_senha"; // Senha do banco de dados
$DB_PORT = 'sua_porta'; // Porta do banco de dados
$BASE = "seu_banco_de_dados"; // Nome do banco de dados

try {
    // Conexão com o banco de dados usando PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;port=$DB_PORT;dbname=$BASE;charset=utf8", $username, $password);
    // Define que o PDO deve lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os dados foram enviados via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se os campos obrigatórios foram preenchidos
        if (isset($_POST["competition"]) && isset($_POST["team"]) && isset($_POST["requisito1"]) && isset($_POST["requisito2"]) && isset($_POST["requisito3"])) {
            // Obtém os dados do formulário
            $competition = $_POST["competition"];
            $team = $_POST["team"];
            $requisito1 = $_POST["requisito1"];
            $requisito2 = $_POST["requisito2"];
            $requisito3 = $_POST["requisito3"];

            // Prepara e executa a declaração de inserção
            $stmt = $pdo->prepare("INSERT INTO sua_tabela (competition, team, requisito1, requisito2, requisito3) VALUES (:competition, :team, :requisito1, :requisito2, :requisito3)");
            $stmt->bindParam(':competition', $competition);
            $stmt->bindParam(':team', $team);
            $stmt->bindParam(':requisito1', $requisito1);
            $stmt->bindParam(':requisito2', $requisito2);
            $stmt->bindParam(':requisito3', $requisito3);
            $stmt->execute();

            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro: Campos obrigatórios não preenchidos.";
        }
    } else {
        echo "Erro: Acesso inválido ao script.";
    }
} catch (PDOException $e) {
    // Captura e exibe mensagens de erro caso ocorra um problema na conexão
    echo "Erro ao conectar no banco de dados: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Formulário de Registro</h2>
            <form id="registrationForm">
                <div class="form-group">
                    <label for="competition">Competição:</label>
                    <input type="number" id="competition" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="team">Equipe:</label>
                    <input type="number" id="team" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="requisito1">Requisito 1:</label>
                    <input type="text" id="requisito1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="requisito2">Requisito 2:</label>
                    <input type="text" id="requisito2" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="requisito3">Requisito 3:</label>
                    <input type="text" id="requisito3" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var competition = document.getElementById("competition").value;
            var team = document.getElementById("team").value;
            var requisito1 = document.getElementById("requisito1").value;
            var requisito2 = document.getElementById("requisito2").value;
            var requisito3 = document.getElementById("requisito3").value;
            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insert_data.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    alert("Dados inseridos com sucesso!");
                }
            };
            xhr.send("competition=" + competition + "&team=" + team + "&requisito1=" + requisito1 + "&requisito2=" + requisito2 + "&requisito3=" + requisito3);
        });
    </script>
</body>
</html>
