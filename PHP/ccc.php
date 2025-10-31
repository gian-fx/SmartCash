<?php
error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['pme']) && !empty($_POST['pme'])) {

        $pme = $_POST['pme'];
    } else {

        $pme = $nada;
    }

    if (isset($_POST['pmr']) && !empty($_POST['pmr'])) {

        $pmr = $_POST['pmr'];
    } else {

        $pmr = $nada;
    }

    if (isset($_POST['pmp']) && !empty($_POST['pmp'])) {

        $pmp = $_POST['pmp'];
    } else {

        $pmp = $nada;
    }

    $cccresult = $pme + $pmr - $pmp

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/style.css">
        <link rel="stylesheet" href="/CSS/gian.css">
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
            <p>Ciclo de Conversão de Caixa</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form method="POST" action="/PHP/ccc.php">
                    <div class="pme">
                        <input required type="number" placeholder="Adicione sua informação aqui" id="pme" name="pme">
                        <label for="pme">Prazo Médio de Estoque (Dias)</label>
                    </div>

                    <div class="pmr">
                        <label for="pmr">Prazo Médio de Recebimento (Dias)</label>
                        <input required type="number" placeholder="Adicione sua informação aqui" id="pmr" name="pmr">
                    </div>

                    <div class="pmp">
                        <label for="pmp">Prazo Médio de Pagamento (Dias)</label>
                        <input required type="number" placeholder="Adicione sua informação aqui" id="pmp" name="pmp">
                    </div>

                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>

                </form>

            </div>

            <div class="resultado">
                    <p>Seu ciclo de Conversão de Caixa é</p>
                    <span><?= $cccresult ?></span>
            </div>
        </div>

    </body>
</html>