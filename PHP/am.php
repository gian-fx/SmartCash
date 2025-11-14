<?php


$qtd_atual               = $_POST['qtd_atual'] ?? null;
$qtd_proposta            = $_POST['qtd_proposta'] ?? null;
$preco_atual             = $_POST['preco_atual'] ?? null;
$preco_proposto          = $_POST['preco_proposto'] ?? null;
$inadimplencia_atual     = $_POST['inadimplencia_atual'] ?? null;
$inadimplencia_proposta  = $_POST['inadimplencia_proposta'] ?? null;
$prazo_atual             = $_POST['prazo_atual'] ?? null;
$prazo_proposto          = $_POST['prazo_proposto'] ?? null;
$gasto_unitario_atual    = $_POST['gasto_unitario_atual'] ?? null;
$gasto_unitario_proposto = $_POST['gasto_unitario_proposto'] ?? null;
$taxa_financeira         = $_POST['taxa_financeira'] ?? null;

// VERIFICAÇÃO CORRETA
$campos = [
    'qtd_atual' => $qtd_atual,
    'qtd_proposta' => $qtd_proposta,
    'preco_atual' => $preco_atual,
    'preco_proposto' => $preco_proposto,
    'inadimplencia_atual' => $inadimplencia_atual,
    'inadimplencia_proposta' => $inadimplencia_proposta,
    'prazo_atual' => $prazo_atual,
    'prazo_proposto' => $prazo_proposto,
    'gasto_unitario_atual' => $gasto_unitario_atual,
    'gasto_unitario_proposto' => $gasto_unitario_proposto,
    'taxa_financeira' => $taxa_financeira
];

foreach ($campos as $nome => $valor) {
    if ($valor === null || $valor === '') {
        echo "⚠️ Faltam informações para os cálculos: <b>$nome</b>";
        exit;
    }
}

// Converte %
$inadimplencia_atual /= 100;
$inadimplencia_proposta /= 100;
$taxa_financeira /= 100;

// 1️⃣ RECEITA LÍQUIDA
$receita_atual    = $qtd_atual * $preco_atual * (1 - $inadimplencia_atual);
$receita_proposta = $qtd_proposta * $preco_proposto * (1 - $inadimplencia_proposta);

// 2️⃣ CUSTO TOTAL
$custo_atual    = $qtd_atual * $gasto_unitario_atual;
$custo_proposta = $qtd_proposta * $gasto_unitario_proposto;

// 3️⃣ LUCRO
$lucro_atual    = $receita_atual - $custo_atual;
$lucro_proposta = $receita_proposta - $custo_proposta;

// 4️⃣ CUSTO FINANCEIRO
$fin_atual = ($qtd_atual * $preco_atual * ($prazo_atual / 360)) * $taxa_financeira;
$fin_proposta = ($qtd_proposta * $preco_proposto * ($prazo_proposto / 360)) * $taxa_financeira;

// 5️⃣ ANÁLISE MARGINAL
$analise_marginal = ($lucro_proposta - $lucro_atual) - ($fin_proposta - $fin_atual);

function moeda($v){
    return "R$ " . number_format($v, 2, ',', '.');
}

$lucro_liquido_formatado = moeda($analise_marginal);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/vini.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Resultado - Análise Marginal</title>
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


<div class="resultado">
     <h1>Análise Marginal Completa</h1>

    <p>
        Lucro Líquido da Proposta: 
        <span class="results destaque"><?= $lucro_liquido_formatado ?></span>
    </p>

</div>


</body>
</html>
