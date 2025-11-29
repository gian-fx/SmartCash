<?php
$result = "";

if (isset($_POST["atc"]) && isset($_POST["estoque"]) && isset($_POST["pc"])) {

    // Recebe valores
    $ac = $_POST["atc"];
    $estoque = $_POST["estoque"];
    $pc = $_POST["pc"];

    // Converte vírgulas em pontos
    $ac = str_replace(",", ".", $ac);
    $estoque = str_replace(",", ".", $estoque);
    $pc = str_replace(",", ".", $pc);

    // Validação
    if (!is_numeric($ac) || !is_numeric($estoque) || !is_numeric($pc)) {
        $result = "Digite apenas números válidos.";
    }
    elseif ($pc == 0) {
        $result = "Erro: Passivo Circulante não pode ser zero.";
    }
    else {
        // Fórmula: (AC - estoque) / PC
        $il_seca = ($ac - $estoque) / $pc;

        // Formatar com 2 casas
        $result = number_format($il_seca, 2, ',', '.');
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
        <p>Índice de Liquidez Seca</p>
    </div>

    <div class="formgrid">
        <div class="formcontainer">
            <form method="POST" action="/PHP/indice_liquidez_secaUPD.php">

                <div class="pme">
                    <label for="atc">Ativo Circulante</label>
                    <input required type="text" id="atc" name="atc" placeholder="Digite aqui">
                </div>

                <div class="pme">
                    <label for="estoque">Estoque</label>
                    <input required type="text" id="estoque" name="estoque" placeholder="Digite aqui">
                </div>

                <div class="pmr">
                    <label for="pc">Passivo Circulante</label>
                    <input required type="text" id="pc" name="pc" placeholder="Digite aqui">
                </div>

                <div class="btn">
                    <button type="submit">ENVIAR</button>
                </div>

            </form>
        </div>

        <div class="resultado_lc">
            <p>Índice de Liquidez Seca:</p>
            <span class="resultadolcc"><?= $result ?></span>
        </div>

    </div>

</body>
</html>
