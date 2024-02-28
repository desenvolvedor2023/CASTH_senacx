<?php
//na pagina de conexao iniciar a sessão com o comando abaixo
session_start();
require_once('../biblioteca.php');
require_once('conexaoMYSQL.php');
//Pegando as informações com POST via ACTION
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = trim($_POST['email']);
    $password = $_POST['password'];
}else{
    header('Location:' .  $url_sistema . '/login.php');//tela logar.php
    exit();} 
//pegar o usario no Banco de dados
$usuario = $pdo->query("SELECT * FROM ibituruna.usuario WHERE email = '{$email}' AND senha = trim('{$password}') ");
$res = $usuario->fetchAll(PDO::FETCH_ASSOC);
//CONTANDO A QTD DE USARIOS
$qtd = @count($res);
var_dump($qtd);
//Mostrando na tela as informaçoes coletadas no POST
if($qtd != 0 ){
    $_SESSION['email'] = $email;
    //echo $_SESSION['email'];
    //redirecionanDO A PAGINA  COM PHP
    //echo '<script>window.location =' . $url_sistema . 'lagado.php</script>';
    header('Location:' .  $url_sistema . 'telas/votacao_Teste.html');  // redireciona apos conectar
}else{  //redirecionamentop a pagina com php 
    header('Location: ' . $url_sistema);
    session_destroy();
    echo "Usario não encontrado";
}