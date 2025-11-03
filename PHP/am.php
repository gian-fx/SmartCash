<?php
error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $qtdUnidades = $_POST['unidades'];    
    $precoUnitario = $_POST['preco'];
    $gastoVariavel = $_POST['gv'];
    $gastoFixo = $_POST['gf'];
    
    if (isset($qtdUnidades) && isset($precoUnitario) && isset($gastoVariavel) && isset($gastoFixo) ) {

        $receitaTotal = $qtdUnidades * $precoUnitario; // calcular a receita total unidade vendida x preço unitario
        $custoTotal = $gastoFixo + $gastoVariavel; // Custo total gasto fixo + gasto variavel 
        $lucroTotal = $receitaTotal - $custoTotal; // lucro total(fianl) receito total(unidades x preco) menos custo total (gf + gv)
        $analiseMarginal = $lucroTotal / $qtdUnidades; // Descobrir com qual valor o produto passa a gerar lucro 
    } else {
        $nada;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/vini.css">
    <title>Analise Marginal</title>
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
        </div>



        <div class="resultado">
            <h1>Análise Marginal</h1>
            <p>A receita total da empresa é: <p class="results"><?=$receitaTotal?></p></p>
            <p>O custo total da empresa é: <p class="results"><?=$custoTotal?></p></p>
            <p>O lucro total da empresa é: <p class="results"><?=$lucroTotal?></p></p>
            <p>A analise marginal da empresa é: <p class="results"><?=$analiseMarginal?></p></p>
        </div>

    
</body>
</html>