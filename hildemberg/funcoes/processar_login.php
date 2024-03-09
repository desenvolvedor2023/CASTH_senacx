<?php
// session_start();
$url_sistema = 'http://localhost/SENACX/';
var_dump( $_POST);
echo("Passei aqui...");
echo('console.log("Passei aqui....")');
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo  foi enviado
    if (isset($_POST['adm'])) {
        // Redireciona o usuário para a página de login de Administrador
        header('Location:' .  $url_sistema . 'telas/loginADM.php');
        exit;
    } elseif (isset($_POST['jurado'])) {
        // Redireciona o usuário para a página de login de Jurado
        header("Location:" .   $url_sistema  .  "telas/login_jurado.php");
        exit;
    } else {
        // Se nenhum dos campos estiver definido, redireciona de volta para a página inicial
        header("Location:" .   $url_sistema );
        exit;
    }
} else {
    // Se o método de requisição não for POST, redireciona de volta para a página inicial
    header("Location: " .   $url_sistema );
    exit;
}
?>