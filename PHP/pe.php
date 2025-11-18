<?php 
error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['gastos_fixos']) && !empty($_POST['gastos_fixos'])) {
        $gastos_fixos = $_POST['gastos_fixos'];
    } else {
        $gastos_fixos = $nada;
    }

    if (isset($_POST['margem_contribuicao']) && !empty($_POST['margem_contribuicao'])) {
        $margem_contribuicao = $_POST['margem_contribuicao'];
    } else {
        $margem_contribuicao = $nada;
    }

    $coresult = $gastos_fixos / $margem_contribuicao;

    function moeda($v){
        return "R$ " . number_format($v, 2, ',', '.');
    }

    $coresultFormatado = moeda($coresult);
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/style.css">
        <link rel="stylesheet" href="/CSS/jose.css">
        <title>SmartCash</title>
    </head>
    <body>

        <div class="navbarbg">
            <nav class="navbar">
                <div class="logo">
                    <a href="/index.html">SmartCash</a>
                    <img src="/IMG/dollar.svg" alt="logo.">
                </div>
                <div class="itens">
                    <ul>
                        <li><a class="itensnav" href="/operacoes/ccc.html">CCC</a></li>
                        <li><a class="itensnav" href="/operacoes/co.html">CO</a></li>
                        <li><a class="itensnav" href="/operacoes/am.html">AM</a></li>
                        <li><a class="itensnav" href="/operacoes/pe.html">PE</a></li>
                        <li><a class="itensnav" href="/operacoes/mc.html">MC</a></li>
                        <li><a class="itensnav" href="/operacoes/gao.html">GAO</a></li>
                        <li><a class="itensnav" href="/operacoes/if.html">IF</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="voltar">
            <a href="/index.html"><img src="/IMG/btn_voltar.svg" alt=""></a>
            <p>Ponto de Equilíbrio</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form action="/PHP/pe.php" method="POST">
    
                    <div class="prmej">
                        <label for="gastos_fixos">Gastos Fixos: </label>
                        <input type="number" placeholder="Adicione sua informação aqui" required id="gastos_fixos" name="gastos_fixos">
                    </div>
    
                    <div class="prmrj">
                        <label for="margem_contribuicao">Margem de contribuição: </label>
                        <input type="number" placeholder="Adicione sua informação aqui" required id="margem_contribuicao" name="margem_contribuicao">
                    </div>
    
                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>
                    
                </form>
            </div>
            <div class="resultado">
                <p>Seu ponto de equilibrio é</p>
                <span><?= $coresultFormatado ?></span>
            </div>
        </div>
    </body>
</html>