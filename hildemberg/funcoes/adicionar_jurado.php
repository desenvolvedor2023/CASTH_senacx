<?php
require_once '../pdo/conexaoMYSQL.php';

// Selecionar o banco de dados
$pdo->exec("USE competicao");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $email = $_POST['addJurado_email'];
    $nome = $_POST['addJurado_nome'];
    $celular = $_POST['addJurado_celular'];
    $competicao = $_POST['addJurado_competicao'];
    $tipoUser = $_POST['addJurado_tipoUser'];
    $senha = $_POST['addJurado_senha'];
    
    // Criptografar a senha
    $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir dados do novo jurado no banco de dados
    $query = "INSERT INTO `users` (email, nome, celular, competicao, tipoUser, senha, senhaCripto) 
              VALUES ('$email', '$nome', '$celular', '$competicao', '$tipoUser', '$senha', '$senhaCripto')";
    $result = $pdo->query($query);

    if ($result) {
        echo "Jurado adicionado com sucesso!";
    } else {
        $errorInfo = $pdo->errorInfo();
        echo "Erro ao adicionar jurado: " . $errorInfo[2]; // A mensagem de erro está no índice 2 do array retornado por errorInfo()
    }
}
?>
