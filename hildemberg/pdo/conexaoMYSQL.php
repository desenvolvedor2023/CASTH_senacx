<?php
try{
   //CRIANDO AS CONSTANTES PARA CONEXAO
    $host = "172.16.54.174:3310";
    $username = 'root';
    $password = "";
    $DB_PORT = '3310';
    $BASE = "competicao";
    
    $pdo = new PDO("mysql:host=$host;dname=$BASE;charset=utf8",$username,$password);
        //echo "conectado";
    }catch(Exception $e){
        echo "Erro ao conectar no banco de dados1<br>";
        echo $e->getMessage();
    }
?>