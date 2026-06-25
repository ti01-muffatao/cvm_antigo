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
      <div class="container"><h3 align="left">Aceleradores - Pontuação</h3></div>
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
                                <th width="81">NOME</th>
                                <th width="81">SUPERVISOR</th>
                                <th width="81">PERÍODO</th>
                                <th width="81">QTDE VENDIDA</th>
                                <th width="81">PONTUAÇÃO TOTAL</th>
                            </tr>
                        </thead>
                                <?php  
                                  $cd_fornecedor = $_GET['cd_fornecedor'];
                                  $dt_inicial = $_GET['dt_inicial'];  
                                  $dt_final = $_GET['dt_final'];
                                  
                                  if($_SESSION['CD_PERFIL'] == '2'){
                                    $sql_codigo = " and gerente = '".$_SESSION['CD_CODIGO']."'";
                                  }
                                  if($_SESSION['CD_PERFIL'] == '3'){
                                    $sql_codigo = " and cd_supervisor = '".$_SESSION['CD_CODIGO']."'";
                                  }
                                  if($_SESSION['CD_PERFIL'] == '4'){
                                    $sql_codigo = " and cd_codigo = '".$_SESSION['CD_CODIGO']."'";
                                  }

                                  $SQL = "SELECT cd_codigo, cd_supervisor, sum(cd_pontos) pontos, dt_inicial, dt_final, sum(qtde_vendida) qtde_vendida from pontuacao_aceleradores where cd_fornecedor = '".$cd_fornecedor."' and dt_inicial >= '".$dt_inicial."' and dt_final <= '".$dt_final."' $sql_codigo group by cd_codigo";

                                  $query = mysql_query($SQL);

                                  while($objeto = mysql_fetch_array($query)){
                                  $SQL = "select * from usuarios where cd_codigo = '".$objeto['cd_codigo']."' and cd_supervisor = '".$objeto['cd_supervisor']."'";
                                  $query_usuario = mysql_query($SQL);
                                  $usuario = mysql_fetch_array($query_usuario);

                                ?>
                                <tr>
                                    <td><?php echo $objeto['cd_codigo']; ?></td>
                                    <td><a style="font-size: 12px; text-decoration: underline;" href="https://portal.muffatao.com.br/campanhas/cvm/qtde_vendida_cliente.php?cd_fornecedor=<?php echo $cd_fornecedor; ?>&dt_inicial=<?php echo $dt_inicial; ?>&dt_final=<?php echo $dt_final; ?>&rca=<?php echo $objeto['cd_codigo']; ?>&filial=<?php echo $usuario['cd_filial']; ?>">
                                        <?php echo $usuario['ds_usuario']; ?></a>
                                    </td>
                                    <td><?php echo $objeto['cd_supervisor']; ?></td>
                                    <td>
                                        <span style="font-size: 14px;">
                                        <?php echo date("d/m/Y", strtotime(str_replace('/','-',$objeto['dt_inicial']))); ?><br>à<br>
                                        <?php echo date("d/m/Y", strtotime(str_replace('/','-',$objeto['dt_final']))); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $objeto['qtde_vendida']; ?></td>
                                    <td><?php echo number_format($objeto['pontos'],0,',','.'); ?></td>
                                </tr>
                                <?php } ?>
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
