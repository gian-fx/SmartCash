<?php
error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['pc']) && !empty($_POST['pc'])) {

        $pc = $_POST['pc'];
    } else {

        $pc = $nada;
    }

    if (isset($_POST['pnc']) && !empty($_POST['pnc'])) {

        $pnc = $_POST['pnc'];
    } else {

        $pnc = $nada;
    }

    if (isset($_POST['pl']) && !empty($_POST['pl'])) {

        $pl = $_POST['pl'];
    } else {

        $pl = $nada;
    }

    $mult = 100;
    $pcpncresult = $pc + $pnc;
    $pctresult = $pcpncresult / $pl;
    $pctresultpercent = $pctresult * $mult;

    $formatado = number_format($pctresult, 3, ',', '.');
    $formatado2 = number_format($pctresultpercent, 2, ',', '.');
    $ceresult = $formatado;
    $ceresultpercent = $formatado2;
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
            <a href="/operacoes/indice_endividamento.html"><img src="/IMG/btn_voltar.svg" alt=""></a>
            <p>Participação de Capital de Terceiros</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form method="POST" action="/PHP/if_pct.php">
                    <div class="pc">
                        <label for="pc">Passivo Circulante</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="pc" name="pc">
                    </div>

                    <div class="pnc">
                        <label for="pnc">Passivo Não Circulante</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="pnc" name="pnc">
                    </div>

                    <div class="pl">
                        <label for="pl">Patrimônio Líquido</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="pl" name="pl">
                    </div>

                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>

                </form>

            </div>

            <div class="resultado_lc">
                    <p>A Participação de Capital de Terceiros é:</p>
                    <span class="resultadolcc"><?= $formatado ?> ou <?= $formatado2 ?>%</span>
            </div>
        </div>

    </body>
</html>