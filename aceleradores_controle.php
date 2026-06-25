<!-- Conexão com banco de dados-->
<?php 
  include "administrar/ora_connect.php";  
  if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>"; } 
?>

<!-- Conteudo visivel somente para usuarios logados -->
<!doctype html>
<html lang="pt-BR">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
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
      <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
      <!-- CSS -->
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
      <!-- toogle menu -->
      <link rel="stylesheet" href="js/Toggle-Menu/menu.css" type="text/css"/>
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
      <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
      <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">      
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
      <!--- Tabs --->
      <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script> 
      <!-- Flexslider --> 
      <script  src="js/flexslider/jquery.flexslider.js"></script> 
      <script  src="js/flexslider/custom.js"/></script>
      <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
      <script type="text/javascript">
        $(window).load(function() {
            $('#table-month-01').DataTable({
                "order": [ 1, 'asc' ],
                "pageLength": 50,
                "language": {
                    url:"js/datatable/pt_br.json"
                }
            });
        } );
      </script>
</head>
<style>
  .site_wrapper {    
    margin: 0 auto 0 auto;
  }
  .container {
      width: 70%;
      margin: 0px auto;
  }
  .tabs-content7{
    width: 90%; 
    float: left;
  }
  @media screen and (max-width: 1440px) {
        #header .container {    
        margin-left: 70px;
        }
        .tabs-content7{
            width: 86%;
        }
        .container {    
            width: 88%;      
            margin: 0px 10%;
        }
  } 
  @media screen and (max-width: 800px) {
        #header .container {    
        margin-left: 70px;
        }
        .tabs-content7{
            width: 202px; 
        }
        .container {    
            width: 88%;      
            margin: 0px 10%;
        }
  }   
  .table-list2 th{
    height: 50px;
    font-size: 14px;
  }
  tr td{
    font-size: 10px;
  }
  .tabs7 li{
    text-align: center;
  }
  .tabs7 li a{
    width: 100px;
  }
  .tabs7 li.active a{
    color: #FFFFFF;
    border: 3px solid #287e51;
    background-color: #272727;
  }
