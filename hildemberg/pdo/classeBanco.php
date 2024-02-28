<?php

class Banco{   //METADO QUE RETORNA UM ARRAY COM A RESPOSTA DO SQL PASSADO
    public function pegarDados($sql){
        require_once("conexaoMYSQL.php");
        $queryLivros = $pdo->query($sql);
        $result = $queryLivros->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>