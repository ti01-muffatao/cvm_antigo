<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('sair.php', '_self');</script>";}


?>

<script language="javascript">
    //setTimeout("document.location = 'index.php'",10);

</script>

<!--
**********************************************
CONTEUDO VISIVEL SOMENTE PARA USUARIOS LOGADOS 
**********************************************
--->
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html charset=utf-8">
    <meta http-equiv="content-language" content="pt-BR">
    <title><?php echo $Titulo;?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
    <meta http-equiv="content-language" content="pt" />
    <meta itemprop="description" name="description" content="" />
    <meta name="robots" content="no follow" />
    <!-- mobile  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <!-- ######### ESTILO CSS ######### -->
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!-- ESTILO RESPONSIVO -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <!-- MEGA MENU -->
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    <!-- SLIDER -->
    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/css/style.css" media="screen" />
    <!-- CONFIGURAÇÃO SLIDER -->
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
    <!-- ICONES -->
    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <!-- flexslider -->
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
    <!-- Accordions -->
    <link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs10.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
    <!-- ######### ARQUIVOS JS ######### -->
    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <!-- style switcher -->
    <script src="js/style-switcher/jquery-1.js"></script>
    <script src="js/style-switcher/styleselector.js"></script>
    <script src="js/universal/tooltip.js"></script>
    <!-- mega menu -->
    <script src="js/mainmenu/bootstrap.min.js"></script>
    <script src="js/mainmenu/customeUI.js"></script>
    <!-- sticky menu -->
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>
    <!-- scroll up -->
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
    <!-- Flexslider -->
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/flexslider/custom.js"></script>
</head>

