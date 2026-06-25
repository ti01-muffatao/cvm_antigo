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
      <div class="container"><h3 align="left">Aceleradores</h3></div>
    </div>
    <div class="clearfix"></div>
    <div class="portfolio_four">       
      <div class="container" style="min-height: 500px;">
        <div class="table-style">
        <table class="table-list2">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Pontos</th>
            </tr>
        <?php            
            $codigo_supervisor = $_GET['codigo']; 
            $codigo_fornecedor = $_GET['fornecedor']; 
            $query = mysql_query("select cd_fornecedor, cd_produto, sum(cd_pontos) pontos from pontuacao_aceleradores where cd_supervisor = '".$codigo_supervisor."' and cd_fornecedor = '".$codigo_fornecedor."' group by cd_fornecedor, cd_produto");            
            while($acelerador = mysql_fetch_array($query)){                
                switch ($acelerador['cd_fornecedor']){
                    case 'F00001':
                        $fornecedor = "BETTANIN"; 
                        break;
                    case 'F00004':
                        $fornecedor = "UNILEVER";
                        break;
                    case 'F00096':
                        $fornecedor = "GOTA LIMPA";
                        break;
                    case 'F00079':
                        $fornecedor = "HAVAIANAS";
                        break;
                    case 'F00097':
                        $fornecedor = "COLGATE";
                        break;
                    case 'F00010':
                        $fornecedor = "SANTHER";
                        break;
                    case 'F00042':
                        $fornecedor = "FLORA";
                        break;
                    case 'F00003':
                        $fornecedor = "MEX";
                        break;
                    case 'F00077':
                        $fornecedor = "JDE";
                        break;
                    case 'F00098':
                        $fornecedor = "HEINZ";
                        break;
                    default:
                        $fornecedor = "N/A";
                        break;
                }                
                $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                $query_atacado = mysql_query("select * from cat_produtos where cd_codigo = '".$acelerador['cd_produto']."'", $conexao_atacado);                                    
                $objeto_atacado = mysql_fetch_array($query_atacado);
            ?>
                <tr>
                    <td><?php echo $acelerador['cd_produto']; ?></td>
                    <td><?php echo $objeto_atacado['ds_descricao']; ?></td>                    
                    <td>
                      <?php
                          $imagem = $objeto_atacado['imagem'];
                          list($width, $height, $type, $attr) = getimagesize("http://campanhas.muffatao.com.br/capverao/images/aceleradores/$imagem");                                                
                          if(isset($width)){
                      ?>
                          <img src="http://campanhas.muffatao.com.br/capverao/images/aceleradores/<?php echo $objeto_atacado['imagem']; ?>" height="150" />
                      <?php 
                          }else{
                              echo "sem imagem";
                          }
                      ?>
                  </td>
                  <td><?php echo number_format(round($acelerador['pontos']), 0, '', '.'); ?></td>
                </tr>
            <?php
            $total += $acelerador['pontos'];
            }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td>TOTAL</td>
            <td><?php echo number_format(round($total), 0, '', '.'); ?></td>
        </tr>
        </table>
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
  </script>
  </section>
  </body>
</html>
