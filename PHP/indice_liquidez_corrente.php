<?php
$result = ""; // valor padrão (vazio)

// Verifica se enviou o formulário
if (isset($_POST["atc"]) && isset($_POST["pc"])) {

    $atc = $_POST["atc"];
    $pc = $_POST["pc"];

    // Converte vírgula para ponto
    $atc = str_replace(",", ".", $atc);
    $pc  = str_replace(",", ".", $pc);

    // Verifica se são numéricos
    if (!is_numeric($atc) || !is_numeric($pc)) {
        $result = "Digite apenas números válidos.";
    }
    elseif ($pc == 0) {
        $result = "Erro: Divisão por zero.";
    }
    else {
        // Cálculo do índice de liquidez corrente
        $ilc = $atc / $pc;

        // Formatação com 2 casas decimais
        $result = number_format($ilc, 2, ',', '.');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/style.css">
        <link rel="stylesheet" href="/CSS/gian.css">
        <link rel="stylesheet" href="/CSS/if.css">
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
            <a href="/operacoes/indice_liquidez.html"><img src="/IMG/btn_voltar.svg" alt=""></a>
            <p>Indice de Liquidez Corrente</p>
        </div>

    <div class="formgrid">
        <div class="formcontainer">
            <form method="POST" action="/PHP/indice_liquidez_corrente.php">
                <div class="pme">
                    <label for="atc">Ativo Circulante</label>
                    <input required type="text" placeholder="Adicione sua informação aqui" id="atc" name="atc">
                </div>

                <div class="pmr">
                    <label for="pc">Passivo Circulante</label>
                    <input required type="text" placeholder="Adicione sua informação aqui" id="pc" name="pc">
                </div>

                <div class="btn">
                    <button type="submit">ENVIAR</button>
                </div>
            </form>
        </div>

        <div class="resultado_lc">
            <p>Índice de Liquidez Corrente:</p>
            <span class="resultadolcc"><?= $result ?></span>
        </div>
    </div>
  </body>
</html>
