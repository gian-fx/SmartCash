<?php
error_reporting(0);
ini_set('display_errors', 0);

$nada = "Dado não informado!";

$exibir = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['pv']) && !empty($_POST['pv'])) {
        $precovenda = $_POST['pv'];
    } else {
        $precovenda = $nada;
    }

    if (isset($_POST['gv']) && !empty($_POST['gv'])) {
        $gastovariavel = $_POST['gv'];
    } else {
        $gastovariavel = $nada;
    }

    if (isset($_POST['qntd']) && !empty($_POST['qntd'])) {
        $qntd = $_POST['qntd'];
    } else {
        $qntd = $nada;
    }

    

    $mcresult = $precovenda - $gastovariavel;
    
    $mctotalresult = $mcresult * $qntd;
    $formatado = number_format($mctotalresult, 2, ',', '.');
    $mctotalresult = $formatado;
    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/style.css">
        <link rel="stylesheet" href="/CSS/jose.css">
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
            <a href="/index.html"><img src="/IMG/btn_voltar.svg" alt=""></a>
            <p>Margem de Contribuição</p>
        </div>

        <div class="formgrid">
            <div class="formcontainer">
                <form action="/PHP/mc.php" method="POST">
                
                    <div class="pv">
                        <label class="pv" for="pv">Preço de Venda</label>
                        <input class="pv" type="text" placeholder="Adicione sua informação aqui" required id="pv" name="pv">
                    </div>
                
                    <div class="gv">
                        <label class="gv" for="gv">Gasto Variavel</label>
                        <input class="gv" type="text" placeholder="Adicione sua informação aqui" required id="gv" name="gv">
                    </div>

                    <div class="qntd">
                        <label class="qntd" for="qntd">Quantidade </label>
                        <input class="qntd" type="number" placeholder="Adicione sua informação aqui" required id="qntd" name="qntd">
                    </div>
                
                    <div class="btn">
                        <button type="submit">ENVIAR</button>
                    </div>
                    
                </form>

            </div>

        <div class="resultado">
            <p>Sua Margem de Contribuição é</p>
            <p><?= $mcresult ?></p>
            <p>Sua Margem de Contribuição Total é</p>
            <p><?= $mctotalresult ?></p>
        </div>
            
        </div>
    </body>
</html>