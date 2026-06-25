<?php include "../../administrar/conexao.php";?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerador de Cartela de bingo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="site.css" />
    <script src="site.js"></script>
</head>

<body>
    <div class="site-top hidden-print">
        <div class="page-header">
            <h1> Gerador de Cartela de Bingo!</h1>
        </div>
        <div class="col-md-12" >
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomeBingo">Nome do Bingo!</label>
                    <input type="text" class="form-control" id="nomeBingo"
                        placeholder="Digite aqui o nome do seu bingo">
                </div>
                <div class="form-group" >
                    <label for="qtdCartelas">Quantidade de cartelas</label>
                    <input type="number" min="1" max="100" class="form-control" id="qtdCartelas"
                        placeholder="Digite aqui a quantidade de cartelas">
                </div>
                <div class="form-group" >
                        <label for="imgCartela">Url para a imagem central</label>
                        <input type="url" min="1" max="100" class="form-control" id="imgCartela"
                            placeholder="url para customizar a imagem">
                    </div>
                <button class="btn btn-primary" onclick="clickStart()"> Gerar Cartelas</button>
                <button class="btn btn-secondary" onclick="window.print()">Imprimir</button>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="casasBingo">Lista de casas</label>
                    <textarea class="form-control" id="casasBingo"
                        placeholder="Digite aqui a lista de valores das casas"></textarea>
                </div>
            </div>
        </div>
    </div>


    <div id="output">

        <?php 

        $RSS = mysql_query("select * from bin_cartelas ", $conexao);
        while($RS = mysql_fetch_array($RSS)){?>

                    <div class="cartela">
                    <h2 class="cartela-titulo"><?php echo $RS['cd_cartela']." - ".$RS['cd_codigo'];?></h2>

                    <div class="cartela-corpo">
                    <?php 
                    $RSSN = mysql_query("select * from bin_numeros_cartela where cd_codigo = '".$RS['cd_codigo']."' and cd_cartela = '".$RS['cd_cartela']."'  ", $conexao);
                    $RSN = mysql_fetch_assoc($RSSN);

                    $numerosB = split(",", $RSN['numeros_b']);
                    $numerosI = split(",", $RSN['numeros_i']);
                    $numerosN = split(",", $RSN['numeros_n']);
                    $numerosG = split(",", $RSN['numeros_g']);
                    $numerosO = split(",", $RSN['numeros_o']);

                    foreach ($variable as $key => $value) {
                        # code...
                    }

                    // bagunça
                    shuffle($numerosB);
                    shuffle($numerosI);
                    shuffle($numerosN);
                    shuffle($numerosG);
                    shuffle($numerosO);

                    // pega os 5 primeiros números
                    for ($i=0; $i<5; $i++) {
                        $numeros1 = $numerosB[$i];
                        $numeros2 = $numerosI[$i];
                        $numeros3 = $numerosN[$i];
                        $numeros4 = $numerosG[$i];
                        $numeros5 = $numerosO[$i];
                    }
                    ?>

                    <div class="cartela-linha">
                        <div class="cartela-casa"><?php echo $numeros1;?></div>
                        <div class="cartela-casa"><?php echo $numeros2;?></div>
                        <div class="cartela-casa"><?php echo $numeros3;?></div>
                        <div class="cartela-casa"><?php echo $numeros4;?></div>
                        <div class="cartela-casa"><?php echo $numeros5;?></div>
                    </div>

                        <div class="cartela-linha">
                            <div class="cartela-casa"><?php echo $numeros1;?></div>
                            <div class="cartela-casa">5</div>
                            <div class="cartela-casa">58</div>
                            <div class="cartela-casa">7</div>
                            <div class="cartela-casa">4</div>
                        </div>

                        <div class="cartela-linha">
                            <div class="cartela-casa">54</div>
                            <div class="cartela-casa">5</div>
                            <div class="cartela-casa cartela-casa-img">
                                <img src="logo.png">
                            </div>
                            <div class="cartela-casa">5</div>
                            <div class="cartela-casa">7</div>
                        </div>

                        <div class="cartela-linha">
                            <div class="cartela-casa">5</div>
                            <div class="cartela-casa">5</div>
                            <div class="cartela-casa">8</div>
                            <div class="cartela-casa">7</div>
                            <div class="cartela-casa">54</div>
                        </div>

                        <div class="cartela-linha">
                            <div class="cartela-casa">30</div>
                            <div class="cartela-casa">4</div>
                            <div class="cartela-casa">1</div>
                            <div class="cartela-casa">5</div>
                            <div class="cartela-casa">4</div>
                        </div>

                    </div>
                
                </div>
        <?php }?>


    </div>
</body>
</html>