<?php include "administrar/ora_connect.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
?>
<!--**********************************************
   CONTEUDO VISIVEL SOMENTE PARA USUARIOS LOGADOS 
**********************************************--->
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="pt-BR">
<title>21ª Campanha de Verão Muffatão</title>
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
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
<!-- ######### ARQUIVOS JS ######### --> 
<!-- get jQuery from the google apis --> 
<script type="text/javascript" src="js/universal/jquery.js"></script> 
<!-- style switcher --> 
<script src="js/style-switcher/jquery-1.js"></script> 
<script src="js/style-switcher/styleselector.js"></script> 
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
<script  src="js/flexslider/custom.js"></script>
</head>
<body style="margin-top:-25px;">
<?php include "loading.php" ?>
<?php include "menu.php";?>
  <div class="clearfix"></div>
  <div class="section_holdergrupos">
    <div class="container">
      <div class="one_full">
        <h3>Bingo OURO</h3>
<div class="tabs-content7">
   <!--<h3>Minhas Cartelas</h3>-->
   <div class="divider"></div>
   <div class="table-style">
   <table class="table-list2">
      <tr>
         <th>Fornecedor</th>
         <th>Meta</th>
         <th>Realizado</th>
         <th>%</th>
      </tr>
<?php
   $data_min 		= "20241101";
   $data_max 		= "20250228";
   $cartelas		= 0;
   $dsCartelas		= "0";
   $cartExtra 		= 0;
   $contVenda     = 0;
   if($_SESSION['CD_CODIGO'] == "0236"){
      $cd_codigo = "('0236','0338')";
      $cd_filial = "('09','10')";
   }else{
      $cd_codigo = "('".$_SESSION['CD_CODIGO']."')";
      $cd_filial = "('".$_SESSION['CD_FILIAL']."')";
   }
   $SQL_GERENTE = "SELECT A3_GEREN FROM SA3010 WHERE A3_COD IN ".$cd_codigo."";   
   $RSS_GERENTE = oci_parse($oraconnect, $SQL_GERENTE);
   oci_set_prefetch($RSS_GERENTE, 300);
   oci_execute($RSS_GERENTE,OCI_DEFAULT);
   $RS_GERENTE = oci_fetch_assoc($RSS_GERENTE);
   //BINGO OURO - MOTOS
   $RSS = mysql_query("select * from metas_bingo_ouro where cd_codigo = '".$_SESSION['CD_CODIGO']."' order by vl_meta asc ",$conexao);
   while($RS = mysql_fetch_array($RSS)){
      if(($RS['cd_fornecedor'] == 'F00096' && (trim($RS_GERENTE['A3_GEREN']) == '9001' || trim($RS_GERENTE['A3_GEREN']) == '9002')) || ($RS['cd_fornecedor'] == 'F00004' && trim($RS_GERENTE['A3_GEREN']) == '9004')){ ?>
      
   <?php
      }else{      
      // extras bingo
      $sumMeta += $RS['vl_meta'];
      //CONSULTA DEVOLUCAO FONECEDOR
      $RSSVD = oci_parse($oraconnect, "SELECT SUM(d1.D1_TOTAL) AS DEVOLUCAO FROM SIGA.SF2010 f2, SIGA.SD1010 d1, SIGA.SA3010 a3, SIGA.SF4010 F4 WHERE f2.F2_FILIAL = d1.D1_FILIAL AND d1.D1_FILIAL = a3.A3_FILIAL and f2.F2_DOC = d1.D1_NFORI and f2.F2_SERIE = d1.D1_SERIORI and f2.F2_VEND1 = a3.A3_COD and d1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d1.D1_FILIAL AND A5_FORNECE = '".$RS['cd_fornecedor']."' AND D_E_L_E_T_ = ' ') and d1.D1_TIPO = 'D' and a3.A3_COD IN ".$cd_codigo." and d1.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and a3.D_E_L_E_T_= ' ' and d1.D1_FILIAL IN ".$cd_filial." and f2.F2_VEND1 <>'000001' and d1.D1_EMISSAO >= '".$data_min."' and d1.D1_EMISSAO <= '".$data_max."' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D1.D1_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
      oci_set_prefetch($RSSVD, 300);
      oci_execute($RSSVD,OCI_DEFAULT);
      $RSVD = oci_fetch_assoc($RSSVD);
      ///CONSULTA VENDA FORNECEDOR///
      $RSS2 = oci_parse($oraconnect, "SELECT SUM(d2.D2_VALBRUT) AS VENDA from SIGA.SF2010 f2, SIGA.SD2010 d2, SIGA.SA3010 u3, SIGA.SF4010 F4 where f2.F2_FILIAL = d2.D2_FILIAL and f2.F2_FILIAL = u3.A3_FILIAL and f2.F2_DOC = d2.D2_DOC and f2.F2_CLIENTE = d2.D2_CLIENTE and f2.F2_LOJA = d2.D2_LOJA and f2.F2_SERIE = d2.D2_SERIE and f2.F2_EMISSAO = d2.D2_EMISSAO and d2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d2.D2_FILIAL AND A5_FORNECE = '".$RS['cd_fornecedor']."' AND D_E_L_E_T_ = ' ') and d2.D2_TIPO = 'N' and d2.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and u3.D_E_L_E_T_ = ' ' and f2.F2_VEND1 = u3.A3_COD and f2.F2_VEND1 <>'000001' and f2.F2_VEND1 IN ".$cd_codigo." and d2.D2_FILIAL IN ".$cd_filial." and d2.D2_EMISSAO >= '".$data_min."' and d2.D2_EMISSAO <= '".$data_max."' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = d2.D2_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
      oci_set_prefetch($RSS2, 300);
      oci_execute($RSS2,OCI_DEFAULT);
      $RS2 = oci_fetch_assoc($RSS2);
      $venda 		= ($RS2['VENDA'] - $RSVD['DEVOLUCAO']);
      $perce = ($venda / $RS['vl_meta'])*100;
      $sumVenda += $venda;
      //regras  metas
      if($venda >= $RS['vl_meta']){
         $dsCartelas = "1";
         ++$cartelas;
         $contVenda++;
      }else{
         $dsCartelas = "0";
      }
      //regras  extras
      $perce = ($venda / $RS['vl_meta'])*100; 
      if($perce >= 100){
         $cartExtra = ($perce - 100)/10;
         $sumCartExt += floor($cartExtra);
      }
      $sumCart = $cartelas + $sumCartExt;
      
      $perce >= 99 ? $estilo = "background: #29fb8469; padding: 5px; border-radius: 5px" : $estilo = "background: #f3715e96; padding: 5px; border-radius: 5px"; 
      
   ?>

   <tr>
      <td><?= BuscaClifor($RS['cd_fornecedor']);?></td>
      <td>R$ <?= number_format($RS['vl_meta'],2,",",".");?></td>
      <td>R$ <?= number_format($venda,2,",",".");?></td>
      <td><span style="<?=$estilo?>"><?= number_format($perce,2,",","");?> %</span></td>
   </tr>
<?php 
   $cartExtra=0;
   } // end if $RS['cd_fornecedor'] == 'F00096'
}
?>
   <tr>
      <th>Totais</th>
      <th><?= number_format($sumMeta,2,",",".");?></th>
      <th><?= number_format($sumVenda,2,",",".");?></th>
      <?php
         $perceTotalVenda = (($sumVenda/$sumMeta)*100); 
         $cartExtra = ($perceTotalVenda - 100)/10;
      ?>
      <th><?= number_format($perceTotalVenda,2,",","") . " %";?></th>
      </th> 
   </tr>
   <?php if($_SESSION['CD_PERFIL'] != '4'){ ?>
   <tr>  
      <th></th><th></th><th></th>
      <th>
         Cartelas: 
         <?php 
            if ($cartelas >= 8) {
               echo 1;
               $total_cartelas = 1;
            } else {
               echo 0;
               $total_cartelas = 0;
            }
         ?>
      </th>
   </tr>
   <tr>
      <th></th><th></th><th></th>
      <th>Cartelas Extras:
         <?php
            if (($cartExtra >= 1 && $cartExtra <= 1.9) && $total_cartelas == 1 && $contVenda == 9) {
               $cartExtra = 1;
            } elseif (($cartExtra >= 2 && $cartExtra <= 2.9) && $total_cartelas == 1 && $contVenda == 9) {
               $cartExtra = 2;
            } elseif (($cartExtra >= 3 && $cartExtra <= 4.9) && $total_cartelas == 1 && $contVenda == 9) {
               $cartExtra = 3;
            } elseif($cartExtra >= 5 && $total_cartelas == 1 && $contVenda == 9) {
               $cartExtra = 5;
            }else{
               $cartExtra = 0;
            }
            echo $cartExtra;
         ?>
      </th>
   </tr>
   <tr>
      <th></th><th></th><th></th>
      <th>Total de Cartelas: <?= $total_cartelas + $cartExtra; ?></th>
   </tr>
   <?php } ?>
</table>
   <br>
   </div>
   <?php unset($data_min, $data_max, $cartelas, $dsCartelas, $cartExtra, $sumMeta, $venda, $perce, $sumVenda, $libCartExtra, $perceTotalVenda, $sumCart);?>
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
                  $SQL = "select * from comments where is_approved='1'";
                  $SQL .= " order by dated desc limit 5 ";
                  $RSS = mysql_query($SQL, $conexao2);
                  while($RS = mysql_fetch_array($RSS)){
                  ?>
            	   <li>
              	   <div class="">
                     <div class="text_holder">
                        <p><b><?= $RS['name'];?> (<?= $RS['town'];?>) Diz...</b></p>
                        <p>
                        <?php 
                        $tamanho = strlen($RS["comment"]);
                        if($tamanho < 50){ echo $RS["comment"]."&nbsp;";
                        }else{
                           echo substr($RS["comment"],0,350)." ....";
                        };
                        ?>
                        <a href="comentarios.php"><font color="#CC0000"> &nbsp; Ver Mais</a></font>
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