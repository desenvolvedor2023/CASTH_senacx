<?php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));
    $hora_atual = utf8_encode(strftime('%H:%M:%S', strtotime('now')));

    $nome_sistema = 'Nome Sistema';
    $email_sistema = 'cosme.teixeira@gmail.com';
    $telefone_sistema = '(35)0000-0000';
    $url_sistema = 'http://localhost/SENACX/';
    //echo "$data_hoje . $hora_atual";
?>