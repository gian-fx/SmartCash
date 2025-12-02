<?php 


function to_float($valor)
{
    $valor = str_replace(',', '.', $valor); // substitui vírgula por ponto
    return (float)$valor;
}

$pmeV = to_float($_POST['prmeV'] ?? 0);
$pmrV = to_float($_POST['prmrV'] ?? 0);

error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['prme']) && !empty($_POST['prme'])) {
        $prme = $_POST['prme'];
    } else {
        $prme = $nada;
    }

    if (isset($_POST['prmr']) && !empty($_POST['prmr'])) {
        $prmr = $_POST['prmr'];
    } else {
        $prmr = $nada;
    }

    $coresult = $prme + $prmr;

    // CO de VALOR
     if (isset($_POST['prmeV']) && !empty($_POST['prmeV'])) {
        $prmeV = $_POST['prmeV'];
        $prmeV = ($prmeV * $prme) / 360;
    } else {
        $prmeV = $nada;
    }

    if (isset($_POST['prmrV']) && !empty($_POST['prmrV'])) {
        $prmrV = $_POST['prmrV'];
        $prmrV = ($prmrV * $prmr) / 360;
    } else {
        $prmrV = $nada;
    }

    $coValorresult = $prmeV + $prmrV;
    $formatado = number_format($coValorresult, 2, ',', '.');
    $coValorresult = $formatado;
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

                <div class="prmej">
                    <label for="prme">Preço Médio de Estoque </label>
                    <input type="number" placeholder="Adicione sua informação aqui" required id="prme" name="prme">
                </div>

                <div class="prmrj">
                    <label for="prmr">Preço Médio de Recebimento </label>
                    <input type="number" placeholder="Adicione sua informação aqui" required id="prmr" name="prmr">
                </div>
                <!-- CO de VALOR -->
                <div class="prmej">
                    <label for="prmeV">Preço Médio de Estoque (VALOR)</label>
                    <input type="text" placeholder="Adicione sua informação aqui" required id="prme" name="prmeV">
                </div>

                <div class="prmrj">
                    <label for="prmrV">Preço Médio de Recebimento (VALOR)</label>
                    <input type="text" placeholder="Adicione sua informação aqui" required id="prmr" name="prmrV">
                </div>

                <div class="btn">
                    <button type="submit">ENVIAR</button>
                </div>
                
            </form>
        </div>
        <div class="resultado">
            <p>Seu Ciclo de Operação de Tempo é</p>
            <p><?= $coresult ?> Dias</p>
            <p>Seu Ciclo de Operação de Valor é</p>
            <p><?= $coValorresult ?> Reais</p>
        </div>
    </div>
</body>

</html>
