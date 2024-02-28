<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once("biblioteca.php");
?> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELA AJAX</title>
    <link rel="stylesheet" href="css/login.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icones BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <h1>Seu Cabeçalho</h1>
    </header>
        <main>
            <form  id="logadoform" method="POST"  action="./pdo/update.php"></form>
                <aside class= "color-red">
                    <button type="button"  id="deletar" nome = "deletar" class="btn btn-danger">Deletar Livro</button>
                    <button type="button" id="btn1" name = "btn1"   class="btn btn-secondary">Mostrar mensagem</button>
                    <button type="button" id="btnUPDATE" name = "btnUPDATE" class="btn btn-success">Atualizar Livro</button>
                    <button type="button" id="btnInserir" name = "btnInserir"class="btn btn-primary">Inserir livro</button>
                    <button type="button" id="btnSelecionar" name = "btnSelecionar"class="btn btn-warning">Ler <br/>livro</button>
                </aside>
            
            <div class = "" >
                <!-- PEGA ID -->
                <label for="">Digite o ID</label>
                <input type="text" id= "id" name = "id" class = "">
                <!-- PEGA O TITULO -->
                <label for="">Titulo: </label>
                <input type="text" id= "titulo" name = "titulo" class = "">
                <!-- PEGA A EDITORA -->
                <label for="">Digite a Editora: </label>
                <input type="text" id= "editora" name = "editora" class = "">
                <!-- PEGA O ANO -->
                <label for="">Ano: </label>
                <input type="text" id= "ano" name = "ano" class = "">
                <!-- PEGA AS PAGINAS -->
                <label for="">Número de páginas:</label>
                <input type="text" id= "n_paginas" name = "n_paginas" class = "">
            </div>
            <div class="mensagem-container">
                <div id="mensagem" name="mensagem">MENSAGEM</div>
            </div>
        </main>
    <footer>
        <p>Seu Rodapé &copy; 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 </body>
    <script type="text/javascript">
        $(document).ready(function(){  

            var urlSistema = '<?= $url_sistema ?>';
            console.log(urlSistema);
            //funcao/deletar.php ==> para deletar livro
            $("#deletar").click(function(ev){
                ev.preventDefault();

                // pegar o id que colocar no . . .
                var id = document.getElementById('id').value; // o id pega do usario
                console.log(id);
                //objeto de dados que sera envido para o servidor
                var dados = {
                    idLivro: id, // cria a variavel recebendo o getElementBYId 
                };
                console.log("o livro a deletar é: " + id);
                $.ajax({
                    url: urlSistema + "funcoes/deletar.php", //MOSTRA A DATA DA BIBLIOTECA E O DELETAR
                    type: 'POST',
                    //serializando o formlario com suas inputs em vetor
                    data: dados, //dados manda pro php
                    success: function(mensagem){
                        $('#mensagem').text('');
                        
                        //$('btnl).click();
                        console.log("O caminho do sistema é: "+ urlSistema);
                        console.log("retorno do php foi: " + mensagem);
                        $('#mensagem').text(mensagem);
                    },
                });
            })               
        });

        
        //funcao/deletar.php ==> para deletar livro
        $("#btnUPDATE").click(function(ev){
            ev.preventDefault();
            var urlSistema = '<?= $url_sistema ?>';
            console.log(urlSistema);
        //colocar as variavesi para envio
        var id = document.getElementById('id').value;
        var name = document.getElementById('titulo').value
        var editora = document.getElementById('editora').value
        var ano = document.getElementById('ano').value
        var paginas = document.getElementById('n_paginas').value
        console.log("variaveis pegas: " + id,name,titulo, editora, ano, paginas);

        //objeto de dados que sera envido para o servidor
        var dados = {
            idLivro: id, // cria a variavel recebendo o getElementBYId 
            //colocar as vsariaveis para mandar no php
        
        };
        console.log("A tualizar o livro:" + id);
        $.ajax({
            url: urlSistema + "./funcoes/update.php", //MOSTRA A DATA DA BIBLIOTECA E O DELETAR
            type: 'POST',
            //serializando o formlario com suas inputs em vetor
            data: dados, //dados manda pro php
            success: function(mensagem){
                $('#mensagem').text('');
                
                //$('btnl).click();
                console.log("O caminho do sistema é: "+ urlSistema);
                console.log("retorno do php foi: " + mensagem);
                $('#mensagem').text(mensagem);
            },
        });
    })   
    </script>
</html>


