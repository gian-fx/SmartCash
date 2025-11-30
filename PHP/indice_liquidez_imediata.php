<?php
$result = ""; // valor inicial vazio

if (isset($_POST["disp"]) && isset($_POST["pc"])) {

    // Recebe os valores
    $disp = $_POST["disp"];
    $pc = $_POST["pc"];

    // Converte vírgula para ponto
    $disp = str_replace(",", ".", $disp);
    $pc = str_replace(",", ".", $pc);

    // Valida se são números
    if (!is_numeric($disp) || !is_numeric($pc)) {
        $result = "Digite apenas números válidos.";
    }
    elseif ($pc == 0) {
        $result = "Erro: Passivo Circulante não pode ser zero.";
    }
    else {
        // Fórmula: Disponível / Passivo Circulante
        $li_imediata = $disp / $pc;

        // Formatação (2 casas decimais, vírgula, ponto)
        $result = number_format($li_imediata, 2, ',', '.');
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
            <p>Indice de Liquidez Imediata</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form method="POST" action="/PHP/indice_liquidez_imediata.php">
                    <div class="pme">
                        <label for="disp">Disponivel</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="disp" name="disp">
                    </div>

                    <div class="pmr">
                        <label for="pc">Passivo circulante</label>
                        <input required type="text" placeholder="Adicione sua informação aqui" id="pc" name="pc">
                    </div>


                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>

                </form>

            </div>

            <div class="resultado_lc">
                    <p>O Indice de Liquidez Imediata é :</p>
                    <span class="resultadolcc" ><?= $result ?></span>
            </div>
        </div>

    </body>
</html>