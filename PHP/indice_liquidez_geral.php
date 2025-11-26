<?php
$result = "";

if (
    isset($_POST["atc"]) &&
    isset($_POST["rlp"]) &&
    isset($_POST["pc"]) &&
    isset($_POST["pnc"])
) {

    $atc = $_POST["atc"];
    $rlp = $_POST["rlp"];
    $pc  = $_POST["pc"];
    $pnc = $_POST["pnc"];

    $atc = str_replace(",", ".", $atc);
    $rlp = str_replace(",", ".", $rlp);
    $pc  = str_replace(",", ".", $pc);
    $pnc = str_replace(",", ".", $pnc);

    if (!is_numeric($atc) || !is_numeric($rlp) || !is_numeric($pc) || !is_numeric($pnc)) {
        $result = "Digite apenas números válidos.";
    }
    elseif (($pc + $pnc) == 0) {
        $result = "Erro: divisão por zero.";
    }
    else {
        $ilg = ($atc + $rlp) / ($pc + $pnc);
        $result = number_format($ilg, 2, ',', '.');
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
            <p>Índice de liquidez geral</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form method="POST" action="/PHP/indice_liquidez_geral.php">
                    <div class="pme">
                        <label for="atc">Ativo Circulante</label>
                        <input required type="text" id="atc" name="atc" placeholder="Adicione sua informação aqui">
                    </div>

                    <div class="pmr">
                        <label for="rlp">Ativo não circulante (RLP)</label>
                        <input required type="text" id="rlp" name="rlp" placeholder="Adicione sua informação aqui">
                    </div>

                    <div class="pmr">
                        <label for="pc">Passivo Circulante</label>
                        <input required type="text" id="pc" name="pc" placeholder="Adicione sua informação aqui">
                    </div>

                    <div class="pmr">
                        <label for="pnc">Passivo não circulante</label>
                        <input required type="text" id="pnc" name="pnc" placeholder="Adicione sua informação aqui">
                    </div>

                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>

            <div class="resultado_lc">
                <p>O Índice de Liquidez Geral é:</p>
                <span class="resultadolcc"><?= $result ?></span>
            </div>
        </div>

    </body>
</html>