</style>
<body style="margin-top:-25px;">
<?php include "menu.php";?>  
<div class="clearfix"></div>
  <div class="container"></div>
    <div class="clearfix"></div>
    <div class="section_holdergrupos">
      <div class="container"><h3 align="left">Aceleradores</h3></div>
    </div>
    <div class="clearfix"></div>
    <div class="portfolio_four">       
      <div class="container">
        <ul class="tabs7" style="width: 98px; height: 200px; float: left; margin-top: 82px;">
            <li><a href="#Grupo-1" target="_self">Novembro</a></li>
            <li><a href="#Grupo-2" target="_self">Dezembro</a></li>
            <li><a href="#Grupo-3" target="_self">Janeiro</a></li>
            <li><a href="#Grupo-4" target="_self">Fevereiro</a></li>
        </ul>
        <div class="tabs-content7">
            <div id="Grupo-1" class="tabs-panel7">
                    <p><h5></h5>
                    <div class="table-style">
                        <table class="table-list2">
                        <tr>
                            <th width="90"></th>
                            <th width="81">PRODUTO</th>
                            <th width="81">PONTO/FRAC</th>  
                            <th width="81">PERÍODO</th>
                        </tr>
                        <?php
                                $query = mysql_query("select * from aceleradores where dt_inicial >= '2022-11-01' and dt_final <= '2022-11-31'", $conexao);
                                while($objeto = mysql_fetch_array($query)){
                                    
                                    $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                                    mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                                    $query_atacado = mysql_query("select * from cat_produtos where cd_codigo = '".$objeto['cd_produto']."'", $conexao_atacado);
                                    $objeto_atacado = mysql_fetch_array($query_atacado);
                        ?>
                                    <tr style="height: 200px;">
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['cd_produto']; ?><br><br>
                                            <?php echo $objeto_atacado['ds_descricao']; ?>
                                            </span>
                                        </td>                    
                                        <td>
                                            <?php
                                                $imagem = $objeto['imagem'];
                                                list($width, $height, $type, $attr) = getimagesize("http://campanhas.muffatao.com.br/capverao/images/aceleradores/$imagem");
                                                if(isset($width)){
                                            ?>
                                                <img src="http://campanhas.muffatao.com.br/capverao/images/aceleradores/<?php echo $objeto['imagem']; ?>" height="150" />
                                            <?php 
                                                }else{
                                                    echo "sem imagem";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['pontos']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span>PONTOS</span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['fracionado']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="margin: 5px auto;">FRAC</span>
                                        </td>
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo date("d/m/Y", strtotime(str_replace('/','-',$objeto['dt_inicial']))); ?><br>à<br>
                                            <?php echo date("d/m/Y", strtotime(str_replace('/','-',$objeto['dt_final']))); ?>
                                            </span>
                                        </td>
                                    </tr>
                            <?php 
                                mysql_select_db("mu_campanhaverao", $conexao_atacado) or print(mysql_error());
                                } 
                            ?>
                        </table>
                        <table class="table-list2">
                        <tr>
                            <th width="90">Cód RCA</th>
                            <th width="81">Nome</th>
                            <th width="81">Cód do produto</th>  
                            <th width="81">Pontuação</th> 
                            <th width="81">Período</th>
                        </tr>
                        <?php
                            function aceleradores($oraconnect,$dt_inicial,$dt_final,$cd_produto){
                                    $SQL = "SELECT DISTINCT(F2_VEND1) AS F2_VEND1, A3_NREDUZ, D2_COD, SUM(QTD) AS QTD, d2_emissao FROM (
                                        SELECT F2.F2_VEND1,
                                        A3.A3_NREDUZ,
                                        SUM(D2.D2_QUANT - D2.D2_QTDEDEV) AS QTD,
                                        D2.D2_COD,    
                                        SUM(
                                            ((D2.D2_QUANT - D2.D2_QTDEDEV) / A5.A5_QTFRAC) * A5.A5_PROMVEN
                                        ) AS TOTALFOR,
                                        d2.d2_emissao
                                    FROM SIGA.SA5010 A5,
                                        SIGA.SA3010 A3,
                                        SIGA.SD2010 D2,
                                        SIGA.SF2010 F2
                                    WHERE A5.A5_FILIAL IN ('09', '10')
                                        AND D2.D2_FILIAL = A5.A5_FILIAL
                                        AND F2.F2_FILIAL = A5.A5_FILIAL
                                        AND A3.A3_FILIAL = A5.A5_FILIAL
                                        AND A5.A5_FORNECE IN (
                                            'F00001',
                                            'F00002',
                                            'F00003',
                                            'F00004',
                                            'F00010',
                                            'F00018',
                                            'F00077',
                                            'F00079'
                                        )
                                        AND A5.A5_LOJA BETWEEN ' ' AND 'ZZ'
                                        AND A5.A5_PRODUTO NOT IN ('003422-7', '057123-4', '003985-7', '004176-8')
                                        AND A5.A5_PROMVEN > 0
                                        AND A5.D_E_L_E_T_ <> '*'      
                                        AND D2.D2_COD = '".$cd_produto."'
                                        AND D2.D2_COD = A5.A5_PRODUTO
                                        AND D2.D2_EMISSAO >= '".$dt_inicial."'
                                        AND D2.D2_EMISSAO <= '".$dt_final."'
                                        AND (D2.D2_QUANT - D2.D2_QTDEDEV) > 0
                                        AND D2.D_E_L_E_T_ <> '*'    
                                        AND F2.F2_DOC = D2.D2_DOC
                                        AND F2.F2_SERIE = D2.D2_SERIE
                                        AND F2.F2_CLIENTE = D2.D2_CLIENTE
                                        AND F2.F2_LOJA = D2.D2_LOJA
                                        AND F2.F2_VEND1 BETWEEN ' ' AND 'ZZZZ'
                                        AND F2.F2_VEND1 NOT IN ('000001', '0150')    
                                        AND F2.D_E_L_E_T_ <> '*'    
                                        AND A3.A3_COD = F2.F2_VEND1
                                        AND A3.D_E_L_E_T_ <> '*'
                                        GROUP BY F2.F2_VEND1, A3.A3_SUPER, A3.A3_NREDUZ, D2.D2_COD, (D2.D2_QUANT - D2.D2_QTDEDEV), d2.d2_emissao
                                    UNION 
                                    SELECT c5.C5_VEND1,
                                        u3.A3_NREDUZ,
                                        SUM(c6.c6_qtdven) AS QTD,
                                        c6.c6_produto D2_COD,
                                        0 AS TOTALFOR,
                                        c5.c5_dtvenda
                                    from SIGA.SC6010 c6,
                                        SIGA.SC5010 c5,
                                        SIGA.SA3010 u3
                                    where c5.C5_FILIAL IN ('09', '10')
                                        and c5.C5_FILIAL = c6.C6_FILIAL
                                        and c5.C5_FILIAL = u3.A3_FILIAL
                                        and c5.C5_VEND1 = u3.A3_COD
                                        and c6.D_E_L_E_T_ = ' '
                                        and c6.c6_produto = '".$cd_produto."'
                                        and c6.C6_NUM = c5.C5_NUM
                                        and c6.C6_CLI = c5.C5_CLIENTE
                                        and c5.C5_NOTA = ' '
                                        and c6.C6_LOJA = c5.C5_LOJACLI
                                        and c5.C5_TIPO = 'N'
                                        and c5.C5_LIBEROK = 'S'
                                        AND c5.C5_DTVENDA >= '".$dt_inicial."'
                                        AND c5.C5_DTVENDA <= '".$dt_final."'
                                        and c5.D_E_L_E_T_ = ' '
                                        and c6.D_E_L_E_T_ = ' '
                                        group by c5.C5_VEND1, u3.A3_NREDUZ, c6.c6_produto, 0, c5.c5_dtvenda
                                    ) group by (F2_VEND1), A3_NREDUZ, D2_COD, d2_emissao ORDER BY A3_NREDUZ";
                                    $RSS = oci_parse($oraconnect, $SQL);
                                oci_execute($RSS,OCI_DEFAULT);
                                return $RSS;
                            }     
                            $query = mysql_query("select * from aceleradores where dt_inicial >= '2022-11-01' and dt_final <= '2022-11-31'", $conexao); 
                            while($objeto = mysql_fetch_array($query)){    
                                $dt_inicial_temp = explode("-",$objeto['dt_inicial']);
                                $dt_final_temp = explode("-",$objeto['dt_final']);    
                                $dt_inicial = $dt_inicial_temp[0].$dt_inicial_temp[1].$dt_inicial_temp[2];
                                $dt_final = $dt_final_temp[0].$dt_final_temp[1].$dt_final_temp[2];
                                $RSS = aceleradores($oraconnect,$dt_inicial,$dt_final,$objeto['cd_produto']);
                                while($RS = oci_fetch_assoc($RSS)){
                                    if($RS['A3_NREDUZ'] != ' '){ ?>
                                    <tr>
                                        <td style="font-size: 14px;"><?php echo $RS['F2_VEND1']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['A3_NREDUZ']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['D2_COD']; ?></td>
                                        <td style="font-size: 14px;"><?php echo number_format(($RS['QTD']/$objeto['fracionado'])*$objeto['pontos'],2,',',''); ?></td>
                                        <td style="font-size: 14px;"><?php echo date("d/m/Y", strtotime(str_replace('/','-',$objeto["dt_inicial"]))); ?></td>
                                    </tr>
                        <?php       } // if ($RS['A3_NREDUZ'] != '')
                                } // while select vendedores                
                            } // while select * from aceleradores
                        ?>
                        </table>                 
                    </div>   
                </p>
            </div>
        <!-- FIM Grupo 1 -->   
        <div id="Grupo-2" class="tabs-panel7">
                    <p><h5></h5>
                    <div class="table-style">
                        <table class="table-list2">
                        <tr>
                            <th width="90"></th>
                            <th width="81">PRODUTO</th>
                            <th width="81">PONTO/FRAC</th>  
                            <th width="81">PERÍODO</th>                  
                        </tr>
                        <?php                     
                                $query = mysql_query("select * from aceleradores where dt_inicial >= '2022-12-01' and dt_final <= '2022-12-31'", $conexao);                    
                                while($objeto = mysql_fetch_array($query)){
                                    
                                    $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                                    mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                                    $query_atacado = mysql_query("select * from cat_produtos where cd_codigo = '".$objeto['cd_produto']."'", $conexao_atacado);                    
                                    $objeto_atacado = mysql_fetch_array($query_atacado);
                        ?>
                                    <tr style="height: 200px;">
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['cd_produto']; ?><br><br>
                                            <?php echo $objeto_atacado['ds_descricao']; ?>
                                            </span>
                                        </td>                    
                                        <td>
                                            <?php
                                                $imagem = $objeto['imagem'];
                                                list($width, $height, $type, $attr) = getimagesize("http://campanhas.muffatao.com.br/capverao/images/aceleradores/$imagem");
                                                if(isset($width)){
                                            ?>
                                                <img src="http://campanhas.muffatao.com.br/capverao/images/aceleradores/<?php echo $objeto['imagem']; ?>" height="150" />
                                            <?php 
                                                }else{
                                                    echo "sem imagem";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['pontos']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span>PONTOS</span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['fracionado']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="margin: 5px auto;">FRAC</span>
                                        </td>
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['dt_inicial']; ?><br>à<br>
                                            <?php echo $objeto['dt_final']; ?>
                                            </span>
                                        </td>
                                    </tr>
                            <?php 
                                mysql_select_db("mu_campanhaverao", $conexao_atacado) or print(mysql_error());
                                } 
                            ?>
                        </table>
                        <table class="table-list2">
                        <thead>
                            <tr>
                                <th width="90">Cód RCA</th>
                                <th width="81">Nome</th>
                                <th width="81">Cód do produto</th>  
                                <th width="81">Pontuação</th> 
                                <th width="81">Período</th>                 
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = mysql_query("select * from aceleradores where dt_inicial >= '2022-12-01' and dt_final <= '2022-12-31'", $conexao); 
                            while($objeto = mysql_fetch_array($query)){    
                                $dt_inicial_temp = explode("-",$objeto['dt_inicial']);
                                $dt_final_temp = explode("-",$objeto['dt_final']);    
                                $dt_inicial = $dt_inicial_temp[0].$dt_inicial_temp[1].$dt_inicial_temp[2];
                                $dt_final = $dt_final_temp[0].$dt_final_temp[1].$dt_final_temp[2];      
                                $RSS = aceleradores($oraconnect,$dt_inicial,$dt_final,$objeto['cd_produto']);
                                while($RS = oci_fetch_assoc($RSS)){
                                    if($RS['A3_NREDUZ'] != ''){ ?>
                                    <tr>
                                        <td style="font-size: 14px;"><?php echo $RS['F2_VEND1']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['A3_NREDUZ']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['D2_COD']; ?></td>
                                        <td style="font-size: 14px;"><?php echo number_format(($RS['QTD']/$objeto['fracionado'])*$objeto['pontos'],2,',',''); ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['D2_EMISSAO']; ?></td>
                                    </tr>
                        <?php       } // if ($RS['A3_NREDUZ'] != '')
                                } // while select vendedores                
                            } // while select * from aceleradores
                        ?>
                        </tbody>
                        </table>                 
                    </div>   
                </p>
            </div>
        <!-- FIM Grupo 2 -->            
        <div id="Grupo-3" class="tabs-panel7">
                    <p><h5></h5>
                    <div class="table-style">
                        <table class="table-list2">
                        <tr>
                            <th width="90"></th>
                            <th width="81">PRODUTO</th>
                            <th width="81">PONTO/FRAC</th>  
                            <th width="81">PERÍODO</th>                  
                        </tr>
                        <?php                     
                                $query = mysql_query("select * from aceleradores", $conexao);                    
                                while($objeto = mysql_fetch_array($query)){
                                    
                                    $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                                    mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                                    $query_atacado = mysql_query("select * from cat_produtos where cd_codigo = '".$objeto['cd_produto']."'", $conexao_atacado);                    
                                    $objeto_atacado = mysql_fetch_array($query_atacado);
                        ?>
                                    <tr style="height: 200px;">
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['cd_produto']; ?><br><br>
                                            <?php echo $objeto_atacado['ds_descricao']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php
                                                $imagem = $objeto['imagem'];
                                                list($width, $height, $type, $attr) = getimagesize("http://campanhas.muffatao.com.br/capverao/images/aceleradores/$imagem");
                                                if(isset($width)){
                                            ?>
                                                <img src="http://campanhas.muffatao.com.br/capverao/images/aceleradores/<?php echo $objeto['imagem']; ?>" height="150" />
                                            <?php 
                                                }else{
                                                    echo "sem imagem";
                                                }
                                            ?>
                                        </td>
                                        <td>                        
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['pontos']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span>PONTOS</span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['fracionado']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="margin: 5px auto;">FRAC</span>
                                        </td>
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['dt_inicial']; ?><br>à<br>
                                            <?php echo $objeto['dt_final']; ?>
                                            </span>
                                        </td>
                                    </tr>
                            <?php 
                                mysql_select_db("mu_campanhaverao", $conexao_atacado) or print(mysql_error());
                                } 
                            ?>
                        </table>
                        <table class="table-list2" id="table-month-01">
                        <thead>
                        <tr>
                            <th width="90">Cód RCA</th>
                            <th width="81">Nome</th>
                            <th width="81">Cód do produto</th>  
                            <th width="81">Pontuação</th> 
                            <th width="81">Período</th>                 
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = mysql_query("select * from aceleradores", $conexao); 
                            while($objeto = mysql_fetch_array($query)){    
                                $dt_inicial_temp = explode("-",$objeto['dt_inicial']);
                                $dt_final_temp = explode("-",$objeto['dt_final']);    
                                $dt_inicial = $dt_inicial_temp[0].$dt_inicial_temp[1].$dt_inicial_temp[2];
                                $dt_final = $dt_final_temp[0].$dt_final_temp[1].$dt_final_temp[2];
                                $RSS = aceleradores($oraconnect,$dt_inicial,$dt_final,$objeto['cd_produto']);
                                while($RS = oci_fetch_assoc($RSS)){
                                    if($RS['A3_NREDUZ'] != ''){ ?>
                                    <tr>
                                        <td style="font-size: 14px;"><?php echo $RS['F2_VEND1']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['A3_NREDUZ']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['D2_COD']; ?></td>
                                        <td style="font-size: 14px;"><?php echo number_format(($RS['QTD']/$objeto['fracionado'])*$objeto['pontos'],2,',',''); ?></td>
                                        <td style="font-size: 14px;"><?php echo $objeto['dt_inicial']; ?></td>
                                    </tr>
                        <?php       } // if ($RS['A3_NREDUZ'] != '')
                                } // while select vendedores                
                            } // while select * from aceleradores
                        ?>
                        </tbody>
                        </table>                 
                    </div>   
                </p>
            </div>
        <!-- FIM Grupo 3 -->
        <div id="Grupo-4" class="tabs-panel7">
                    <p><h5></h5>
                    <div class="table-style">
                        <table class="table-list2">
                        <tr>
                            <th width="90"></th>
                            <th width="81">PRODUTO</th>
                            <th width="81">PONTO/FRAC</th>  
                            <th width="81">PERÍODO</th>                  
                        </tr>
                        <?php                     
                                $query = mysql_query("select * from aceleradores where dt_inicial >= '2023-02-01' and dt_final <= '2023-02-31'", $conexao);                    
                                while($objeto = mysql_fetch_array($query)){
                                    
                                    $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                                    mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                                    $query_atacado = mysql_query("select * from cat_produtos where cd_codigo = '".$objeto['cd_produto']."'", $conexao_atacado);                    
                                    $objeto_atacado = mysql_fetch_array($query_atacado);
                        ?>
                                    <tr style="height: 200px;">
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['cd_produto']; ?><br><br>                         
                                            <?php echo $objeto_atacado['ds_descricao']; ?>                        
                                            </span>
                                        </td>                    
                                        <td>
                                            <?php
                                                $imagem = $objeto['imagem'];
                                                list($width, $height, $type, $attr) = getimagesize("http://campanhas.muffatao.com.br/capverao/images/aceleradores/$imagem");                                                
                                                if(isset($width)){
                                            ?>
                                                <img src="http://campanhas.muffatao.com.br/capverao/images/aceleradores/<?php echo $objeto['imagem']; ?>" height="150" />
                                            <?php 
                                                }else{
                                                    echo "sem imagem";
                                                }
                                            ?>
                                        </td>
                                        <td>                        
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['pontos']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span>PONTOS</span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="font-family: 'Anton', sans-serif; font-size: 54px; font-weight: bolder; letter-spacing: 5px;"><?php echo $objeto['fracionado']; ?></span>
                                            <div style="clear: both; margin: 20px auto;"></div>
                                            <span style="margin: 5px auto;">FRAC</span>
                                        </td>
                                        <td>
                                            <span style="font-size: 14px;">
                                            <?php echo $objeto['dt_inicial']; ?><br>à<br>
                                            <?php echo $objeto['dt_final']; ?>
                                            </span>
                                        </td>
                                    </tr>
                            <?php 
                                mysql_select_db("mu_campanhaverao", $conexao_atacado) or print(mysql_error());
                                } 
                            ?>
                        </table>
                        <table class="table-list2">
                        <tr>
                            <th width="90">Cód RCA</th>
                            <th width="81">Nome</th>
                            <th width="81">Cód do produto</th>  
                            <th width="81">Pontuação</th> 
                            <th width="81">Período</th>                 
                        </tr>
                        <?php                                            
                            $query = mysql_query("select * from aceleradores where dt_inicial >= '2023-02-01' and dt_final <= '2023-02-31'", $conexao); 
                            while($objeto = mysql_fetch_array($query)){    
                                $dt_inicial_temp = explode("-",$objeto['dt_inicial']);
                                $dt_final_temp = explode("-",$objeto['dt_final']);    
                                $dt_inicial = $dt_inicial_temp[0].$dt_inicial_temp[1].$dt_inicial_temp[2];
                                $dt_final = $dt_final_temp[0].$dt_final_temp[1].$dt_final_temp[2];      
                                $RSS = aceleradores($oraconnect,$dt_inicial,$dt_final,$objeto['cd_produto']);
                                while($RS = oci_fetch_assoc($RSS)){                                     
                                    if($RS['A3_NREDUZ'] != ''){                                          
                            ?>
                                    <tr>
                                        <td style="font-size: 14px;"><?php echo $RS['F2_VEND1']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['A3_NREDUZ']; ?></td>
                                        <td style="font-size: 14px;"><?php echo $RS['D2_COD']; ?></td>
                                        <td style="font-size: 14px;"><?php echo number_format(($RS['QTD']/$objeto['fracionado'])*$objeto['pontos'],2,',',''); ?></td>
                                        <td style="font-size: 14px;"><?php echo $objeto['dt_inicial']; ?></td>
                                    </tr>
                        <?php       } // if ($RS['A3_NREDUZ'] != '')
                                } // while select vendedores                
                            } // while select * from aceleradores
                        ?>
                        </table>                 
                    </div>   
                </p>
            </div>
        <!-- FIM Grupo 4 -->  
    </div>
  </div>
  <!-- FINAL QUADRO DE FORNECEDORES -->
  <div class="clearfix"></div>
  <?php include "footer.php";?>
  <!-- ######### ARQUIVOS JS ######### --> 
  <!-- style switcher --> 
  <script src="js/style-switcher/jquery-1.js"></script> 
  <script src="js/style-switcher/styleselector.js"></script> 
  <!-- mega menu --> 
  <script src="js/mainmenu/bootstrap.min.js"></script> 
  <script src="js/mainmenu/customeUI.js"></script> 
  <!-- scroll up --> 
  <script src="js/scrolltotop/totop.js" type="text/javascript"></script> 
  <!-- sticky menu --> 
  <script type="text/javascript" src="js/mainmenu/sticky.js"></script> 
  <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script> 
  <!-- scroll up --> 
  <script src="js/scrolltotop/totop.js" type="text/javascript"></script> 
  <!-- cubeportfolio --> 
  <script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script> 
  <script type="text/javascript" src="js/cubeportfolio/main-juicy.js"></script>  
  </body>
</html>
