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
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">      
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
  .loading {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(images/loading_gallery.gif) 50% 50% no-repeat rgba(193, 193, 193, 0.71);
  }
</style>
<body style="margin-top:-25px;">
<div class="loading" id="loading" style="display: block"></div>
<section id="conteudo" style="display: inline" class="body">
<?php include "menu.php";?>  
<div class="clearfix"></div>
  <div class="container"></div>
    <div class="clearfix"></div>
    <div class="section_holdergrupos">
      <div class="container"><h3 align="left">Aceleradores - Quantidade Vendida</h3></div>
    </div>
    <div class="clearfix"></div>
    <div class="portfolio_four">       
      <div class="container">        
        <div class="tabs-content7">                     
            <div id="Grupo-1" class="tabs-panel7">
                    <p><h5></h5>
                    <div class="table-style">
                        <table class="table-list2">
                        <thead>
                            <tr>                          
                                <th width="81">CÓDIGO</th>
                                <th width="81">LOJA</th>
                                <th width="81">NOME</th>  
                                <th width="81">PRODUTO</th>
                                <th width="81">QTDE VENDIDA</th>
                                <th width="81">PONTUAÇÃO</th>
                                <th width="81">IMAGEM</th>                                                                                                                 
                            </tr>                 
                        </thead>                            
                                <?php  
                                    $cd_fornecedor = $_GET['cd_fornecedor'];
                                    $dt_inicial = $_GET['dt_inicial'];  
                                    $dt_final = $_GET['dt_final'];
                                    $rca = $_GET['rca'];  
                                    $filial = $_GET['filial'];
                                    
                                    if($filial == '09'){
                                      $filial_aceleradores = " and (filial = 'ITAJAÍ' or filial = 'RS' or filial = 'AMBOS')";
                                    }
                                    
                                    if($filial == '10'){
                                      $filial_aceleradores = " and (filial = 'IBIPORÃ' or filial = 'AMBOS')";
                                    }

                                    $query = mysql_query("select * from aceleradores where fornecedor = '".$cd_fornecedor."' and dt_inicial >= '".$dt_inicial."' and dt_final <= '".$dt_final."' $filial_aceleradores group by cd_produto");                                    
                                    
	                                while($objeto = mysql_fetch_array($query)){

                                    $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                                    mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                                    $query_atacado = mysql_query("select * from cat_produtos where cd_codigo = '".$objeto['cd_produto']."'", $conexao_atacado);                    
                                    $objeto_atacado = mysql_fetch_array($query_atacado);
                                
                                    $SQL = "SELECT * FROM ( SELECT
                                    C5.C5_VEND1,
                                    A3.A3_SUPER,
                                    A3.A3_GEREN,
                                    C5.C5_EMISSAO,
                                    A5.A5_FORNECE,
                                    C5.C5_CLIENTE,
                                    C5.C5_LOJACLI,
                                    C5.C5_NOME,
                                    SUM(C6.C6_VALOR) AS VALOR,
                                    SUM(C6.C6_QTDVEN-NVL(D2_QTDEDEV,0)) QTDE,
                                    SUM(((C6.C6_QTDVEN-NVL(D2_QTDEDEV,0))/ '".$objeto['fracionado']."')* '".$objeto['pontos']."') AS PONTUACAO
                                  FROM
                                    SIGA.SC6010 C6,
                                    SIGA.SC5010 C5,
                                    SIGA.SA3010 A3,
                                    SIGA.SA5010 A5,
                                    SIGA.SD2010 D2,
                                    SIGA.SF4010 F4
                                  WHERE
                                    C5.C5_FILIAL IN ($filial)
                                    AND C5.C5_FILIAL = C6.C6_FILIAL
                                    AND C5.C5_FILIAL = A3.A3_FILIAL
                                    AND C5.C5_FILIAL = A5.A5_FILIAL	
                                    AND C5.C5_VEND1 = A3.A3_COD
                                    AND C5.C5_NUM = C6.C6_NUM
                                    AND A3.A3_COD = '".$rca."'
                                    AND C5.C5_CLIENTE =  C6.C6_CLI
                                    AND C5.C5_LOJACLI = C6.C6_LOJA
                                    AND C5.C5_TIPO = 'N'
                                    AND C5.C5_EMISSAO >= '".date('Ymd', strtotime($objeto['dt_inicial']))."'
                                    AND C5.C5_EMISSAO <= '".date('Ymd', strtotime($objeto['dt_final']))."'
                                    AND A5.A5_PRODUTO = '".$objeto['cd_produto']."'
                                    AND A5.A5_PRODUTO = '".$objeto['cd_produto']."'
                                    AND A5.A5_FORNECE = '".$objeto['fornecedor']."'
                                    AND A5.A5_PROMVEN > 0	
                                    AND C6.C6_PRODUTO = A5.A5_PRODUTO
                                    AND D2_FILIAL(+)=C6_FILIAL
                                    AND D2_PEDIDO(+)=C6_NUM
                                    AND D2.D2_ITEMPV(+)=C6_ITEM
                                    AND D2.D2_COD(+)=C6_PRODUTO
                                    AND F4_FILIAL = '  ' 
                                    AND F4_CODIGO=C6_TES
                                    AND F4_DUPLIC='S'
                                    AND F4_ESTOQUE='S'
                                    AND F4.D_E_L_E_T_=' '
                                    AND D2.D_E_L_E_T_(+) = ' '
                                    AND C5.D_E_L_E_T_ = ' '
                                    AND C6.D_E_L_E_T_ = ' '
                                    AND A5.D_E_L_E_T_ = ' '
                                    AND A3.D_E_L_E_T_ = ' '
                                  GROUP BY
                                    C5.C5_VEND1,
                                    A3.A3_SUPER,
                                    A3.A3_GEREN,
                                    A5.A5_FORNECE,
                                    C5.C5_CLIENTE,
                                    C5.C5_LOJACLI,
                                    C5.C5_NOME,
                                    C5.C5_EMISSAO )
                                    WHERE QTDE > 0";
                                    $RRSP = oci_parse($oraconnect, $SQL);

                                    oci_execute($RRSP,OCI_DEFAULT);
                                    while($RSP = oci_fetch_array($RRSP)){ ?>
                                    <tr>
                                        <td><?php echo $RSP['C5_CLIENTE']; ?></td>
                                        <td><?php echo $RSP['C5_LOJACLI']; ?></td>
                                        <td><?php echo $RSP['C5_NOME']; ?></td>
                                        <td><?php echo $objeto['cd_produto']; ?></td>
                                        <td><?php echo $RSP['QTDE']; ?></td> 
                                        <td><?php echo $RSP['PONTUACAO']; ?></td> 
                                        <td>
                                              <?php
                                                  $imagem = $objeto_atacado['ds_imagem'];
                                                  list($width, $height, $type, $attr) = getimagesize("http://portal.muffatao.com.br/catalogo/images/produtos/$imagem");
                                                  if(isset($width)){?>
                                                  <img src="http://portal.muffatao.com.br/catalogo/images/produtos/<?php echo $objeto_atacado['ds_imagem']; ?>" height="150" />
                                              <?php }else{
                                                      echo "sem imagem";
                                                  }
                                              ?>
                                          </td>
                                    </tr>
                                    <?php
                                        $qtde_total += $RSP['QTDE'];
                                        $pontuacao_total += $RSP['PONTUACAO'];
                                        mysql_select_db("mu_campanhaverao", $conexao_atacado) or print(mysql_error());
                                        } 
                                    }
                                    ?> 
                                    <tfoot style="background-color: #FFF;">
                                      <tr>
                                          <th width="81"></th>
                                          <th width="81"></th>
                                          <th width="81"></th>  
                                          <th width="81"></th>
                                          <th width="81" style="text-align: center;"><?php echo $qtde_total; ?></th>
                                          <th width="81" style="text-align: center;"><?php echo $pontuacao_total; ?></th>
                                          <th width="81"></th>
                                      </tr> 
                                    </tfoot>
                        </table>
                    </div>   
                </p>
            </div>        
    </div>
  </div>
  <!-- FINAL QUADRO DE FORNECEDORES -->
  <div class="clearfix"></div>
  <?php include "footer.php";?>
  <!-- ######### ARQUIVOS JS ######### --> 
    <!-- get jQuery from the google apis --> 
    <script type="text/javascript" src="js/universal/jquery.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!--- Tabs --->
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>     
    <script type="text/javascript">
        $(window).load(function() {
            document.getElementById("loading").style.display = "none";
            document.getElementById("conteudo").style.display = "inline";
        });
        $(document).ready( function () {
            $('.table-list2').DataTable({
                language: {
                    url:"js/datatable/pt_br.json"
                }
            });
        });
  </script>
  </section>
  </body>
</html>