<body style="margin-top:-25px;">
    <?php include "menu.php";?>
    <div class="clearfix"></div>
    <!--- INICIO PAGINA --->
    <!--- INICIO TABELA DE PONTOS *** LISTAR TODOS OS GRUPOS DO ESTADO *** --->
    <div class="section_holdergrupos">
        <div class="container">
            <div class="one_full">
            <h3>Parciais Grupos Gerais até
            <?php 
                $SQL = "select cd_parcial, dt_data as data from pontuacao order by dt_data desc, cd_parcial desc limit 1"; 
                $RSS = mysql_query($SQL, $conexao);
                while($RS = mysql_fetch_array($RSS)){
                    $parcial = $RS["cd_parcial"]; 
                    if($RS["cd_parcial"] <= 9) {					 
                        $parcial = "0".$RS["cd_parcial"]; 
                    }?>
                <font color="#C30009">
                <a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();>
                <?php 
                    echo date("d-m-Y", strtotime($RS["data"]));
                }
            ?> 
            </a>
          </font>
              </h3>
              <!-- Abas com os grupos -->
              <ul class="tabs7">
                <li><a href="#grupo-1" target="_self">Grupo 01</a></li>
                <li><a href="#grupo-2" target="_self">Grupo 02</a></li>
                <li><a href="#grupo-3" target="_self">Grupo 03</a></li>
                <li><a href="#grupo-4" target="_self">Grupo 04</a></li>
                <li><a href="#grupo-5" target="_self">Grupo 05</a></li>
                <li><a href="#grupo-6" target="_self">GDM</a></li>
              </ul>
              <div class="tabs-content7">
                <!-- INICIO GRUPO 1 -->
                <div id="grupo-1" class="tabs-panel7">
                    <p>
                    <?php 
                    $premio = array(800,700,600,550,500,400,400,400,350,350);
                    $RSS = mysql_query("select * from grupos where cd_grupo = 1 order by cd_grupo asc", $conexao);
                    while($RS = mysql_fetch_array($RSS)){
		          ?>
                  <h3>Grupo 01</h3>
                  <?php
                    echo "<h5>Meta Mínima: ".number_format($RS["vl_metam"],0,"",".")."</h5>";
                    echo "<h5>Meta Geral: ".number_format($RS["vl_metag"],0,"",".")."</h5>";
                    $metageralgrupo = $RS["vl_metag"];
                    $metaminima 	= $RS["vl_metam"];
                    }
		              ?>
                        <div class="table-style">
                            <table class="table-list2">
                                <tr>
                                    <th>Ranking</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sup.</th>
                                    <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                                    while($RS = mysql_fetch_array($RSS)){
                                    $i = $i + 1;
                                    $forne[$i] = $RS["cd_fornecedor"]; ?>
                                    <th><?php echo $RS["ds_razao"];?></th>
                                    <?php }?>
                                    <th>Total</th>
                                    <th>Premiação</th>
                                </tr>
                                <?php 
                                $pontuacao_panetone = 0;
                                $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao, sum(p.cd_pontos) as pontos, u.pontuacao_panetone from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 1 ";
                $SQL .= " group by u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao order by pontos desc";
                $RSS = mysql_query($SQL, $conexao);
                                
                            
                while($RS = mysql_fetch_array($RSS)){
                    $x = $x + 1;
                    $tt = $tt + $RS["pontos"] + $RS["pontuacao_panetone"];
                    $pontuacao_panetone += $RS["pontuacao_panetone"];                  
                    //$sumPremiacao  = $premio + $premio;                    
                    ?>
                    <tr>
                        <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $x;?>º</td>
                        <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["cd_codigo"];?></td>
                        <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["ds_usuario"];?></td>
                        <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo BuscaDSSupervisor($RS["cd_supervisor"]);?>
                        </td>
                    <?php for($k = 1; $k <= $i; $k++){
                    $SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."' ";
                        //$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
                        $RQQ = mysql_query($SQQ, $conexao);
                        $RQ = mysql_fetch_assoc($RQQ);
                        //TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
                        $total = $RS["pontos"];
                        $meta = $metageralgrupo;
                        //MENSAGEM SE ATINGIR META MINIMA
                        $cor = '';
                        if($RQ["pt"] >= $metaminima){
                            $cor = "#29fb84";
                        }else{
                            $cor = "#f3715e";
                        }
                        //MENSAGEM SE ATINGIR META GERAL
                        $corTotal = '';
                        if($total >= $meta){
                            $corTotal = "#29fb84";
                        } else {
                            $corTotal = "#f3715e";
                        }
                        ?>
                        <td style="background:<?php echo $cor;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php if($forne[$k] == '000305'){ echo number_format(round($RQ["pt"] + $RS["pontuacao_panetone"]), 0, '', '.'); }else{ echo number_format(round($RQ["pt"]), 0, '', '.'); }?></td>
                        <?php }?>
                        <td style="background:<?php echo $corTotal;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo number_format(round($RS["pontos"] + $RS["pontuacao_panetone"]), 0, '', '.');?></td>                       

                        <td style="background: #0fafc7;">R$ <?php if(isset($premio[$ns-0])) { echo $premio[$ns-0]; };?></td>
                    </tr>
                    <?php $ns++; }?>
                    <tr>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php for($w = 1; $w <= $i; $w++){
                        $SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo ";
                        $SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 1 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
                        $RQW = mysql_query($SQW, $conexao);
                        $RW = mysql_fetch_assoc($RQW);                                         
                        if($forne[$w] == '000305'){
                            echo "<th>".number_format(round($RW["pts"] + $pontuacao_panetone), 0, '', '.')."</th>";
                        }else{
                            echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
                        }
                        }?>
                                    <th><?php echo number_format(round($tt), 0, '', '.');?></th>
                                    <th></th>
                                </tr>
                            </table>
                            <?php unset($tt, $w, $i, $forne, $k, $meta, $x, $total, $metaminima, $metageralgrupo, $cor, $corTotal, $sumPremiacao, $premio, $ns);?>
                        </div>
                        </p>
                    </div>
                    <!-- FIM GRUPO 1 -->

                    <!-- INICIO GRUPO 2 -->
                    <div id="grupo-2" class="tabs-panel7">
                        <p>
                            <?php 
                            $premio = array(1000,900,800,700,650,600,500,450,400,400,400);
                            $RSS = mysql_query("select * from grupos where cd_grupo = 2 order by cd_grupo asc", $conexao);
                                while($RS = mysql_fetch_array($RSS)){
			
		                  ?>
                        <h3>Grupo 02</h3>
                        <?php
                            echo "<h5>Meta Mínima: ".number_format($RS["vl_metam"],0,"",".")."</h5>";
                            echo "<h5>Meta Geral: ".number_format($RS["vl_metag"],0,"",".")."</h5>";
                            $metageralgrupo = $RS["vl_metag"];
                            $metaminima 	= $RS["vl_metam"];
                        }
		                  ?>
                        <div class="table-style">
                            <table class="table-list2">
                                <tr>
                                    <th>Ranking</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sup.</th>
                                    <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                  while($RS = mysql_fetch_array($RSS)){
                    $i = $i + 1;
                    $forne[$i] = $RS["cd_fornecedor"];?>
                                    <th><?php echo $RS["ds_razao"];?></th>
                                    <?php }?>
                                    <th>Total</th>
                                    <th>Premiação</th>
                                </tr>
                                <?php 
                                $pontuacao_panetone = 0;
                                $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao, sum(p.cd_pontos) as pontos, u.pontuacao_panetone from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 2 ";
                $SQL .= " group by u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao order by pontos desc";
                $RSS = mysql_query($SQL, $conexao);
                while($RS = mysql_fetch_array($RSS)){
                    $x = $x + 1;
                    $tt = $tt + $RS["pontos"] + $RS["pontuacao_panetone"]; 
                    $pontuacao_panetone += $RS["pontuacao_panetone"];                   
                    //$sumPremiacao   += $RS['vl_premiacao'];
                    ?>
                                <tr>                                    
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $x;?>º</td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["cd_codigo"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["ds_usuario"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo BuscaDSSupervisor($RS["cd_supervisor"]);?></td>
                                    <?php for($k = 1; $k <= $i; $k++){
                    $SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."' ";
                        //$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
                        $RQQ = mysql_query($SQQ, $conexao);
                        $RQ = mysql_fetch_assoc($RQQ);
                        //TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
                        $total = $RS["pontos"];
                        $meta = $metageralgrupo;
                        //MENSAGEM SE ATINGIR META MINIMA
                        $cor = '';
                        if($RQ["pt"] >= $metaminima){
                        $cor = "#29fb84";
                        }else{
                        $cor = "#f3715e";
                        }
                        //MENSAGEM SE ATINGIR META GERAL
                        $corTotal = '';
                        if($total >= $meta){
                        $corTotal = "#29fb84";
                        } else {
                        $corTotal = "#f3715e";
                        }
                        ?>
                                    <td style="background:<?php echo $cor;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php if($forne[$k] == '000305'){ echo number_format(round($RQ["pt"] + $RS["pontuacao_panetone"]), 0, '', '.'); }else{ echo number_format(round($RQ["pt"]), 0, '', '.'); }?></td>
                                    <?php }?>
                                    <td style="background:<?php echo $corTotal;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo number_format(round($RS["pontos"] + $RS["pontuacao_panetone"]), 0, '', '.');?></td>
                                    <td style="background: #0fafc7;">R$ <?php if(isset($premio[$ns-0])) { echo $premio[$ns-0]; };?></td>
                                </tr>
                                <?php $ns++;}?>
                                <tr>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <?php for($w = 1; $w <= $i; $w++){
                                        $SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo ";
                                        $SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 2 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
                                        $RQW = mysql_query($SQW, $conexao);
                                        $RW = mysql_fetch_assoc($RQW);
                                        if($forne[$w] == '000305'){
                                            echo "<th>".number_format(round($RW["pts"] + $pontuacao_panetone), 0, '', '.')."</th>";
                                        }else{
                                            echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
                                        }
                                    }?>
                                    <th><?php echo number_format(round($tt), 0, '', '.');?></th>
                                    <th></th>
                                </tr>
                            </table>
                            <?php unset($tt, $w, $i, $forne, $k, $meta, $x, $total, $metaminima, $metageralgrupo, $cor, $corTotal, $sumPremiacao, $premio, $ns);?>
                        </div>
                        </p>
                    </div>
                    <!-- FIM GRUPO 2 -->

                    <!-- INICIO GRUPO 3 -->
                    <div id="grupo-3" class="tabs-panel7">
                        <p>
                        <?php 
                            $premio = array(1200,1100,1000,900,800,700,600,550,500,500,450,450,450,400,400);
                            $RSS = mysql_query("select * from grupos where cd_grupo = 3 order by cd_grupo asc", $conexao);
                            while($RS = mysql_fetch_array($RSS)){
			
                        ?>
                        <h3>Grupo 03</h3>
                        <?php
                            echo "<h5>Meta Mínima: ".number_format($RS["vl_metam"],0,"",".")."</h5>";
                            echo "<h5>Meta Geral: ".number_format($RS["vl_metag"],0,"",".")."</h5>";
                            $metageralgrupo = $RS["vl_metag"];
                            $metaminima 	= $RS["vl_metam"];
                        }
                        ?>
                        <div class="table-style">
                            <table class="table-list2">
                                <tr>
                                    <th>Ranking</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sup.</th>
                                    <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                  while($RS = mysql_fetch_array($RSS)){
                    $i = $i + 1;
                    $forne[$i] = $RS["cd_fornecedor"];?>
                                    <th><?php echo $RS["ds_razao"];?></th>
                                    <?php }?>
                                    <th>Total</th>
                                    <th>Premiação</th>
                                </tr>
                                <?php 
                                $pontuacao_panetone = 0;
                                $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao, sum(p.cd_pontos) as pontos, u.pontuacao_panetone from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 3 ";
                $SQL .= " group by u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao order by pontos desc";
                $RSS = mysql_query($SQL, $conexao);
                while($RS = mysql_fetch_array($RSS)){
                    $x = $x + 1;
                    $tt = $tt + $RS["pontos"] + $RS["pontuacao_panetone"];
                    $pontuacao_panetone += $RS["pontuacao_panetone"];
                    //$sumPremiacao   += $RS['vl_premiacao'];
                    ?>
                                <tr>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $x;?>º</td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["cd_codigo"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["ds_usuario"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo BuscaDSSupervisor($RS["cd_supervisor"]);?></td>
                                    <?php for($k = 1; $k <= $i; $k++){
                    $SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."' ";
                        //$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
                        $RQQ = mysql_query($SQQ, $conexao);
                        $RQ = mysql_fetch_assoc($RQQ);
                        //TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
                        $total = $RS["pontos"];
                        $meta = $metageralgrupo;
                        //MENSAGEM SE ATINGIR META MINIMA
                        $cor = '';
                        if($RQ["pt"] >= $metaminima){
                        $cor = "#29fb84";
                        }else{
                        $cor = "#f3715e";
                        }
                        //MENSAGEM SE ATINGIR META GERAL
                        $corTotal = '';
                        if($total >= $meta){
                        $corTotal = "#29fb84";
                        } else {
                        $corTotal = "#f3715e";
                        }
                        ?>
                                    <td style="background:<?php echo $cor;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php if($forne[$k] == '000305'){ echo number_format(round($RQ["pt"] + $RS["pontuacao_panetone"]), 0, '', '.'); }else{ echo number_format(round($RQ["pt"]), 0, '', '.'); }?></td>
                                    <?php }?>
                                    <td style="background:<?php echo $corTotal;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo number_format(round($RS["pontos"] + $RS["pontuacao_panetone"]), 0, '', '.');?></td>                       
                                    <td style="background: #0fafc7;">R$ <?php if(isset($premio[$ns-0])) { echo $premio[$ns-0]; };?></td>
                                </tr>
                                <?php $ns++;}?>
                                <tr>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <?php for($w = 1; $w <= $i; $w++){
                                    $SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo ";
                                    $SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 3 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
                                    $RQW = mysql_query($SQW, $conexao);
                                    $RW = mysql_fetch_assoc($RQW);
                                    if($forne[$w] == '000305'){
                                        echo "<th>".number_format(round($RW["pts"] + $pontuacao_panetone), 0, '', '.')."</th>";
                                    }else{
                                        echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
                                    }
                        }?>
                                    <th><?php echo number_format(round($tt), 0, '', '.');?></th>
                                    <th></th>
                                </tr>
                            </table>
                            <?php unset($tt, $w, $i, $forne, $k, $meta, $x, $total, $metaminima, $metageralgrupo, $cor, $corTotal, $sumPremiacao, $premio, $ns);?>
                        </div>
                        </p>
                    </div>
                    <!-- FIM GRUPO 3 -->

                    <!-- INICIO GRUPO 4 -->
                    <div id="grupo-4" class="tabs-panel7">
                        <p>
                            <?php 
                            $premio = array(1400,1300,1200,1100,1000,900,800,700,650,600,550,550,550,550,550,550,550,500,500,500);
                            $RSS = mysql_query("select * from grupos where cd_grupo = 4 order by cd_grupo asc", $conexao);
        while($RS = mysql_fetch_array($RSS)){
			
		?>
                        <h3>Grupo 04</h3>
                        <?php
            echo "<h5>Meta Mínima: ".number_format($RS["vl_metam"],0,"",".")."</h5>";
            echo "<h5>Meta Geral: ".number_format($RS["vl_metag"],0,"",".")."</h5>";
            $metageralgrupo = $RS["vl_metag"];
            $metaminima 	= $RS["vl_metam"];
            }
		?>
                        <div class="table-style">
                            <table class="table-list2">
                                <tr>
                                    <th>Ranking</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sup.</th>
                                    <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                  while($RS = mysql_fetch_array($RSS)){
                    $i = $i + 1;
                    $forne[$i] = $RS["cd_fornecedor"];?>
                                    <th><?php echo $RS["ds_razao"];?></th>
                                    <?php }?>
                                    <th>Total</th>
                                    <th>Premiação</th>
                                </tr>
                                <?php 
                                $pontuacao_panetone = 0;
                                $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao, sum(p.cd_pontos) as pontos, u.pontuacao_panetone from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 4 ";
                $SQL .= " group by u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao order by pontos desc";
                $RSS = mysql_query($SQL, $conexao);
                while($RS = mysql_fetch_array($RSS)){
                    $x = $x + 1;
                    $tt = $tt + $RS["pontos"] + $RS["pontuacao_panetone"];
                    $pontuacao_panetone += $RS["pontuacao_panetone"];
                    $sumPremiacao   += $RS['vl_premiacao'];
                    ?>
                                <tr>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $x;?>º</td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["cd_codigo"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["ds_usuario"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo BuscaDSSupervisor($RS["cd_supervisor"]);?></td>
                                    <?php for($k = 1; $k <= $i; $k++){
                    $SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."' ";
                        //$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
                        $RQQ = mysql_query($SQQ, $conexao);
                        $RQ = mysql_fetch_assoc($RQQ);
                        //TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
                        $total = $RS["pontos"];
                        $meta = $metageralgrupo;
                        //MENSAGEM SE ATINGIR META MINIMA
                        $cor = '';
                        if($RQ["pt"] >= $metaminima){
                        $cor = "#29fb84";
                        }else{
                        $cor = "#f3715e";
                        }
                        //MENSAGEM SE ATINGIR META GERAL
                        $corTotal = '';
                        if($total >= $meta){
                        $corTotal = "#29fb84";
                        } else {
                        $corTotal = "#f3715e";
                        }
                        ?>
                                    <td style="background:<?php echo $cor;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php if($forne[$k] == '000305'){ echo number_format(round($RQ["pt"] + $RS["pontuacao_panetone"]), 0, '', '.'); }else{ echo number_format(round($RQ["pt"]), 0, '', '.'); }?></td>
                                    <?php }?>
                                    <td style="background:<?php echo $corTotal;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo number_format(round($RS["pontos"] + $RS["pontuacao_panetone"]), 0, '', '.');?></td>                       

                                    <td style="background: #0fafc7;">R$ <?php if(isset($premio[$ns-0])) { echo $premio[$ns-0]; };?></td>
                                </tr>
                                <?php $ns++; }?>
                                <tr>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <?php for($w = 1; $w <= $i; $w++){
                                    $SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo ";
                                    $SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
                                    $RQW = mysql_query($SQW, $conexao);
                                    $RW = mysql_fetch_assoc($RQW);
                                    if($forne[$w] == '000305'){
                                        echo "<th>".number_format(round($RW["pts"] + $pontuacao_panetone), 0, '', '.')."</th>";
                                    }else{
                                        echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
                                    }
                                    }?>
                                    <th><?php echo number_format(round($tt), 0, '', '.');?></th>
                                    <th></th>
                                </tr>
                            </table>
                            <?php unset($tt, $w, $i, $forne, $k, $meta, $x, $total, $metaminima, $metageralgrupo, $cor, $corTotal, $sumPremiacao, $premio, $ns);?>
                        </div>
                        </p>
                    </div>
                    <!-- FIM GRUPO 4 -->

                    <!-- INICIO GRUPO 5 -->
                    <div id="grupo-5" class="tabs-panel7">
                        <p>
                            <?php 
                            $premio = array(2000,1800,1700,1600,1500,1400,1300,1200,1200,1150,1100,1050,1000,1000,1000);
                            $RSS = mysql_query("select * from grupos where cd_grupo = 5 order by cd_grupo asc", $conexao);
        while($RS = mysql_fetch_array($RSS)){
			
		?>
                        <h3>Grupo 05</h3>
                        <?php
            echo "<h5>Meta Mínima: ".number_format($RS["vl_metam"],0,"",".")."</h5>";
            echo "<h5>Meta Geral: ".number_format($RS["vl_metag"],0,"",".")."</h5>";
            $metageralgrupo = $RS["vl_metag"];
            $metaminima 	= $RS["vl_metam"];
            }
		?>
                        <div class="table-style">
                            <table class="table-list2">
                                <tr>
                                    <th>Ranking</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sup.</th>
                                    <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                  while($RS = mysql_fetch_array($RSS)){
                    $i = $i + 1;
                    $forne[$i] = $RS["cd_fornecedor"];?>
                                    <th><?php echo $RS["ds_razao"];?></th>
                                    <?php }?>
                                    <th>Total</th>
                                    <th>Premiação</th>
                                </tr>
                                <?php 
                                $pontuacao_panetone = 0;
                                $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao, sum(p.cd_pontos) as pontos, u.pontuacao_panetone from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 5 ";
                $SQL .= " group by u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao order by pontos desc";
                $RSS = mysql_query($SQL, $conexao);
                while($RS = mysql_fetch_array($RSS)){
                    $x = $x + 1;
                    $tt = $tt + $RS["pontos"] + $RS["pontuacao_panetone"];
                    $pontuacao_panetone += $RS["pontuacao_panetone"];
                    $sumPremiacao   += $RS['vl_premiacao'];
                    ?>
                                <tr>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $x;?>º</td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["cd_codigo"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["ds_usuario"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo BuscaDSSupervisor($RS["cd_supervisor"]);?></td>
                                    <?php for($k = 1; $k <= $i; $k++){
                    $SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."' ";
                        //$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
                        $RQQ = mysql_query($SQQ, $conexao);
                        $RQ = mysql_fetch_assoc($RQQ);
                        //TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
                        $total = $RS["pontos"];
                        $meta = $metageralgrupo;
                        //MENSAGEM SE ATINGIR META MINIMA
                        $cor = '';
                        if($RQ["pt"] >= $metaminima){
                        $cor = "#29fb84";
                        }else{
                        $cor = "#f3715e";
                        }
                        //MENSAGEM SE ATINGIR META GERAL
                        $corTotal = '';
                        if($total >= $meta){
                        $corTotal = "#29fb84";
                        } else {
                        $corTotal = "#f3715e";
                        }
                        ?>
                                    <td style="background:<?php echo $cor;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php if($forne[$k] == '000305'){ echo number_format(round($RQ["pt"] + $RS["pontuacao_panetone"]), 0, '', '.'); }else{ echo number_format(round($RQ["pt"]), 0, '', '.'); }?></td>
                                    <?php }?>
                                    <td style="background:<?php echo $corTotal;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo number_format(round($RS["pontos"] + $RS["pontuacao_panetone"]), 0, '', '.');?></td>                       

                                    <td style="background: #0fafc7;">R$ <?php if(isset($premio[$ns-0])) { echo $premio[$ns-0]; };?></td>
                                </tr>
                                <?php $ns++; }?>
                                <tr>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <?php for($w = 1; $w <= $i; $w++){
                                        $SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo ";
                                        $SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 5 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
                                        $RQW = mysql_query($SQW, $conexao);
                                        $RW = mysql_fetch_assoc($RQW);
                                        if($forne[$w] == '000305'){
                                            echo "<th>".number_format(round($RW["pts"] + $pontuacao_panetone), 0, '', '.')."</th>";
                                        }else{
                                            echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
                                        }
                                    }?>
                                    <th><?php echo number_format(round($tt), 0, '', '.');?></th>
                                    <th></th>
                                </tr>
                            </table>
                            <?php unset($tt, $w, $i, $forne, $k, $meta, $x, $total, $metaminima, $metageralgrupo, $cor, $corTotal, $sumPremiacao, $premio, $ns);?>
                        </div>
                        </p>
                    </div>
                    <!-- FIM GRUPO 5 -->

                    <!-- INICIO GRUPO 6 -->
                    <div id="grupo-6" class="tabs-panel7">
                        <p>
                            <?php 
                            $premio = array(2800,2600,2400,2300,2200,2150,2100,2000,1450);
                            $RSS = mysql_query("select * from grupos where cd_grupo = 6 order by cd_grupo asc", $conexao);
        while($RS = mysql_fetch_array($RSS)){
			
		?>
                        <h3>GDM</h3>
                        <?php
            echo "<h5>Meta Mínima: ".number_format($RS["vl_metam"],0,"",".")."</h5>";
            echo "<h5>Meta Geral: ".number_format($RS["vl_metag"],0,"",".")."</h5>";
            $metageralgrupo = $RS["vl_metag"];
            $metaminima 	= $RS["vl_metam"];
            }
		?>
                        <div class="table-style">
                            <table class="table-list2">
                                <tr>
                                    <th>Ranking</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sup.</th>
                                    <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                  while($RS = mysql_fetch_array($RSS)){
                    $i = $i + 1;
                    $forne[$i] = $RS["cd_fornecedor"];?>
                                    <th><?php echo $RS["ds_razao"];?></th>
                                    <?php }?>
                                    <th>Total</th>
                                    <th>Premiação</th>
                                </tr>
                                <?php 
                                $pontuacao_panetone = 0;
                                $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao, sum(p.cd_pontos) as pontos, u.pontuacao_panetone from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 6 ";
                $SQL .= " group by u.ds_usuario, p.cd_codigo, u.cd_grupo, u.cd_supervisor, u.vl_premiacao order by pontos desc";
                $RSS = mysql_query($SQL, $conexao);
                while($RS = mysql_fetch_array($RSS)){
                    $x = $x + 1;
                    $tt = $tt + $RS["pontos"] + $RS["pontuacao_panetone"];
                    $pontuacao_panetone += $RS["pontuacao_panetone"];
                    $sumPremiacao   += $RS['vl_premiacao'];
                    ?>
                                <tr>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $x;?>º</td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["cd_codigo"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo $RS["ds_usuario"];?></td>
                                    <td <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo BuscaDSSupervisor($RS["cd_supervisor"]);?></td>
                                    <?php for($k = 1; $k <= $i; $k++){
                    $SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."' ";
                        //$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
                        $RQQ = mysql_query($SQQ, $conexao);
                        $RQ = mysql_fetch_assoc($RQQ);
                        //TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
                        $total = $RS["pontos"];
                        $meta = $metageralgrupo;
                        //MENSAGEM SE ATINGIR META MINIMA
                        $cor = '';
                        if($RQ["pt"] >= $metaminima){
                        $cor = "#29fb84";
                        }else{
                        $cor = "#f3715e";
                        }
                        //MENSAGEM SE ATINGIR META GERAL
                        $corTotal = '';
                        if($total >= $meta){
                        $corTotal = "#29fb84";
                        } else {
                        $corTotal = "#f3715e";
                        }
                        ?>
                                    <td style="background:<?php echo $cor;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php if($forne[$k] == '000305'){ echo number_format(round($RQ["pt"] + $RS["pontuacao_panetone"]), 0, '', '.'); }else{ echo number_format(round($RQ["pt"]), 0, '', '.'); }?></td>
                                    <?php }?>
                                    <td style="background:<?php echo $corTotal;?>" <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="background:#319be4;"';}?>><?php echo number_format(round($RS["pontos"] + $RS["pontuacao_panetone"]), 0, '', '.');?></td>                    

                                    <td style="background: #0fafc7;">R$ <?php if(isset($premio[$ns-0])) { echo $premio[$ns-0]; };?></td>
                                </tr>
                                <?php $ns++; }?>
                                <tr>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <?php for($w = 1; $w <= $i; $w++){
                                        $SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo ";
                                        $SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 6 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
                                        $RQW = mysql_query($SQW, $conexao);
                                        $RW = mysql_fetch_assoc($RQW);
                                        if($forne[$w] == '000305'){
                                            echo "<th>".number_format(round($RW["pts"] + $pontuacao_panetone), 0, '', '.')."</th>";
                                        }else{
                                            echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
                                        }
                                    }?>
                                    <th><?php echo number_format(round($tt), 0, '', '.');?></th>
                                    <th></th>
                                </tr>
                            </table>
                            <?php unset($tt, $w, $i, $forne, $k, $meta, $x, $total, $metaminima, $metageralgrupo, $cor, $corTotal, $sumPremiacao, $premio, $ns);?>
                        </div>
                        </p>
                    </div>
                    <!-- FIM GRUPO 6 -->

                </div>
            </div>
        </div>
        <!-- FIM DAS TABELAS GRUPOS -->
        <!--- COMENTÁRIOS TRANSIÇÃO --->
        <div class="clearfix"></div>
        <div class="section_holder36">
            <div class="container">
                <div class="section_title_line_full"></div>
                <div class="clearfix"></div>
                <section class="slider">
                    <div class="flexslider style6">
                        <ul class="slides">
                            <?php 
				include "conexao2.php";
				$SQL = "select * from comments where is_approved='1'";
	      	 	 $SQL .= " order by dated desc limit 5 ";
		   	  	 $RSS = mysql_query($SQL, $conexao2);
		   	  	 while($RS = mysql_fetch_array($RSS))
			 	 {?>
                            <li>
                                <div class="">
                                    <div class="text_holder">
                                        <p><b><?php echo $RS['name'];?> (<?php echo $RS['town'];?>) Diz...</b></p>
                                        <p><?php $tamanho = strlen($RS["comment"]);
						if($tamanho < 50){
						echo $RS["comment"]."&nbsp;";
						}else{
						echo substr($RS["comment"],0,350)." ....";};
				 ?><a href="comentarios.php">
                                                <font color="#CC0000"> &nbsp; Ver Mais
                                            </a></font>
                                            <?php }?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- FIM COMENTÁRIOS TRANSIÇÃO -->
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!--end section-->
    <?php include "footer.php";?>
</body>

</html>
