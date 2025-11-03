<?php 
error_reporting(0);
ini_set('display_errors', 0);

$coresult = 0;

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pme']) && !empty($_POST['pme'])) {
        $pv = $_POST['pme'];
    } else {
        $pv = $nada;
    }

    if (isset($_POST['pmr']) && !empty($_POST['pmr'])) {
        $gv = $_POST['pmr'];
    } else {
        $gv = $nada;
    }

    $coresult = $pme + $pmr;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/jose.css">
    <link rel="stylesheet" href="/CSS/style.css">
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
        <p>Ciclo Operacional</p>
    </div>

    <div class="formgrid">
        <div class="formcontainer">
            <form action="/PHP/co.php" method="post">

                <div class="pme">
                    <label for="pme">Preço Médio de Estoque </label>
                    <input type="number" placeholder="Adicione sua informação aqui" required id="pme" name="pme">
                </div>

                <div class="pmr">
                    <label for="pmr">Preço Médio de Recebimento </label>
                    <input type="number" placeholder="Adicione sua informação aqui" required id="pmr" name="pmr">
                </div>

                <div class="btn">
                    <button type="submit">ENVIAR</button>
                </div>
                
            </form>
        </div>
        <div class="resultado">
            <p>Seu Ciclo de Operação é</p>
            <span><?= $coresult ?></span>
        </div>
    </div>
</body>

</html>
