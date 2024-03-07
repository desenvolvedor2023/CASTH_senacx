<?php
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo 'tipo_login' foi enviado
    if (isset($_POST['adm'])) {
        // Redireciona o usuário para a página de login de Administrador
        header("Location: ../telas/loginADM.php");
        exit;
    } elseif (isset($_POST['jurado'])) {
        // Redireciona o usuário para a página de login de Jurado
        header("Location: ../telas/login_jurado.php");
        exit;
    } else {
        // Se nenhum dos campos estiver definido, redireciona de volta para a página inicial
        header("Location: ./index.html");
        exit;
    }
} else {
    // Se o método de requisição não for POST, redireciona de volta para a página inicial
    header("Location: ./index.html");
    exit;
}
?>