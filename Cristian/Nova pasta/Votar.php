<?php
// Configurações do banco de dados
try {
    $host = "172.16.54.174"; // Endereço IP do servidor do banco de dados
    $username = 'root'; // Nome de usuário do banco de dados
    $password = ""; // Senha do banco de dados
    $DB_PORT = '3310'; // Porta do banco de dados
    $BASE = "casth"; // Nome do banco de dados
 
    // Conexão com o banco de dados usando PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;port=$DB_PORT;dbname=$BASE;charset=utf8", $username, $password);
    // Define que o PDO deve lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Captura e exibe mensagens de erro caso ocorra um problema na conexão
    echo "Erro ao conectar no banco de dados: " . $e->getMessage();
}
 
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $descricao = $_POST["descricao"];
    $local = $_POST["local"];
    $data_emissao = $_POST["data_emissao"];
    $data_finalizacao = $_POST["data_finalizacao"];
    $hora = $_POST["hora"];
    $carga_horaria = $_POST["carga_horaria"];
    $responsavel = $_POST["responsavel"];
 
    // Prepara a consulta SQL para inserir os dados na tabela competicao
    $sql = "INSERT INTO competicao (descricao, local, data_emissao, data_finalizacao, hora, carga_horaria, responsavel)
            VALUES (:descricao, :local, :data_emissao, :data_finalizacao, :hora, :carga_horaria, :responsavel)";
 
    try {
        // Prepara a consulta SQL usando prepared statements para evitar SQL injection
        $stmt = $pdo->prepare($sql);
        // Executa a consulta, passando os valores dos parâmetros
        $stmt->execute([
            'descricao' => $descricao,
            'local' => $local,
            'data_emissao' => $data_emissao,
            'data_finalizacao' => $data_finalizacao,
            'hora' => $hora,
            'carga_horaria' => $carga_horaria,
            'responsavel' => $responsavel
        ]);
 
        // Exibe uma mensagem de confirmação caso a inserção seja bem-sucedida
        echo "<p>Dados inseridos com sucesso!</p>";
    } catch (PDOException $e) {
        // Exibe mensagens de erro caso ocorra algum problema na inserção
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
 
// Lista os registros da tabela competicao
$select_stmt = $pdo->query("SELECT * FROM competicao");
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inserção</title>
    <!-- Adicionando Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adicionando Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-pRnKkqT5OwN2gch7H5c3bJ1y09b9YgHAiZarpcbmUzZcNTnKjUQ9zXT2DzjrSv1J5Nm1Jw8/qz9aVkmk16Dt9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-text {
            color: #666;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .fa {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <!-- Título do formulário -->
    <h1 class="text-center mt-4"><i class="fas fa-poll"></i> Registro De Competição <i class="fas fa-poll"></i></h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Formulário de inserção -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <!-- Campo de entrada para a descrição -->
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" id="descricao" name="descricao">
                    </div>

                    <!-- Campo de entrada para o local -->
                    <div class="form-group">
                        <label for="local">Local:</label>
                        <input type="text" class="form-control" id="local" name="local">
                    </div>

                    <!-- Campo de entrada para a data de emissão -->
                    <div class="form-group">
                        <label for="data_emissao">Data de Inicio:</label>
                        <input type="date" class="form-control" id="data_emissao" name="data_emissao">
                    </div>

                    <!-- Campo de entrada para a data de finalização -->
                    <div class="form-group">
                        <label for="data_finalizacao">Data de Finalização:</label>
                        <input type="date" class="form-control" id="data_finalizacao" name="data_finalizacao">
                    </div>

                    <!-- Campo de entrada para a hora -->
                    <div class="form-group">
                        <label for="hora">Hora de Inicio:</label>
                        <input type="time" class="form-control" id="hora_Inicio" name="hora_Inicio">
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora de Fim:</label>
                        <input type="time" class="form-control" id="hora_Fim" name="hora_Fim">
                    </div>

                    <!-- Campo de entrada para a carga horária -->
                    <div class="form-group">
                        <label for="carga_horaria">Carga Horária:</label>
                        <input type="time" class="form-control" id="carga_horaria" name="carga_horaria">
                    </div>

                    <!-- Campo de entrada para o responsável -->
                    <div class="form-group">
                        <label for="responsavel">Responsável:</label>
                        <input type="text" class="form-control" id="responsavel" name="responsavel">
                    </div>

                    <!-- Botão de envio do formulário -->
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Adicionando jQuery, Popper.js e Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>