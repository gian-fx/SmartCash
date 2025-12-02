<?php

function to_float($valor)
{
    $valor = str_replace(',', '.', $valor); // substitui vírgula por ponto
    return (float)$valor;
}

$pmeV = to_float($_POST['pmeV'] ?? 0);
$pmrV = to_float($_POST['pmrV'] ?? 0);
$pmpV = to_float($_POST['pmpV'] ?? 0);



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
    $cccresult = $pme + $pmr - $pmp;


    // CCO VALOR

    if (isset($_POST['pmeV']) && !empty($_POST['pmeV'])) {

        $pmeV = $_POST['pmeV'];
        $pmeV = ($pmeV * $pme) / 360;
        
    } else {

        $pmeV = $nada;
    }

    if (isset($_POST['pmrV']) && !empty($_POST['pmrV'])) {

        $pmrV = $_POST['pmrV'];
        $pmrV = ($pmrV * $pmr) / 360;
    } else {

        $pmrV = $nada;
    }

    if (isset($_POST['pmpV']) && !empty($_POST['pmpV'])) {

        $pmpV = $_POST['pmpV'];
        $pmpV = ($pmpV * $pmp) / 360;
    } else {

        $pmpV = $nada;
    }

    $cccValorresult = $pmeV + $pmrV - $pmpV;
    $formatado = number_format($cccValorresult, 2, ',', '.');
    $cccValorresult = $formatado;
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
        <a href="/operacoes/ccc.html"><img src="/IMG/btn_voltar.svg" alt=""></a>
        <p>Ciclo de Conversão de Caixa</p>
    </div>

    <div class="formgrid">
        <div class="resultado">
            <p>Seu Ciclo de Conversão de Caixa de Tempo é</p>
            <p class="results destaque"><?= $cccresult ?> DIAS</p>
            <p>Seu Ciclo de Conversão de Caixa de Valor é</p>
            <p class="results destaque"><?= $cccValorresult ?> REAIS</p>
        </div>
    </div>

</body>

</html>