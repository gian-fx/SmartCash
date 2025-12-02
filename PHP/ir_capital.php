<?php
error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['lucro']) && !empty($_POST['lucro'])) {

        $lucro = $_POST['lucro'];
    } else {

        $lucro = $nada;
    }

    if (isset($_POST['patrimonio_liquido']) && !empty($_POST['patrimonio_liquido'])) {

        $patrimonio_liquido = $_POST['patrimonio_liquido'];
    } else {

        $patrimonio_liquido = $nada;
    }

    
    $mult = 100;
    $result = $lucro / $patrimonio_liquido;
    $result_percentual = $result * $mult;

    $formatado = number_format($result, 3, ',', '.');
    $formatado2 = number_format($result_percentual, 2, ',', '.');
    $result = $formatado;
    $result_percentual = $formatado2;

    
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/style.css">
        <link rel="stylesheet" href="/CSS/mussio.css">

        
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
            <a href="/operacoes/indice_rentabilidade.html"><img src="/IMG/btn_voltar.svg" alt=""></a>
            <p>Rentabilidade do Capital de Giro</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form method="POST" action="/PHP/ir_capital.php">
                    <div class="input">
                        <label for="lucro">Lucro</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="lucro" name="lucro">
                    </div>

                    <div class="input">
                        <label for="patrimonio_liquido">Patrimônio Liquido</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="patrimonio_liquido" name="patrimonio_liquido">
                    </div>


                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>

                </form>

            </div>

            <div class="resultado">
                    <p>A Rentabilidade do Capital de Giro é:</p>
                    <span><p><?= $result ?></p></span>
                    <p>ou</p>
                    <span><p><?= $result_percentual ?>%</p></span>
            </div>
        </div>

    </body>
</html>